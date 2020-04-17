<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO
{  
    private $connection;
    
    private function checkConnection()
    {
        //Check connecton & call dbConnect()
        if($this->connection === null) {
            return $this->dbConnect();
        }
        //Return connection if it exist before (before I instance Database on each query, Be careful)
        return $this->connection;
    }
    
    private function dbConnect()
    {
        //Test dbConnection
        try{
            $this->connection = new PDO(DB_HOST,DB_USERNAME,DB_PWD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //Catch connection error
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }
    
    protected function createQuery($query, $parameters = null)
    {
        //Execute the prepare sqlQuery (without or with parameters)
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($query);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($query);
        return $result;
    }
}