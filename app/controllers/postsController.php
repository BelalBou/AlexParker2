<?php

namespace App\Controllers\PostsController;
use \PDO;

function indexAction(PDO $connexion)
{

    include_once '../app/models/postsModel.php';
    $posts = \App\Models\PostsModel\findAll($connexion);


    global $content, $title;
    $title = "Alex Parker - Blog";
    ob_start();
    include "../app/views/posts/index.php";
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/postsModel.php';
    $post = \App\Models\PostsModel\findOneById($connexion, $id);

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include "../app/views/posts/show.php";
    $content = ob_get_clean();
}

function addFormAction(PDO $connexion){

    global $content, $title;
    $title = "Alex Parker - Add a post";
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
}

function addAction(PDO $connexion, array $data) {

    include_once "../app/models/postsModel.php";
    $id = \App\Models\PostsModel\createOne($connexion, $data);
    header('Location: ' . BASE_PUBLIC_URL . 'posts');

}

