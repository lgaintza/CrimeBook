<?php
    class Partida {
        protected $id;
        protected $nombre;
        protected $fechaCreacion;
        protected $fechaInicio;
        protected $idJuego;
        protected $username;
        protected $finalizada;
        protected $duracion;
        protected $num_equipospartida;
        
        public function getid() {return $this->id;}
        public function getnombre() {return $this->nombre;}
        public function getfechaCreacion() {return $this->fechaCreacion;}
        public function getfechaInicio() {return $this->fechaInicio;}
        public function getidJuego() {return $this->idJuego;}
        public function getusername() {return $this->username;}
        public function getfinalizada() {return $this->finalizada;}
        public function getduracion() {return $this->duracion;}
        public function getnum_equipospartida() {return $this->num_equipospartida;}
        
        public function __construct($row) {
            if(isset($row['id'])){$this->id = $row['id'];}
            if(isset($row['nombre'])){$this->nombre = $row['nombre'];}
            if(isset($row['fechaCreacion'])){$this->fechaCreacion = $row['fechaCreacion'];}
            if(isset($row['fechaInicio'])){$this->fechaInicio = $row['fechaInicio'];}
            if(isset($row['idJuego'])){$this->idJuego = $row['idJuego'];}
            if(isset($row['username'])){$this->username = $row['username'];}
            if(isset($row['finalizada'])){$this->finalizada = $row['finalizada'];}
            if(isset($row['duracion'])){$this->duracion = $row['duracion'];} 
            if(isset($row['num_equipospartida'])){$this->num_equipospartida = $row['num_equipospartida'];}   
        }
    }
?>