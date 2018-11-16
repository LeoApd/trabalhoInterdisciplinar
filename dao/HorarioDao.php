<?php
    
    include '../connection/Connection.php';
    include '../classes/Horario.php';
    
    class HorarioDao{

        function save($horario) {
            $con = getConnection();
            $sql = 'INSERT INTO horario (codigo, linha, poi, pof, hi, hf) VALUES(?,?,?,?,?,?)';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $horario->getCodigo());
            $stmt->bindValue(2, $horario->getLinha());
            $stmt->bindValue(3, $horario->getPoi());
            $stmt->bindValue(4, $horario->getPof());
            $stmt->bindValue(5, $horario->getHi());
            $stmt->bindValue(6, $horario->getHf());

            $stmt->execute();
 
           return $stmt;
       }

        function findAll(){
            $con = getConnection();
            $sql = "SELECT * FROM horario";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();
            //var_dump($result);
            return $result;

       }
       
       function delete($id){
            $con = getConnection();
            $sql = 'DELETE FROM horario WHERE id = ?';  
            $stmt = $con->prepare($sql);
            
            $stmt->bindValue(1, $id);
            $stmt->execute();
            
            return $stmt;
       }

    }
?>