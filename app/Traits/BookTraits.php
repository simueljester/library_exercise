<?php

namespace App\Traits;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;

trait BookTraits {

    private $bookRepository;

    function __construct()
    {
        $this->bookRepository = app(BookRepository::class);
    }

    public function updateBookStatus(int $book_id){

        $fetchedBook  = $this->bookRepository->find($book_id)->availability;

        $data =[
            'availability'  => !$fetchedBook
        ];

        $this->bookRepository->update($book_id,$data);
    }


}
