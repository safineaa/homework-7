<?php

namespace app\controllers;
use app\core\Controller;
class PostController extends Controller
{
//todo make a method to return some posts, post objects should come from the post model class
//also need to make a twig template to show the posts
//an example is in app/controllers/UsersController
public function index()
    {
        $postModel = new Post();
        $posts = $postModel->getAllPosts(); 

        $template = $this->twig->load('posts/posts.twig'); 
        echo $template->render(['posts' => $posts]);
    }

    public function createPost() {
        $name = $_POST['name'] ? $_POST['name'] : false;
        $description = $_POST['description'] ? $_POST['description'] : false;
        $errors = [];

        
        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'Name is too short';
            }
        } else {
            $errors['requiredName'] = 'Name is required';
        }

        
        if (!$description) {
            $errors['requiredDescription'] = 'Description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        
        echo json_encode(['success' => 'Post created successfully']);
        exit();
    }


}