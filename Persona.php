<?php
    class Persona{
        //ATRIBUTOS:
        private $nombre;
        private $apellido;
        private $direccion;
        private $mail;
        private $tel;

        //CONSTRUCTOR:
        public function __construct($nombre, $apellido, $direccion, $mail, $tel){
          $this->nombre = $nombre;  
          $this->apellido = $apellido;  
          $this->direccion = $direccion;  
          $this->mail = $mail;  
          $this->tel = $tel;  
        }

        //METODOS DE ACCESO:
        //Getters:
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getMail(){
            return $this->mail;
        }
        public function getTelefono(){
            return $this->tel;
        }

        //Setters:
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function setMail($mail){
            $this->mail = $mail;
        }
        public function setTelefono($tel){
            $this->tel = $tel;
        }

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion del responsable del vuelo:".
            "\n -> Nombre:".$this->getNombre().
            "\n -> Apellido:".$this->getApellido().
            "\n -> Direccion:".$this->getDireccion().
            "\n -> Mail:".$this->getMail().
            "\n -> Telefono:".$this->getTelefono();
        }
    }
?>