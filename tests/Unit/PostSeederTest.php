<?php

// tests/Unit/PostSeederTest.php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Category;
use Database\Seeders\PostSeeder;

class PostSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_posts_correctly()
    {
        $this->seed(PostSeeder::class);

        $this->assertGreaterThan(0, Post::count());
    }

    /** @test */
    public function it_seeds_posts_with_categories()
    {
        $this->seed(PostSeeder::class);

        $post = Post::with('categories')->first();

        $this->assertNotEmpty($post->categories);
    }
}
