<?php

use \App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):
    case 'show':
        PostsController\showAction($connexion, $_GET['id']);
        break;
    case 'addForm':
        PostsController\addFormAction($connexion);
        break;
    default:
        PostsController\indexAction($connexion);
endswitch;
