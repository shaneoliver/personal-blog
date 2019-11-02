<?php

namespace Tests\Feature;

use App\User;
use App\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_retrieve_list_of_articles()
    {
        factory(User::class, 5)->create()->each(function ($user) {
            $user->articles()->save(factory(Article::class)->make());
        });

        $response = $this->get(route('articles.index'));

        $response->assertStatus(200);

        $this->assertEquals(Article::count(), 5);
    }
}
