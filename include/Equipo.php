<?php

    class Equipo {
        protected $id;
        protected $codigo;
        protected $nombre;
        protected $tiempo;
        protected $idPartida;
        protected $num_equipos;

        public function getid() {return $this->id;}
        public function getcodigo() {return $this->codigo;}
        public function getnombre() {return $this->nombre;} 
        public function gettiempo() {return $this->tiempo;}
        public function getidPartida() {return $this->idPartida;}
        public function getnum_equipos() {return $this->num_equipos;}

        public function __construct($row) {
            if(isset($row['id'])){$this->id = $row['id'];}
            if(isset($row['codigo'])){$this->codigo = $row['codigo'];}
            if(isset($row['nombre'])){$this->nombre = $row['nombre'];}
            if(isset($row['tiempo'])){$this->tiempo = $row['tiempo'];}
            if(isset($row['idPartida'])){$this->idPartida = $row['idPartida'];}
            if(isset($row['username'])){$this->username = $row['username'];}
            if(isset($row['num_equipos'])){$this->num_equipos = $row['num_equipos'];}      
        }
    }

?>