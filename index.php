<?php
include_once('./scripts/config.scr.php');
include_once('./classes/ClassRoutes.php');
include_once('./controllers/controllerUser.php');
include_once('./controllers/controllerRoutes.php');
include_once('./scripts/routes.scr.php');



if (in_array($_GET['url'], Routes::$validpaths) == false) {
    header('location: ./404');
}