<?php

namespace App\Models;

use App\Core\Db;

class TasksModel extends Model
{
    private $_nom;
    private $_description;
    private $_dateCreation;
    private $_dateValidation;

    private $_id_utilisateur;
    private $_importance;

    /**
     *  Permet de set la table dynamiquement
     */
    function __construct()
    {
        parent::__construct();
        $this->_table = 'taches';
    }

    /**
     * @param TasksModel $Tache Objet de type Task
     * @param string $id Identifiant utilisateur
     */
    public function createTask(TasksModel $Tache, string $id)
    {
        $this->_db = new Db();
        //Date creation task
        $dateCreation = new \DateTime('now');
        $dateCreation->format('Y-m-d H:00');

        $query = "INSERT INTO" . $this->_table . "(nom, description, date_creation, date_validation,id_utilisateur, importance) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->_db->prepare($query);
        $stmt->bindValue(1, $this->_nom);
        $stmt->bindValue(2, $this->_description);
        $stmt->bindValue(3, $this->$dateCreation);
        $stmt->bindValue(4, $this->_dateValidation);
        $stmt->bindValue(5, $this->_id_utilisateur);
        $stmt->bindValue(6, $this->_importance);
        $stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->_dateCreation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation): void
    {
        $this->_dateCreation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getDateValidation()
    {
        return $this->_dateValidation;
    }

    /**
     * @param mixed $date_validation
     */
    public function setDateValidation($date_validation): void
    {
        $this->_dateValidation = $date_validation;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->_status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->_id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur): void
    {
        $this->_id_utilisateur = $id_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getImportance()
    {
        return $this->_importance;
    }

    /**
     * @param mixed $importance
     */
    public function setImportance($importance): void
    {
        $this->_importance = $importance;
    }
}
