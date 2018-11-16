<?php

    class Rotas{

        private $nomeRota;
        private $pontoInicial;
        private $pontoFinal;

        public function setNomeRota($nomeRota){
            $this->nomeRota = $nomeRota;
        }

        public function getNomeRota(){
            return $this->nomeRota;
        }

        public function setPontoInicial($pontoInicial){
            $this->pontoInicial = $pontoInicial;
        }

        public function getPontoInicial(){
            return $this->pontoInicial;
        }

        public function setPontoFinal($pontoFinal){
            $this->pontoFinal = $pontoFinal;
        }

        public function getPontoFinal(){
            return $this->pontoFinal;
        }



    }
?>