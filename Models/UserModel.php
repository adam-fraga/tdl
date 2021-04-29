<?php

namespace App\Models;

use App\Core\Db;

class UserModel extends Model
{
    private $_prenom;
    private $_nom;
    private $_email;
    private $_password;

    /**
     * Permet de set la table dynamiquement et d'ouvrir la connexion
     */
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'utilisateurs';
    }

    /** Inscrit un utilisateur et lui fourni un ID
     * @param UserModel $userModel Objet UserModel représentatn un utilisateur
     * @return bool
     */
    public function subscribe(UserModel $userModel): bool
    {
        $this->_db = new Db();
        $this->_password = password_hash($this->_password, CRYPT_BLOWFISH);

        $query = "INSERT INTO " . $this->_table . "(prenom, nom, email, password) VALUES (?,?,?,?)";
        $stmt = $this->_db->prepare($query);
        $stmt->bindValue(1, $this->_prenom);
        $stmt->bindValue(2, $this->_nom);
        $stmt->bindValue(3, $this->_email);
        $stmt->bindValue(4, $this->_password);
        if ($stmt->execute()) {
            $query2 = "SELECT MAX(id) AS max_id, (id) FROM utilisateurs";
            $result = $this->_db->query($query2)->fetch(\PDO::FETCH_ASSOC);
            $userModel->setId($result['max_id']);
            return true;
        } else return false;
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
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->_prenom = $prenom;
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
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->_password = $password;
    }


}

