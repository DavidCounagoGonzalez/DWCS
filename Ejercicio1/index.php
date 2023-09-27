<?php
//Ejercicio 1 - Escribe una sentencia que muestre por pantalla "Hola mundo"
echo  "Hola Mundo";
echo "<br>";

//Ejercicio 2 - Crea una variable numerica que contenga el número 5 y muestralo por pantalla
$num1 = 5;
echo $num1;
echo "<br>";

//Ejercicio 3 - Con la variable creada en el ejercicio anterior, suma otra variable de valor 15 y muestra el resultado por pantalla;
$num2 = 15;
echo $num1 + $num2;
echo "<br>";

//Ejercicio 4 - Crea una variable string y concatenala en una frase
$saludo = "Buenas";
echo $saludo. ' tardes';
echo "<br>";

//Ejercicio 5 - Crea una constante y muestrala
define("Constante", "Soy la constante");
echo constant("Constante");
echo"<br>";

//Ejercicio 6 - Crea un array con 5 elementos Strings y muestra el segundo elemento (array[2]) del array
$numeros = array(1,2,3,4,5);
echo $numeros[1];
echo "<br>";

//Ejercicio 7 - Crea una función que sume 3 números que pasemos por parametro mostrando resultados por pantalla.
function Suma($n1,$n2,$n3){
    echo $n1 + $n2 + $n3;
}
Suma(5, 3, 2);
echo "<br>";

//Ejercicio 8 - Crea una función que contenga un 'if', 'elseif' y un 'else' mostrando resultados por pantalla.
function TresODos($elige){
  if($elige==3){
       echo 'Pues muy bien';
  }
  elseif($elige==2){
      echo 'Felicidades escogiste el 2';
  }
  else{
      echo "Esto no era una opción";
  }
    
}
TresODos("a");
echo "<echo>";
echo"<br>";

//Ejercicio 9 - Crea un switch en con un 'case' que contenga un while
$operacion = "suma";
$op1 = 8;
$op2 = 7;
switch ($operacion){
    case "suma":
        $calc = $op1 + $op2;
        while($calc<30){
            echo $calc;
            $calc = $calc + 5;
            echo "<br>"; 
        }
        echo "fin";
        break;
    case "resta":
        echo $op1 - $op2;
        break;
    case "multiplica":
        echo $op1 * $op2;
        break;
    case "divide":
        echo $op1/$op2;
        break;
    default:
        echo "Esto no es una opción";
        break;
}
echo "<br>";

//Ejercicio 10 - ¿Qué diferencia hay entre un for y un foreach?, muestra un ejemplo.
$conta;
for ($conta=0; $conta<10; $conta++){
    echo $conta . "\n";
}

echo "<br>";

$lista = array(1, 2, 3, 4, 5);
foreach($lista as $valor){
    $valor = $valor**2;
    echo $valor . "\n";
}
echo "<br>";

//Php puede representar la fecha y hora de hoy. Muestralo por pantalla.
echo date("d-m-Y H:i:s");

echo "<br>";

//¿Para que sirve la expresión 'include'?, Realiza un ejemplo práctico en tu proyecto

include "vars1.php";
