<?php

use App\Controllers\PostsController;

if (isset($_GET['posts'])):
    include_once '../app/routers/posts.php';
else :
    include_once "../app/controllers/postsController.php";
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    \App\Controllers\PostsController\indexAction($connexion, $page);
endif;