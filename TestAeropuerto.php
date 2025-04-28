<?php
    include_once "C:\Users\abril\OneDrive\Documentos\IPOO\php\IPOO-PrimerParcial2025\Persona.php";
    include_once "C:\Users\abril\OneDrive\Documentos\IPOO\php\IPOO-PrimerParcial2025\Vuelo.php";
    include_once "C:\Users\abril\OneDrive\Documentos\IPOO\php\IPOO-PrimerParcial2025\Aerolineas.php";
    include_once "C:\Users\abril\OneDrive\Documentos\IPOO\php\IPOO-PrimerParcial2025\Aeropuerto.php";

    $objPersona1= new Persona("Roberto", "Sanchez", "Av Pepito", "mail1@direc.com", 29965432);
    $objPersona2= new Persona("Maria", "Gavilan", "Av Arg", "mail2@direc.com", 29965342);

    //Crear  2 instancias de la clase Aerolíneas.
    $aerolinea1 = new Aerolineas(123, "FlyBondi", [$vuelo1, $vuelo2]);
    $aerolinea2 = new Aerolineas(321, "JetSmart", [$vuelo3, $vuelo4]);

    //Crear  4 instancias de la clase vuelo.
    //A cada instancia de Aerolínea creada en T1, incorporar 2 de los vuelos.
    
    $vuelo1 = new Vuelo(1, 200, "11/11/2025", "Bahia", "11:20", "12:20", 200, 100, $objPersona1);
    $vuelo2 = new Vuelo(2, 300, "12/11/2025", "Chile", "13:20", "14:20", 250, 20, $objPersona1);
    $vuelo3 = new Vuelo(3, 400, "13/11/2025", "Neuquen", "10:30", "11:30", 300, 200, $objPersona2);
    $vuelo4 = new Vuelo(4, 200, "14/11/2025", "BsAs", "15:37", "16:47", 400, 400, $objPersona2);
    
    //Crea un objeto de la clase Aeropuerto con la colección de aerolíneas creadas.  
    $aeropuerto = new Aeropuerto("mayor capacidad", "av Neuquen 123", [$aerolinea1, $aerolinea2]);

    //Invocar y visualizar el resultado del método  ventaAutomatica con cantidad de asientos 3 y
    //como destino alguno de los destinos de los vuelos creados.
    $aeropuerto->ventaAutomatica(3, "11/11/2025", "Bahia");
    echo $aeropuerto;

    //Invocar  y visualizar el resultado del método  promedioRecaudadoXAerolinea.
    $aeropuerto->promedioRecaudadoXAerolinea("FlyBondi");
    echo $aeropuerto;

?>