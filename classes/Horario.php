<?php

    class Horario{

        private $id;
        private $codigo;
        private $linha;
        private $poi;
        private $pof;
        private $hi;
        private $hf;


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }
       
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setLinha($linha){
            $this->linha = $linha;
        }

        public function getLinha(){
            return $this->linha;
        }

        public function setPoi($poi){
            $this->poi = $poi;
        }

        public function getPoi(){
            return $this->poi;
        }

        public function setPof($pof){
            $this->pof = $pof;
        }

        public function getPof(){
            return $this->pof;
        }

        public function setHi($hi){
            $this->hi = $hi;
        }

        public function getHi(){
            return $this->hi;
        }

        public function setHf($hf){
            $this->hf = $hf;
        }

        public function getHf(){
            return $this->hf;
        }




    }
?>