<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\TasksModel;

class TasksController extends Controller
{
    /**
     * Methode listant la liste des tâche présenet en base de données
     */
    public function index()
    {
        //Instancie le modele correspondant à la table Task
        $tasksModel = new TasksModel();
        //Recupere toutes les tâches présentes en DB
        $tasks = $tasksModel->getAll();
        //On genere la vue
        $this->render('tasks/index', ['tasks' => $tasks]);
    }

    /** Cette methode affiche les détails d'une taches spécifique quand l'utilisateur clique dessus
     * @param int $id
     */
    public function oneTask(int $id)
    {
        //On instancie le modèle
        $tasksModel = new TasksModel();
        //On vas chercher une tâche
        $task = $tasksModel->getOne();
        //On envoie à la vue
        $this->render('tasks/oneTask', ['task' => $task]);
    }


}

