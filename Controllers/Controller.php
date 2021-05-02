<?php

namespace App\Controllers;

abstract class Controller
{
    public function __construct()
    {
        session_start();
    }

    public function render(string $fichier, array $donnees = [], $template = 'default')
    {
        //On extrait le contenu de $donnees
        //extract éclate les clés d'un tableau en variables les clés sont
        // désormais des variable qui conseervent leurs valeurs.
        extract($donnees);

        //demarre le buffer de sortie
        ob_start();

        //On crée le chemin vers la vue
        require_once ROOT . '/Views/' . $fichier . '.php';

        //Récuperation des données en tampon dans $content
        $content = ob_get_clean();

        //Fabrication du template
        require_once ROOT . '/Views/' . $template . '.php';
    }
}