<?php

namespace App\Core;

use PDO;
use PDOException;

class Database extends PDO
{
    private static $instance;
    private const DBHOST = '';
    private const DBUSER = '';
    private const DBPASS = '';
    private const DBNAME = '';


    private function __construct()
    {
        $_dsn = 'mysql:dbname='.self::DBNAME. ';hosts='.self::DBHOST;

        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    
}