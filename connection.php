<?php

class Database{
    
    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "@Chamidu12345", "myweb",3306);
        }
    }

    public static function search($query){
        Database::setUpConnection();
        $rs = Database::$connection->query($query);
        return $rs;
    }

    public static function iud($query){
        Database::setUpConnection();
        Database::$connection->query($query);
    }
    
}

?>