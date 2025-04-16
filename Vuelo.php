<?php
    class Vuelo{
        //ATRIBUTOS:
        private $numero;
        private $importe;
        private $fecha;
        private $destino;
        private $horaArribo;
        private $horaPartida;
        private $cantAsientosTotales;
        private $cantAsientosDisponibles;
        private $objPersonaResponsable;

        //CONSTRUCTOR:
        public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $cantAsientosTotales, $cantAsientosDisponibles, $objPersonaResponsable){
          $this->numero = $numero;  
          $this->importe = $importe;  
          $this->fecha = $fecha;  
          $this->destino = $destino;  
          $this->horaArribo = $horaArribo;  
          $this->horaPartida = $horaPartida;  
          $this->cantAsientosTotales = $cantAsientosTotales;  
          $this->cantAsientosDisponibles = $cantAsientosDisponibles;  
          $this->objPersonaResponsable = $objPersonaResponsable;  
        }

        //METODOS DE ACCESO:
        //Getters:
        public function getNumero(){
            return $this->numero;
        }
        public function getImporte(){
            return $this->importe;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getDestino(){
            return $this->destino;
        }
        public function getHoraArribo(){
            return $this->horaArribo;
        }
        public function getHoraPartida(){
            return $this->horaPartida;
        }
        public function getCantAsientosTotales(){
            return $this->cantAsientosTotales;
        }
        public function getCantAsientosDisponibles(){
            return $this->cantAsientosDisponibles;
        }
        public function getObjPersonaResponsable(){
            return $this->objPersonaResponsable;
        }

        //Setters:
        public function setNumero($numero){
            $this->numero = $numero;
        }
        public function setImporte($importe){
            $this->importe = $importe;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function setDestino($destino){
            $this->destino = $destino;
        }
        public function setHoraArribo($horaArribo){
            $this->horaArribo = $horaArribo;
        }
        public function setHoraPartida($horaPartida){
            $this->horaPartida = $horaPartida;
        }
        public function setCantAsientosTotales($cantAsientosTotales){
            $this->cantAsientosTotales = $cantAsientosTotales;
        }
        public function setCantAsientosDisponibles($cantAsientosDisponibles){
            $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        }
        public function setObjPersonaResponsable($objPersonaResponsable){
            $this->objPersonaResponsable = $objPersonaResponsable;
        }

        //CADENA DE CARACTERES CON LOS VALORES DE LOS ATRIBUTOS.
        public function __toString(){
            return
            "\nInformacion del vuelo:".
            "\n -> Numero:".$this->getNumero().
            "\n -> Importe:".$this->getImporte().
            "\n -> Fecha:".$this->getFecha().
            "\n -> Destino:".$this->getDestino().
            "\n -> Hora de arribo:".$this->getHoraArribo().
            "\n -> Hora de partida:".$this->getHoraPartida().
            "\n -> Cantidad de asientos totales:".$this->getCantAsientosTotales().
            "\n -> Cantidad de asientos disponibles:".$this->getCantAsientosDisponibles().
            $this->getObjPersonaResponsable();
        }

        public function  asignarAsientosDisponibles($cantAsientos){
            $asignacionCompleta = false;
            if($cantAsientos <= $this->cantAsientosTotales){
                $cantAsientosRestantes = $this->cantAsientosTotales - $cantAsientos;
                $this->setCantAsientosDisponibles($cantAsientosRestantes);
                $asignacionCompleta = true;
            }
            return $asignacionCompleta;
        }

    }
?>