<?php

// tests/Unit/PostFactoryTest.php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostFactoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_post_with_valid_attributes()
    {
        $post = Post::factory()->create();

        $this->assertNotNull($post->title);
        $this->assertNotNull($post->slug);
        $this->assertNotNull($post->thumbnail);
        $this->assertNotNull($post->body);
        $this->assertNotNull($post->active);
        $this->assertNotNull($post->published_at);
        $this->assertNotNull($post->user_id);
    }

    /** @test */
    public function it_creates_a_post_with_a_user()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }
}
