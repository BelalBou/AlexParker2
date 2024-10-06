<?php
    

use App\Controllers\PostsController;

if(isset($_GET['id'])):
include_once "../app/controllers/postsController.php";
\App\Controllers\PostsController\showAction($connexion, $_GET['id']);
else :
include_once "../app/controllers/postsController.php";
\App\Controllers\PostsController\indexAction($connexion);
endif;