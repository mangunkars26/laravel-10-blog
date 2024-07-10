<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
            ->count(150)
            ->create()
            ->each(function ($post) {
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $post->categories()->attach($categories);
            });
    }
}
