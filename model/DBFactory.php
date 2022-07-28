<?php

//Classe représentant la connexion à la bdd.


namespace Bastien\model;

class DBFactory
{

    /**
    * Methode qui permet d'intancier la connexion à la bdd en PDO.
    * @param void
    * @return object PDO
    */

    public function getMysqlConnexionWithPDO()
    {

        $data = require __DIR__ . '/../config/connect.php';
        $database = new \PDO('mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'] . ';port=' . $data['port'].
                      ';charset=utf8', $data['username'], $data['password']);

        //On émet une alerte à chaque fois qu'une requête a échoué.
        $database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

        return $database;
    }

    /**
    * Methode qui permet d'intancier la connexion à la bdd en MySQLi.
    * @param void
    * @return object MySQLi
    */

    public function getMysqlConnexionWithMySQLi()
    {

        return new MySQLi('127.0.0.1', 'root', '', 'portfolio');
    }
}
