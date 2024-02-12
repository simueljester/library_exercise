<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\LibraryTraits;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\LibraryRepository;

class HomeController extends Controller
{
    private $libraryRepository, $bookRepository;
    use LibraryTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->libraryRepository = app(LibraryRepository::class);
        $this->bookRepository    = app(BookRepository::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $isAvailable = $request->available ? filter_var($request->available, FILTER_VALIDATE_BOOLEAN) : null;
        $books = $this->getBooksInLibrary($isAvailable);

        $assignedToCurrentAuthenticated = Auth::user()->assignedBooks()->with('book')->get();

        return view('home',compact('books','assignedToCurrentAuthenticated'));
    }
}
