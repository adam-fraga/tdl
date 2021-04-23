<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO
{
    static PDO $DB_link;

    private const DB_host = 'localhost';
    private const DB_user = 'adam';
    private const DB_pass = 'adam6559571991!';
    private const DB_name = 'todolist';

    /**
     * Db constructor:
     * Constructeur herité de PDO paramètre la BDD
     */
    protected function __construct()
    {
        $_dsn = 'mysql:dbname=' . self::DB_name . ';host=' . self::DB_host;

        try {
            parent::__construct($_dsn, self::DB_user, self::DB_pass);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**Verifie si une instance de PDO est en cours sinon retourne une instance de connexion
     * @return $this
     */
    public function getInstance(): self
    {
        if (self::$DB_link === null) {
            self::$DB_link = new self();
        }
        return self::$DB_link;
    }
}