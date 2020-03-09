<?php

class Dbh{
    private $servername;
    private $username;
    private $password;
    private $dbName;
    private $charset;

    public function connect(){
        $this ->servername = "localhost";
        $this ->username = "root";
        $this ->password = "";
        $this ->dbname = "project"; 
        $this ->charset = "utf8mb4";

        
        try{
            $dsn = "mysql:host=". $this ->servername.";dbname=".$this ->dbname.";charset=".$this ->charset;
            $pdo = new PDO($dsn, $this ->username, $this ->password);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        
    }catch(PDOException $e){
        echo "Connection Failed: ". $e->getMessage();

  }
 }
}