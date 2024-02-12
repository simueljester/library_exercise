<?php
namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class BookAssignmentValidator
{
    public static function validateForm(array $data)
    {
        return Validator::make($data, [
            'book_id' => 'required',
        ], [
            'book_id.required' => 'Please select a book.',
        ]);
    }
}
