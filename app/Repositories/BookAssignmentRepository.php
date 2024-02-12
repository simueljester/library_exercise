<?php
namespace App\Repositories;

use App\Models\BookAssignment;

class BookAssignmentRepository extends BaseRepository
{
    function __construct(BookAssignment $model)
    {
        $this->model = $model;
    }
}
