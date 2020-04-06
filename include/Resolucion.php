<?php

    class Resolucion {
        protected $idPrueba;
        protected $idEquipo;
        protected $resuelta;
        protected $intentos;
        protected $estrellas;

        public function getidPrueba() {return $this->idPrueba;}
        public function getidEquipo() {return $this->idEquipo;}
        public function getresuelta() {return $this->resuelta;} 
        public function getintentos() {return $this->intentos;}
        public function getEstrellas() {return $this->estrellas;}

        public function __construct($row) {
            $this->idPartida = $row['idPartida'];
            $this->idEquipo = $row['idEquipo'];
            $this->resuelta = $row['resuelta'];
            $this->intentos = $row['intentos'];
            $this->estrellas = $row['estrellas'];   
        }
    }

?>