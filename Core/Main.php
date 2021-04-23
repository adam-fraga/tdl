<?php

namespace App\Core;

use App\Controllers\MainController;

/**
 * Routeur Principal
 * @package App\Core
 */
class Main
{
    public function start()
    {
        //On retire le trailing slash de l'URL pour éviter le duplicate content (SEO UP)
        $uri = $_SERVER['REQUEST_URI'];
        //On verifie que URI est pas vide et se termine par un slash
        if (isset($uri) && $uri !== '\/' && $uri[-1] === '/') {
            $uri = substr($uri, 0, -1);
            //Code de rediretion permanente
            http_response_code(301);
            //Redirection vers l'url
            header('location:' . $uri . '/Main');
        }
        //Gere les parametres dans l'url
        // p=controlleur/methode/paramètre
        $params = explode('/', $_GET['p']);
        //On Vérifie si on a au moins un paramètre
        if ($params[0] != '') {
            //On récupere le nom du controller à instancié (1er parametre du tableau)
            //Majuscule, namespace complet et Controller à la fin
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';

            $controller = new $controller();

            //On récupere le 2eme parameter de l'url
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (method_exists($controller, $action)) {
                //Si il reste des parametre
                isset($params[0]) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
            } else {
                http_response_code(404);
                echo "404 Page Not Found";
            }
        } //Pas de parametre dans l'url on instancie le controller par defaut
        else {
            $controller = new MainController();
            $controller->index();
        }
    }
}