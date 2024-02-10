<?php
namespace App\Repositories;

use App\Models\Library;

class LibraryRepository extends BaseRepository
{
    function __construct(Library $model)
    {
        $this->model = $model;
    }
}
