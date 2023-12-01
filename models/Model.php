<?php

namespace Models;

use Config\DB;
use PDO;
use PDOException;

class Model{

    protected PDO $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:dbname=' . DB::DB_NAME . ';host=' . DB::DB_HOST, Db::DB_USERNAME, DB::DB_PASSWORD, [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getOne(string $table, int $id)
    {
        $stat = $this->pdo->prepare("SELECT * FROM $table WHERE id=?");
        $stat->execute([$id]);

        return $stat->fetch();
    }

    public function all(string $table)
    {
        $stat = $this->pdo->query("SELECT * FROM $table");

        return $stat->fetchAll();
    }
}