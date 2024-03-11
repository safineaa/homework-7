<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1', 
                'title' => 'post 1', 
                'content' => 'post 3 content'
            ],
            [
                'id' => '2', 
                'title' => 'post 2', 
                'content' => 'post 2 content'
            ]
        ];
    }
}
