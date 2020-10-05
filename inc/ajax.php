<?php

    spl_autoload_register(function ($class) {
        include '../classes/' . $class . '.php';
    });

    $userData = [
        'name' => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
        'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
    ];

    $user = new User();
    $userId = $user->create($userData);


    if(!$userId){
        return;
    }

    $postData = [
        'title' => filter_var($_POST['title'], FILTER_SANITIZE_STRING),
        'body' => filter_var($_POST['body'], FILTER_SANITIZE_STRING),
        'user_id' => $userId,
    ];

    $post = new Post();
    $post->store($postData);


