<?php

    function getConnection(){
        
        $pass = 'positivo';
        $user = 'root';
        $dsn = 'mysql:host=localhost; dbname=appgerenciamento';
        
        try{
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
            
        }catch(PDOException $ex){
            
            echo 'Erro ' . $ex->getMessage();
        } 
    }
?>  