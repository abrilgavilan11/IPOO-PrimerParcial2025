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
            $this->coleccionDeAerolineas = [];
            $aerolineaEncontrada = false;
            $i = 0;
            $aerolinea = null;

            while(!$aerolineaEncontrada &&($i < count($this->getColeccionDeAerolineas()))){
                $nombreAerolinea = $objAerolinea->getNombre();
                if($objAerolinea->getNombre() == $nombreAerolinea){
                    $aerolineaEncontrada = true;
                    array_push($this->coleccionDeAerolineas, $objAerolinea);
                }
            }
            if($aerolineaEncontrada){
                $aerolinea = $objAerolinea->asignarAsientosDisponibles();
            }
            return $aerolinea;
        }

        public function ventaAutomatica($cantAsientos, $fecha, $destino){
            $ventaRealizada = false;
            $i=0;
            $aerolineaEncontrada = false;
            $this->coleccionDeAerolineas = [];
            while(!$ventaRealizada &&($i < count($this->getColeccionDeAerolineas()))){
                $coleccionVuelos = $this->retornarVuelosAerolinea($this->coleccionDeAerolineas[$i]->getNombre());
                $j = 0;
                while(!$aerolineaEncontrada &&($j < count($coleccionVuelos))){
                    if(($coleccionVuelos[$j]->getFecha() == $fecha)&&($coleccionVuelos[$j]->getDestino() == $destino)&&($coleccionVuelos[$j]->getAsientosDisponibles() >= $cantAsientos)){
                        $aerolineaEncontrada = true;
                    }
                    $j++;
                }
                if($aerolineaEncontrada){
                    $ventaRealizada = true;
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