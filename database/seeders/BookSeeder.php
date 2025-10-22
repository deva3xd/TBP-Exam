<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categoryId = Category::pluck('id')->toArray();
        $authorId = Author::pluck('id')->toArray();

        $books = Book::factory()
            ->count(10000)
            ->make()
            ->each(function($book) use ($categoryId, $authorId) {
                $book->category_id = $categoryId[array_rand($categoryId)];
                $book->author_id = $authorId[array_rand($authorId)];
            }
        );

        Book::insert($books->toArray());
    }
}
