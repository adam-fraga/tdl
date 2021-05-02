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
