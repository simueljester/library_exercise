<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use App\Repositories\LibraryRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BooksTableSeeder extends Seeder
{
    private $libraryRepository;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Book::truncate();

        $this->libraryRepository = app(LibraryRepository::class);
        $library_ids = $this->libraryRepository->query()->pluck('id')->toArray();

        $books_per_library = 10;
        $books = [];

        foreach ($library_ids as $library_id) {
            for ($i = 1; $i <= $books_per_library; $i++) {
                $books[] = [
                    'library_id'    => $library_id,
                    'name'          => ucwords(\App\Helpers\generateRandomNameWords()),
                    'availability'  => true,
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
        }

        Book::insert($books);
    }
}
