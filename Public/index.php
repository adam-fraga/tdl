<?php
session_start();
//Constante contenant le dossier racine du projet
define('ROOT', dirname(__DIR__));

//Autoloader
require_once ROOT . '/vendor/autoload.php';

//Instance du router
$router = new \App\Core\Main();

//Appel de la methode start du routeur (Core/Main.php)
$router->start();