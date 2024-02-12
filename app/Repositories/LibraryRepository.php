<?php
namespace App\Repositories;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class LibraryRepository extends BaseRepository
{
    function __construct(Library $model)
    {
        $this->model = $model;
    }

    public function getBooks(?bool $isAvailable = null){

        // return $isAvailable;
        return Book::whereLibraryId(Auth::user()->library_id)
        ->when($isAvailable !== null, function ($query) use($isAvailable){
            return $query->whereAvailability( $isAvailable);
        })
        ->get();


    }
}
