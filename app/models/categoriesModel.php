<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
    FROM categories
    ORDER BY name ASC;";

    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}