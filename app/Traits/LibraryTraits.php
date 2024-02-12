<?php

namespace App\Traits;

use App\Repositories\LibraryRepository;
use Illuminate\Support\Facades\Auth;

trait LibraryTraits {

    private $libraryRepository;

    function __construct()
    {
        $this->libraryRepository = app(LibraryRepository::class);
    }


    public function getBooksInLibrary(?bool $isAvailable = null) {

        $books = $this->libraryRepository->getBooks($isAvailable);

        return $books;
    }

}
