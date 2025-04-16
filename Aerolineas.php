<?php
    class Aerolineas{
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

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion de la aerolinea:".
            "\n -> Identificacion:".$this->getId().
            "\n -> Nombre:".$this->getNombre().
            "\nVuelos:".implode(',',$this->getColeccionDeVuelos());
        }

        public function darVueloADestino($destino, $cantAsientosLibres){
            $colVuelosXDestino = [];
            $this->coleccionDeVuelosProgramados = [];
            foreach ($this->coleccionDeVuelosProgramados as $unVuelo){
                $elDestino = $unVuelo->getDestino();
                $asientos = $unVuelo->getAsientosDisponibles();
                if(($elDestino == $destino)&&($asientos >= $cantAsientosLibres)){
                    $colVuelosXDestino = array_push($colVuelosXDestino, $unVuelo);
                }
            }
            return $colVuelosXDestino;
        }

        public function incorporarVuelo($objVuelo){
            $incorporacionCorrecta = false;
            $vuelos = null;
            foreach($this->coleccionDeVuelosProgramados as $unVuelo){
                $elDestino = $unVuelo->getDestino();
                $fecha = $unVuelo->getFecha();
                $horario = $unVuelo->getHoraPartida();
                if($elDestino != ($objVuelo->getDestino())){
                    if($fecha != ($objVuelo->getFecha())){
                        if($horario != ($objVuelo->getHoraPartida())){
                            $vuelos = $this->coleccionDeVuelosProgramados;
                            array_push($vuelos, $objVuelo);
                            $this->setColeccionDeVuelos($vuelos);
                            $incorporacionCorrecta = true;
                        }
                    }
                }
            }
            return $incorporacionCorrecta;
        }

        public function venderVueloADestino($cantAsientos, $destino, $unaFecha){
            $vueloDisponible = false;
            $i = 0;
            $venta = null;
            while(!$vueloDisponible && ($i < count($this->coleccionDeVuelosProgramados))){
                $unVuelo = $this->coleccionDeVuelosProgramados[$i];
                $elDestino = $unVuelo->getDestino();
                $fecha = $unVuelo->getFecha();
                $cant_asientos = $unVuelo->getCantidadAsientosDisponibles();

                if($cant_asientos >= $cantAsientos){
                    if($elDestino == $destino){
                        if($fecha == $unaFecha){
                            $vueloDisponible = true;
                        }
                    }
                }
                $i++;
            }
            if($vueloDisponible){
                //$vueloAnterior es para obtener el $i anterior de la repetitiva while.
                $vueloAnterior = $this->coleccionDeVuelosProgramados[$i-1];
                $venta = $vueloAnterior->asignarAsientosDisponibles();
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
    }
?>