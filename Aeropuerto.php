<?php
    class Aeropuerto{
        //ATRIBUTOS:
        private $denom;
        private $direc;
        private $coleccionDeAerolineas;

        //CONSTRUCTOR:
        public function __construct($denom, $direc, $coleccionDeAerolineas){
            $this->denom = $denom;
            $this->direc = $direc;
            $this->coleccionDeAerolineas = $coleccionDeAerolineas;
        }

        //METODOS DE ACCESO:
        //Getters:
        public function getDenominacion(){
            return $this->denom;
        }
        public function getDireccion(){
            return $this->direc;
        }
        public function getColeccionDeAerolineas(){
            return $this->coleccionDeAerolineas;
        }

        //Setters:
        public function setDenominacion($denom){
            $this->denom = $denom;
        }
        public function setDireccion($direc){
            $this->direc = $direc;
        }
        public function setColeccionDeAerolineas($coleccionDeAerolineas){
            $this->coleccionDeAerolineas = $coleccionDeAerolineas;
        }

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion del aeropuerto:".
            "\n -> Denominacion:".$this->getDenominacion().
            "\n -> Direccion:".$this->getDireccion().
            "\nAerolineas:".implode(',',$this->getColeccionDeAerolineas());
        }

        public function  retornarVuelosAerolinea($objAerolinea){
            $this->coleccionDeAerolineas = [];
            foreach($objAerolinea->getColeccionDeVuelosProgramados() as $unaAerolinea){
                $nombreAerolinea = $unaAerolinea->getNombre();
                if($objAerolinea->getNombre() == $nombreAerolinea){
                    $this->coleccionDeAerolineas = array_push($this->coleccionDeAerolineas, $unaAerolinea);
                }
            }
            return $this->coleccionDeAerolineas;
        }

        public function ventaAutomatica($cantAsientos, $fecha, $destino){
            
        }

    }

?>