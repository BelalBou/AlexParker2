<?php

namespace App\Models\PostModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT * 
    FROM posts p
    INNER JOIN categories as c
    ON p.category_id = c.id
    ORDER BY p.created_at 
    DESC LIMIT 10";


    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}