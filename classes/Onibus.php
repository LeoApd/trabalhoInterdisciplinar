<?php

    class Onibus{

        private $id;
        private $codigo;
        private $numero;
        private $nomeRota;

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

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setNomeRota($nomeRota){
            $this->nomeRota = $nomeRota;
        }

        public function getNomeRota(){
            return $this->nomeRota;
        }



    }
?>