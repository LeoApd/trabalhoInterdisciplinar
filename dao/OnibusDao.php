<?php
    
    include '../connection/Connection.php';
    include '../classes/Onibus.php';
    
    class OnibusDao{

        function save($onibus) {
            $con = getConnection();
            $sql = 'INSERT INTO onibus (numero, codigo, nomeRota) VALUES(?,?,?)';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $onibus->getNumero());
            $stmt->bindValue(2, $onibus->getCodigo());
            $stmt->bindValue(3, $onibus->getNomeRota());
            $stmt->execute();
 
           return $stmt;
       }

        function findAll(){
            $con = getConnection();
            $sql = "SELECT * FROM onibus";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();
            //var_dump($result);
            return $result;

       }
       
       function delete($id){
            $con = getConnection();
            $sql = 'DELETE FROM onibus WHERE id = ?';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $id);
            $stmt->execute();
            
            return $stmt;
       }

    }
?>