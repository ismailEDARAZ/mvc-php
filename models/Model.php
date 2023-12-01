<?php

namespace Models;

use Config\DB;
use PDO;

class Model{

    public $pdo;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->pdo = new PDO("mysql:dbname=".DB::DB_NAME.";host=".DB::DB_HOST, DB::DB_USERNAME, DB::DB_USERNAME,[ \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ]);
    }

    public function getOne(string $table, int $id)
    {

    }

    public function all(string $table)
    {
        $this->pdo->query();
    }
}