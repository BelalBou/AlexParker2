<?php

//route par défaut
//pattern: /
// CTRL: pagesController
// ACTION: homeAction

include_once "../app/controllers/pagesController.php";
\App\Controllers\PagesController\homeAction($connexion);