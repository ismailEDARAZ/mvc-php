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

    public static function where($table,$key,$value)
    {
        $instance = new self();
        return $instance->getWhere($table,$key,$value);
    }

    public static function all(string $table)
    {
        $instance = new self();
        return $instance->getAll($table);
    }

    public function getAll($table)
    {
        $stat = $this->pdo->query("SELECT * FROM $table");
        return $stat->fetchAll();
    }

    public function getWhere($table,$key,$value)
    {
        $stat = $this->pdo->prepare("SELECT * FROM $table WHERE $key=?");
        $stat->execute([$value]);

        return $stat->fetch();
    }
}