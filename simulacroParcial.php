<?php

/**
 * Punto --> a
 * @param string $typePet
 * @param int $agePet
 * @param float $kgPet
 * @return float
 */

 function dosis($typePet, $agePet, $kgPet) {
    $dosis = 0;
    if ($typePet == "perro") {
        if ($kgPet < 5) {
            $dosis = 100;
        }
        elseif ($kgPet >= 5 && $kgPet <= 15) {
            $dosis = 150;
        }
        elseif ($kgPet > 15) {
            $dosis = 300;
        }
        // Plus
        if ($agePet > 6) {
            $calcdosis = $agePet - 6;
            $miligramos = $calcdosis * 10;
            $dosis = $dosis + $miligramos;
        }
    }
    elseif ($typePet == "gato") {
        if ($kgPet < 1) {
            $dosis = 80;
        }
        elseif ($kgPet >= 1 && $kgPet <= 3) {
            $dosis = 120;
        }
        elseif ($kgPet > 3) {
            $dosis = 200;
        }
    }
    elseif ($typePet == "conejo") {
        if ($agePet <= 2) {
            $dosis = 20;
        }
        elseif ($agePet > 2) {
            $dosis = 25;
        }
        // Incremento 
        if ($kgPet > 0.5) {
            $calculo = $kgPet - 0.5;
            $miligramos = $calculo * 10;
            $dosis = $dosis + $miligramos;
        }
    }
    else {
        $dosis = 0;
    }
    return $dosis;
 }

 /**
  * Punto -> 2
  */

  function precioConsulta($dosis) {
    $costo = 1500;
    if ($dosis > 0) {
        $costo = $costo + 1000;
        if ($dosis > 100) {
            $calc = $dosis - 100;
            $mg = $calc * 50;
            $costo = $costo + $mg;
        }
    }
    return $costo;
  }

 /**
  * Punto --> 3
  */

 echo "Bienvenida/o al sistema de Pets Veterinaria.\n";
 echo "Ingrese especie de su mascota: ";
 $type = trim(fgets(STDIN));
 $type = strtolower($type);
 echo "Ingrese edad: ";
 $age = trim(fgets(STDIN));
 echo "Ingrese peso en kg: ";
 $kgs = trim(fgets(STDIN));
 $dosisTotal = dosis($type, $age, $kgs);
 $price = precioConsulta($dosisTotal);
 echo "La dosis para $type es: $dosisTotal mg\n";
 echo "El costo de la consulta es: $$price.\n";
