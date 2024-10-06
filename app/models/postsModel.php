<?php

namespace App\Models\PostsModel;


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


function createOne(PDO $connexion, array $data): bool
{

    $sql = "INSERT INTO posts (title, text, quote, created_at, category_id)
            VALUES (:title, :text, :quote, NOW(), :category_id)";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    $rs->execute();
    return $connexion->lastInsertId();
}

function updateOneById(PDO $connexion, int $id, array $data): bool  
{
    $sql = "UPDATE posts 
            SET title = :title,
                text = :text,
                quote = :quote,
                category_id = :category_id
            WHERE id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);

    return $rs->execute();
    
}