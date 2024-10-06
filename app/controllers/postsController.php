<?php

namespace App\Controllers\PostsController;
use \PDO;

function indexAction(PDO $connexion)
{

    include_once '../app/models/postModel.php';
    $posts = \App\Models\PostModel\findAll($connexion);


    global $content, $title;
    $title = "Alex Parker - Blog";
    ob_start();
    include "../app/views/posts/index.php";
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/postModel.php';
    $post = \App\Models\PostModel\findOneById($connexion, $id);

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include "../app/views/posts/show.php";
    $content = ob_get_clean();
}