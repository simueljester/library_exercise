<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\LibraryTraits;
use App\Models\BookAssignment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\LibraryRepository;
use App\Repositories\BookAssignmentRepository;
use App\Traits\BookTraits;
use App\Validations\BookAssignmentValidator;

class BookAssignmentController extends Controller
{
    private $libraryRepository, $bookRepository, $bookAssignmentRepository;

    use LibraryTraits,BookTraits;

    public function __construct()
    {
        $this->middleware('auth');

        $this->libraryRepository            = app(LibraryRepository::class);
        $this->bookRepository               = app(BookRepository::class);
        $this->bookAssignmentRepository     = app(BookAssignmentRepository::class);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * the isAvailable = true = get the available ONLY
     * the isAvailable = false = get the unavailable ONLY
     * the isAvailable = null = get all
     */
    public function create()
    {
        $isAvailable = true;
        $books = $this->getBooksInLibrary($isAvailable);

        return view('book-assignments.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = BookAssignmentValidator::validateForm($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $auth = Auth::user();

        $data = [
            'book_id'         => $request->book_id,
            'library_id'      => $auth->library_id,
            'user_id'         => $auth->id,
        ];

        DB::beginTransaction();

        try {
            $this->bookAssignmentRepository->save($data);
            $this->updateBookStatus($request->book_id);
            DB::commit();
            return redirect()->route('user.book-assignment.create')->with('success', 'Book successfully borrowed');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(BookAssignment $bookAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookAssignment $bookAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Update only the status of the book to be available again
     */
    public function update(Request $request, BookAssignment $bookAssignment)
    {
        //
        $data =[
            'returned_at' => now(),
            'borrowed_seconds' => \App\Helpers\computeBorrowedHours($bookAssignment->created_at, now())
        ];

        DB::beginTransaction();

        try {
            $this->bookAssignmentRepository->update($bookAssignment->id,$data);
            $this->updateBookStatus($bookAssignment->book_id);
            DB::commit();
            return redirect()->route('user.home')->with('success', 'Book successfully returned');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookAssignment $bookAssignment)
    {
        //
    }
}
