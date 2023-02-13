<?php
class Database {
        public $connection;
        public function __construct() {
            $serverName = "127.0.0.1";
            $username = "root";
            $password = "";
            $databaseName = "holidayplanner";
            try {
                $connection = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "connection failed " . $e->getMessage(); 
            }
            $this->connection = $connection;
        } 
    }  
?>