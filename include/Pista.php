<?php

    class Pista {
        protected $idPrueba;
        protected $id;
        protected $texto;
        protected $tiempo;
        protected $intentos;
        

        public function getidPrueba() {return $this->idPrueba;}
        public function getid() {return $this->id;}
        public function gettexto() {return $this->texto;} 
        public function gettiempo() {return $this->tiempo;}
        public function getintentos() {return $this->intentos;}
      

        public function __construct($row) {
            $this->idPrueba = $row['idPrueba'];
            $this->id = $row['id'];
            $this->texto = $row['texto'];
            $this->tiempo = $row['tiempo'];
            $this->intentos = $row['intentos'];
        
        }

        public function nuevoId($nuevoId)
    {
        $this->id=$nuevoId; 
    }
    }

?>
