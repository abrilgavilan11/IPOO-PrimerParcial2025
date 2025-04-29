<?php
    class Aerolinea{
        //ATRIBUTOS:
        private $id;
        private $nombre;
        private $coleccionDeVuelosProgramados;

        //CONSTRUCTOR:
        public function __construct($id, $nombre, $coleccionDeVuelosProgramados){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->coleccionDeVuelosProgramados = $coleccionDeVuelosProgramados;
        }

        //METODOS DE ACCESO:
        //Getters:
        public function getId(){
            return $this->id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getColeccionDeVuelos(){
            return $this->coleccionDeVuelosProgramados;
        }

        //Setters:
        public function setId($id){
            $this->id = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setColeccionDeVuelos($coleccionDeVuelosProgramados){
            $this->coleccionDeVuelosProgramados = $coleccionDeVuelosProgramados;
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

        public function darVueloADestino($destino, $cantAsientosLibres){
            $colVuelosXDestino = [];
            $this->coleccionDeVuelosProgramados = [];
            foreach ($this->getColeccionDeVuelos() as $unVuelo){
                $elDestino = $unVuelo->getDestino();
                $asientos = $unVuelo->getAsientosDisponibles();
                if(($elDestino == $destino)&&($asientos >= $cantAsientosLibres)){
                    array_push($colVuelosXDestino, $unVuelo);
                }
            }
            return $colVuelosXDestino;
        }

        public function incorporarVuelo($objVuelo){
            $incorporacionCorrecta = false;
            $vuelos = null;
            $i = 0;

            while (!$incorporacionCorrecta && ($i < count($this->getColeccionDeVuelos()))){
                $elDestino = $objVuelo->getDestino();
                $fecha = $objVuelo->getFecha();
                $horario = $objVuelo->getHoraPartida();
                if (($elDestino != ($objVuelo->getDestino()))&&($fecha != ($objVuelo->getFecha()))&&($horario != ($objVuelo->getHoraPartida()))){
                    $vuelos = $this->coleccionDeVuelosProgramados;
                    array_push($vuelos, $objVuelo);
                    $this->setColeccionDeVuelos($vuelos);
                    $incorporacionCorrecta = true;
                }
                $i++;
            }
            if($incorporacionCorrecta){
                $vuelos = $this->coleccionDeVuelosProgramados;
            }
            return $incorporacionCorrecta;
        }

        public function venderVueloADestino($cantAsientos, $destino, $unaFecha){
            $vueloDisponible = false;
            $i = 0;
            while(!$vueloDisponible && ($i < count($this->getColeccionDeVuelos()))){
                $unVuelo = $this->coleccionDeVuelosProgramados[$i];
                $elDestino = $unVuelo->getDestino();
                $fecha = $unVuelo->getFecha();
                $cant_asientos = $unVuelo->getCantidadAsientosDisponibles();

                if(($cant_asientos >= $cantAsientos)&&($elDestino == $destino)&&($fecha == $unaFecha)){
                    $vueloDisponible = true;
                }
                $i++;
            }
            if($vueloDisponible){
                $venta = $unVuelo->asignarAsientosDisponibles();
            }
            return $venta;
        }

        public function montoPromedioRecaudado(){
            $importeTotal = 0;
            $promedio = 0;
            $cantVuelos = count($this->coleccionDeVuelosProgramados);
            if($cantVuelos > 0){
                foreach ($this->coleccionDeVuelosProgramados as $importe){
                    $importePorVuelo = $importe->getImporte();
                    $importeTotal = $importeTotal + $importePorVuelo;
                }
                $promedio = $importeTotal / $cantVuelos;
            }
            return $promedio;
        }

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion de la aerolinea:".
            "\n -> Identificacion:".$this->getId().
            "\n -> Nombre:".$this->getNombre().
            "\nVuelos:\n".$this->muestraArreglo($this->getColeccionDeVuelos())."\n";
        }
    }
?>