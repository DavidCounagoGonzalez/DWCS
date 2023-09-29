<body style="background-color:rgba(125, 125, 155);">

<h1>Ejercicios "Variables y tipos de datos"</h1>
<p>1. variables</p>
</body>

<?php

/*
El comando echo y print permiten mostrar el valor de una variable e información
en general. La diferencia principal es que echo no devuelve ningún valor y print
devuelve 1, por lo que puede ser usado en expresiones. Por ello, echo es más
rápido. Ambos se pueden usar con o si paréntesis.

Crear dos variables que contengan números. Luego, crea otra variable para la suma.
Crealiza un "echo" con una frase que contenga la variable suma.
Crea un "print" con la misma frase y guardalo en una variable, por último, comprueba
se la variable creada devuelve un 1.

*/

$num1 = 8;
$num2 = 7;
$suma = $num1 + $num2;
echo "La suma de los dos números es: " . $suma;

echo "<br><br>";
$pri = print("La suma de los dos números es: " . $suma);

echo "<br><br>";
echo $pri;
?>

<p>2. tipos de datos</p>
<?php

/*

PHP puede inferir y trabajar con los siguientes tipos de datos: cadenas, enteros,
flotantes, booleanos, arrays, objetos y null.

Crea una variable de cada tipo y luego muestra por pantalla con la función var_dump() el tipo de
valor de la expresión. Recuerda que no necesitas realizar echo o print para mostrar la función.

*/


$cadena = "Hola Mundo";
var_dump($cadena);
echo "<br>";

$entero = 4;
var_dump($entero);
echo "<br>";

$flotante = 8.05;
var_dump($flotante);
echo "<br>";

$booleano = False;
var_dump($booleano);
echo "<br>";

$array = array(23, "Manuel", True);
var_dump($array);
echo "<br>";

$nulo = null;
var_dump($nulo);
echo "<br>";

$objeto = new class(){};
var_dump($objeto);
echo "<br>";



?>
<p>2.1 Strings</p>

<?php 


/*
Algunas de las muchas funciones para trabajar con strings en PHP:
◦ strlen(): devuelve la longitud de una cadena.
◦ str_word_count(): devuelve el numero de palabras de una cadena.
◦ strrev(): devuelve la cadena invertida.
◦ strpos(): busca un texto en una cadena y devuelve su posición.
◦ str_repalce(): busca un texto en una cadena y lo reemplaza por otro.

Crea una sentencia "echo" para cada función de los string, haciendo referencia
a las caracteristicas de la función. Ejemplo:
echo "La longitud de la cadena es: " . strlen($c) . "<br>";
Puedes usar la cadena que quiera, o esta cadena de ejemplo:

$cad= "Esto es una cadena de caracteres"


 */

$cad = "Exemplaris Excomvinicationis";
echo "La longitud de la cadena es: " . strlen($cad) . "<br>";
echo "La cadena tiene: " . str_word_count($cad) . " palabras. <br>";
echo "La cadena inversa es: " . strrev($cad) . "<br>";
echo "La cadena pla está en la posición: " . strpos($cad, "pla") . "<br>";
echo "Reemplazo: " . str_replace($cad, "Exemplaris", "Mundo") . "<br>";


