<?php

// tests/Unit/PostSeederTest.php

namespace Tests\Unit;

use App\Models\Post;
use Database\Seeders\PostSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
