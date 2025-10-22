<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(2000)->create();
        // Author::factory(1000)->create();
        // Category::factory(3000)->create();
        
        $this->call([
            // BookSeeder::class,
            RatingSeeder::class,
        ]);
    }
}
