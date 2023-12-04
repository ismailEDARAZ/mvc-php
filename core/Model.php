<?php

namespace Core;

use Config\DB;
use PDO;
use PDOException;

class Model{

    protected PDO $pdo;
    protected $table;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:dbname=' . DB::DB_NAME . ';host=' . DB::DB_HOST, Db::DB_USERNAME, DB::DB_PASSWORD, [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function where($key,$value)
    {
        $stat = $this->pdo->prepare("SELECT * FROM $this->table WHERE $key=?");
        $stat->execute([$value]);

        return $stat->fetch();
    }

    public function all()
    {
        $stat = $this->pdo->query("SELECT * FROM $this->table");

        return $stat->fetchAll();
    }
}