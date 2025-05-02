<?php
    include_once './Persona.php';
    include_once './Vuelo.php';
    include_once './Aerolinea.php';
    include_once './Aeropuerto.php';

    $objPersona1= new Persona("Roberto", "Sanchez", "Av Pepito", "mail1@direc.com", 29965432);
    $objPersona2= new Persona("Maria", "Gavilan", "Av Arg", "mail2@direc.com", 29965342);

    //Crear  4 instancias de la clase vuelo.
    //A cada instancia de Aerolínea creada en T1, incorporar 2 de los vuelos.
    $objVuelo1 = new Vuelo(1, 200, "11/11/2025", "Bahia", "11:20", "12:20", 200, 100, $objPersona1);
    $objVuelo2 = new Vuelo(2, 300, "12/11/2025", "Chile", "13:20", "14:20", 120, 20, $objPersona1);
    $objVuelo3 = new Vuelo(3, 400, "13/11/2025", "Neuquen", "10:30", "11:30", 300, 200, $objPersona2);
    $objVuelo4 = new Vuelo(4, 200, "14/11/2025", "BsAs", "15:37", "16:47", 400, 400, $objPersona2);

    //Crear  2 instancias de la clase Aerolíneas.
    $aerolinea1 = new Aerolinea(123, "FlyBondi", [$objVuelo1, $objVuelo2]);
    $aerolinea2 = new Aerolinea(321, "JetSmart", [$objVuelo3, $objVuelo4]);
    
    //Crea un objeto de la clase Aeropuerto con la colección de aerolíneas creadas.  
    $aeropuerto = new Aeropuerto("Mayor Capacidad", "av Neuquen 123", [$aerolinea1, $aerolinea2]);

    // $vuelo1 = $objVuelo1->asignarAsientosDisponibles(50);
    // $vuelo2 = $objVuelo2->asignarAsientosDisponibles(300);
    // $vuelo3 = $objVuelo3->asignarAsientosDisponibles(100);
    // $vuelo4 = $objVuelo4->asignarAsientosDisponibles(200);

    // echo $vuelo1
    //     ? "\nEl vuelo 1 tiene asignados: ".$objVuelo1->getCantAsientosTotales()." asientos totales y ".$objVuelo1->getCantAsientosDisponibles()." asientos disponibles.\n"
    //     : "\nEl vuelo 1 no tiene asientos disponibles.\n";
    // echo $vuelo2
    //     ? "\nEl vuelo 2 tiene asignados: ".$objVuelo2->getCantAsientosTotales()." asientos totales y ".$objVuelo2->getCantAsientosDisponibles()." asientos disponibles.\n"
    //     : "\nEl vuelo 2 no tiene asientos disponibles.\n";
    // echo $vuelo3
    //     ? "\nEl vuelo 3 tiene asignados: ".$objVuelo3->getCantAsientosTotales()." asientos totales y ".$objVuelo3->getCantAsientosDisponibles()." asientos disponibles.\n"
    //     : "\nEl vuelo 3 no tiene asientos disponibles.\n";
    // echo $vuelo4
    //     ? "\nEl vuelo 4 tiene asignados: ".$objVuelo4->getCantAsientosTotales()." asientos totales y ".$objVuelo4->getCantAsientosDisponibles()." asientos disponibles.\n"
    //     : "\nEl vuelo 4 no tiene asientos disponibles.\n";
    
    //---------------------------------------------------------------//

    // $vuelosDestino = $aerolinea1->darVueloADestino("Chile", 10);
    // echo "\nVuelos disponibles:\n";
    // if (!empty($vuelosDestino)) {
    //     foreach ($vuelosDestino as $vuelo) {
    //         echo $vuelo . "\n";
    //     }
    // } else {
    //     echo "No se encontraron vuelos disponibles.\n";
    // }

    // $vuelosDestino = $aerolinea2->darVueloADestino("BsAs", 5);
    // echo "\nVuelos disponibles:\n";
    // if (!empty($vuelosDestino)) {
    //     foreach ($vuelosDestino as $vuelo) {
    //         echo $vuelo . "\n";
    //     }
    // } else {
    //     echo "No se encontraron vuelos disponibles.\n";
    // }

    //---------------------------------------------------------------//

    // $vuelo = $aerolinea1->incorporarVuelo($objVuelo3);
    // echo $vuelo
    //     ? "\nEl vuelo fue incorporado correctamente.\n"
    //     : "\nEl vuelo no fue incorporado.\n";

    // $vuelo = $aerolinea2->incorporarVuelo($objVuelo4);
    // echo $vuelo
    //     ? "\nEl vuelo fue incorporado correctamente.\n"
    //     : "\nEl vuelo no fue incorporado.\n";

    //---------------------------------------------------------------//

    // $vuelo = $aerolinea1->venderVueloADestino(10, "Chile", "12/11/2025");
    // echo $vuelo
    //     ? "\nEl vuelo fue vendido correctamente.\n"
    //     : "\nEl vuelo no fue vendido.\n";

    // $vuelo = $aerolinea2->venderVueloADestino(5, "BsAs", "14/10/2025");
    // echo $vuelo
    //     ? "\nEl vuelo fue vendido correctamente.\n"
    //     : "\nEl vuelo no fue vendido.\n";

    //---------------------------------------------------------------//

    // $vuelo = $aerolinea1->montoPromedioRecaudado();
    // echo "\nEl monto promedio recaudado es: ".$vuelo."\n";
    // $vuelo = $aerolinea2->montoPromedioRecaudado();
    // echo "\nEl monto promedio recaudado es: ".$vuelo."\n";

    //---------------------------------------------------------------//

    // $vuelosDeAerolinea1 = $aeropuerto->retornarVuelosAerolinea($aerolinea1);
    // echo "\nLos vuelos de la aerolínea " . $aerolinea1->getNombre() . " son:\n";
    // if (!empty($vuelosDeAerolinea1)) {
    //     foreach ($vuelosDeAerolinea1 as $vuelo) {
    //         echo $vuelo . "\n"; 
    //     }
    // } else {
    //     echo "No hay vuelos asignados a esta aerolínea.\n";
    // }

    // $vuelosDeAerolinea2 = $aeropuerto->retornarVuelosAerolinea($aerolinea2);
    // echo "\nLos vuelos de la aerolínea " . $aerolinea2->getNombre() . " son:\n";
    // if (!empty($vuelosDeAerolinea2)) {
    //     foreach ($vuelosDeAerolinea2 as $vuelo) {
    //         echo $vuelo . "\n"; 
    //     }
    // } else {
    //     echo "No hay vuelos asignados a esta aerolínea.\n";
    // }

    //---------------------------------------------------------------//
    
    // $resultado = $aeropuerto->ventaAutomatica(5, "12/11/2025", "Chile");

    // echo $resultado
    //     ? "La venta se realizó correctamente.\n"
    //     : "No se pudo realizar la venta.\n";

    // $resultado = $aeropuerto->ventaAutomatica(5, "14/11/2025", "Bahia");
    // echo $resultado
    //     ? "La venta se realizó correctamente.\n"
    //     : "No se pudo realizar la venta.\n";

    //---------------------------------------------------------------//
    $promedioRecaudado = $aeropuerto->promedioRecaudadoXAerolinea(123);
    echo "\nEl promedio recaudado por la aerolínea 123 es: " . $promedioRecaudado . "\n";
    $promedioRecaudado = $aeropuerto->promedioRecaudadoXAerolinea(321);
    echo "\nEl promedio recaudado por la aerolínea 321 es: " . $promedioRecaudado . "\n";
?>