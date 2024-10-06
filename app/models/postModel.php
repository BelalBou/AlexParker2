<?php

namespace App\Models\PostModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *, p.id as postID, c.id as categoryID
    FROM posts p
    INNER JOIN categories c ON p.category_id = c.id
    ORDER BY p.created_at 
    DESC LIMIT 10";


    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, $id)
{
    $sql = "SELECT *, p.id as postID, c.id as categoryID
    FROM posts p
    INNER JOIN categories c ON p.category_id = c.id
    WHERE p.id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetch(PDO::FETCH_ASSOC);
}