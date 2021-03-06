<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name'  =>  'Kontiki Velasco'
        ]);

        $post = factory(App\Post::class)->make([
            'title'     =>  'Como instalar laravel',
            'content'   =>  'Esto es el contenido del post'
        ]);

        $user->posts()->save($post);

        // When
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
    function test_old_urls_are_redirected()
    {
        // Having
        $user = $this->defaultUser();
        $post = factory(\App\Post::class)->make([
            'title' => 'Old title',
        ]);
        $user->posts()->save($post);
        $url = $post->url;
        $post->update(['title' => 'New title']);
        $this->visit($url)
            ->seePageIs($post->url);
    }
}
