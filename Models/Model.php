<?php

namespace App\Models;


use App\Core\Db;
use PDO;
use PDOStatement;

class Model extends Db
{

    //Contient l'instance de la connexion
    protected $_db;

    // Propriétés permettant de personnaliser les requêtes
    protected string $_table;
    public $_id;

    /** Méthode permettant d'obtenir l'enregistrement d'une table
     * @return mixed
     */
    public function getOne()
    {
        $query = $this->requete("SELECT * FROM " . $this->_table . "WHERE id=" . $this->_id);
        return $query->fetch();
    }

    /** Methode permettant d'obtenir tout les enreistrement d'une table
     * @return array
     */
    public function getAll(): array
    {
        $query = $this->requete("SELECT * FROM " . $this->_table);
        return $query->fetchAll();
    }



    /** Execute les requêtes passé en paramètres
     * @param string $sql
     * @param array|null $attributs
     * @return false|PDOStatement
     */
    public function requete(string $sql, array $attributs = null)
    {
        //Instance de connexion
        $this->_db = new Db();
        //Verifie la présence d'attributs
        if ($attributs !== null) {
            $query = $this->_db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } //Requete simple
        else {
            return $this->_db->query($sql);
        }
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            //Recup setter correspondant avec la clés
            $setter = 'set' . ucfirst($key);
            //Verifie si le setter existe
            if (method_exists($this, $setter)) {
                //Appel le setter
                $this->$setter($value);
            }
        }

    }

    /**
     * Sécurise les données passés en parametre
     */
    public function secure($donnees): string
    {
        $donnees = strip_tags($donnees);
        return $donnees = htmlspecialchars($donnees);
    }
}