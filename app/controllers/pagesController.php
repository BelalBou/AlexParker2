<?php

namespace App\Controllers\PagesController;
use \PDO;

function homeAction(PDO $connexion)
{

    include_once '../app/models/postModel.php';
    $posts = \App\Models\PostModel\findAll($connexion);


    global $content, $title;
    $title = "Alex Parker - Blog";
    ob_start();
    include "../app/views/pages/home.php";
    $content = ob_get_clean();
}