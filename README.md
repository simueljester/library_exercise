# Laravel Library Exercise
In this project, I aim to provide a hands-on experience that combines Laravel's functions with the implementation of Object-Oriented Programming (OOP) and SOLID principles. 

**Laravel Version 10**

### Installation

Composer:
`composer install`

NPM: `npm install`

Migration: `php artisan migrate`

Seeders:    
`php artisan db:seed --class=LibraryTableSeeder`

`php artisan db:seed --class=BooksTableSeeder`

OR

`php artisan db:seed --class=LibraryTableSeeder --class=BooksTableSeeder`


### Run
1. `npm run dev` or `npm run build`

2. `php artisan serve`



### Functions
1. **Migrations** - run migrations to setup the tables.

2.  **Seeders** - run seeders to fill the table Library and Books.

    `php artisan db:seed --class=LibraryTableSeeder`

    `php artisan db:seed --class=BooksTableSeeder`



3. **Helpers** - Helpers used for generating static and computation functions.

4. **Accessors** - Some laravel function like accessors are also implemented in this exercise.

    `<!-- BookAssignment Model -->
    getFormattedBorrowedTimeAttribute()`

5. **Repository Pattern** -  a design pattern used to apply the following:
 > **Single Responsibility Principle**  

 > **Open/Closed Principle**

 > **Abstraction**

eg.
    `BaseRepository.php` - it applies the SRP, O/CP and Abstraction. This file only provides CRUD Eloquent Operation 
    

6. **Relationships** - Eloquent Relationships also applied in this exercise. This is located on any Models on this project.

7. **Validations** 
8. **API Endpoints**
