<?php

class CreatePostsTest extends FeatureTestCase
{
    function test_a_user_create_a_post()
    {   // Having
        $title = 'Esto es un titulo';
        $content = 'Esto es un contenido para el post.';

        $this->actingAs($user = $this->defaultUser());

        // When
        $this->visit(route('posts.create'))
            ->type($title,'title')
            ->type($content,'content')
            ->press('Publicar');

        // Then
        $this->seeInDatabase('posts',[
            'title'     =>  $title,
            'content'   =>  $content,
            'pending'   =>  true,
            'user_id'   => $user->id
            ]);
        // Test a user is redirected to the posts details after creating it.
        $this->see($title);
    }
}