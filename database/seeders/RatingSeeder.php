<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\Book;
use App\Models\User;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $bookId = Book::pluck('id')->toArray();
        $userId = User::pluck('id')->toArray();

        $ratings = Rating::factory()
            ->count(20000)
            ->make()
            ->each(function($rating) use ($bookId, $userId) {
                $rating->book_id = $bookId[array_rand($bookId)];
                $rating->user_id = $userId[array_rand($userId)];
            }
        );

        Rating::insert($ratings->toArray());
    }
}
