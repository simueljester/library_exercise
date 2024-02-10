<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Library::create([
            'name' => 'Library 1'
        ]);

        Library::create([
            'name' => 'Library 2'
        ]);
    }
}
