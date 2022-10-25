<?php 

namespace MVC\core;

use Dcblogdev\PdoWrapper\Database;
use mysqli;

class model{
    


    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "boutique_project";

    public function db(){

        $options = [
            //required
            'username' => 'root',
            'database' => 'boutique_project',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];
        
        $db = new Database($options);

        // return $db;
        static $db;
        return isset( $db ) ? $db : $db = new Database($options);   

    }

    // public function connect(){
    //     $this->conn = new mysqli( $this->servername,$this->username,$this->password,$this->dbname);
    //     return $this->conn;
    // }


}