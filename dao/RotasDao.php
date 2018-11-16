<?php
    
    include '../connection/Connection.php';
    include '../classes/Rotas.php';
    
    class RotasDao{

        function save($rotas) {
            $con = getConnection();
            $sql = 'INSERT INTO rotas (nomeRota, pontoInicial, pontoFinal) VALUES(?,?,?)';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $rotas->getNomeRota());
            $stmt->bindValue(2, $rotas->getPontoInicial());
            $stmt->bindValue(3, $rotas->getPontoFinal());
            $stmt->execute();
 
           return $stmt;
       }

        function findAll(){
            $con = getConnection();
            $sql = "SELECT * FROM rotas";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();
            //var_dump($result);
            return $result;

       }
       
       function delete($id){
            $con = getConnection();
            $sql = 'DELETE FROM rotas WHERE id = ?';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $id);
            $stmt->execute();
            
            return $stmt;
       }

    }
?>