<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory()
        //     ->count(150)
        //     ->create()
        //     ->each(function ($post) {
        //         $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
        //         $post->categories()->attach($categories);
        //     });
    }
}
