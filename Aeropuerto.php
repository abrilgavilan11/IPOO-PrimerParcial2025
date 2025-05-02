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

        private function muestraArreglo($arreglo){
            $cadena = "";
        
            if(count($arreglo) > 0){
                for($i=0; $i < count($arreglo); $i++){
                    $cadena = $cadena . "Elemento N°". $i+1 . ": ". $arreglo[$i] ."\n";
                }
            } else {
                $cadena = "[Esta colección no tiene elementos]\n";
            }
            return $cadena;
        }

        public function  retornarVuelosAerolinea($objAerolinea){
            $aerolineaEncontrada = false;
            $i = 0;
            $vuelos = null;

            while(!$aerolineaEncontrada &&($i < count($this->getColeccionDeAerolineas()))){
                $unaAerolinea = $this->coleccionDeAerolineas[$i];
                if($unaAerolinea->getId() == $objAerolinea->getId()){
                    $vuelos = $unaAerolinea->getColeccionDeVuelos();
                    $aerolineaEncontrada = true;
                }
                $i++;
            }
            
            return $vuelos;
        }

        public function ventaAutomatica($cantAsientos, $fecha, $destino){
            $ventaRealizada = false;
            $i=0;
            while(!$ventaRealizada &&($i < count($this->getColeccionDeAerolineas()))){
                $aerolinea = $this->coleccionDeAerolineas[$i];
                $coleccionVuelos = $aerolinea->getColeccionDeVuelos();
                $j = 0;
                while(!$ventaRealizada &&($j < count($coleccionVuelos))){
                    $vuelo = $coleccionVuelos[$j];
                    if(($vuelo->getFecha() == $fecha)&&($vuelo->getDestino() == $destino)&&($vuelo->getCantAsientosDisponibles() >= $cantAsientos)){
                        $ventaRealizada = true;
                    }
                    $j++;
                }
                $i++;
            }
            return $ventaRealizada;
        }

        public function promedioRecaudadoXAerolinea($idAerolinea){
            $importeTotalAerolinea = 0;
            $i = 0;
            $aerolineaEncontrada = false;
            $colAerolineas = $this->getColeccionDeAerolineas();
            while(!$aerolineaEncontrada &&($i < count($colAerolineas))){
                if($colAerolineas[$i]->getId() == $idAerolinea){
                    $aerolineaEncontrada = true;
                    $importeTotalAerolinea = $colAerolineas[$i]->montoPromedioRecaudado();
                }
                $i++;
            }
            return $importeTotalAerolinea;
        }

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion del aeropuerto:".
            "\n -> Denominacion:".$this->getDenominacion().
            "\n -> Direccion:".$this->getDireccion().
            "\nAerolineas:\n".$this->muestraArreglo($this->getColeccionDeAerolineas())."\n";
        }
    }

?>