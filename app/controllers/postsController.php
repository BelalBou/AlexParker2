<?php

namespace App\Controllers\PostsController;
use \PDO;

function indexAction(PDO $connexion, $page)
{
    global $totalPages;
    
    $limit = 10; // Nombre de posts par page 
    $offset = ($page - 1) * $limit; // Calcul de l'offset

    include_once '../app/models/postsModel.php';
    $posts = \App\Models\PostsModel\findAll($connexion, $limit, $offset);

    // Obtenir le nombre total de posts pour la pagination
    $totalPosts = \App\Models\PostsModel\countAllPosts($connexion);
    $totalPages = ceil($totalPosts / $limit);

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
    
    // Initialisation de la variable image
    $data['image'] = '';

    // Vérification de l'image uploadée
    if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = '../public/images/tpmp/'; // Répertoire tpmp
        $targetFile = $targetDir . $imageName;

        // Déplacer l'image dans le dossier public/images/tpmp
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Stocker le chemin relatif pour la base de données
            $data['image'] = '/AlexParker2/public/images/tpmp/' . $imageName;
        }
    }

    // Appel à la fonction du modèle pour créer un post
    $id = \App\Models\PostsModel\createOne($connexion, $data);
    header('Location: ' . BASE_PUBLIC_URL . 'posts');
}



function updateAction(PDO $connexion, int $id, array $data) {
    include_once '../app/models/postsModel.php';

    // Initialisation de la variable image
    $data['image'] = '';

    // Vérification de l'image uploadée
    if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = '../public/images/tpmp/'; // Répertoire tpmp
        $targetFile = $targetDir . $imageName;

        // Déplacer l'image dans le dossier public/images/tpmp
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Stocker le chemin relatif pour la base de données
            $data['image'] = '/AlexParker2/public/images/tpmp/' . $imageName;
        }
    }

    // Appel à la fonction du modèle pour mettre à jour un post
    $response = \App\Models\PostsModel\updateOneById($connexion, $id, $data);
    header('Location: ' . BASE_PUBLIC_URL . 'posts');
}



function editFormAction(PDO $connexion, int $id){
    include_once '../app/models/postsModel.php'; 
    $post = \App\Models\PostsModel\findOneById($connexion, $id); 
    global $content, $title;
    $title = "Alex Parker - Edit Post"; 
    ob_start();
    include '../app/views/posts/editForm.php'; 
    $content = ob_get_clean();
}


function deleteAction(PDO $connexion, int $id) {
    include_once "../app/models/postsModel.php";
    $response = \App\Models\PostsModel\deleteOneById($connexion, $id);

    header('Location: ' . BASE_PUBLIC_URL . 'posts');
    exit();
}
