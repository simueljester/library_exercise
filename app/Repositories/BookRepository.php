<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository
{
    function __construct(Book $model)
    {
        $this->model = $model;
    }


}
