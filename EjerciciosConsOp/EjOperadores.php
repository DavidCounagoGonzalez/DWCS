<body style="background-color:rgba(125, 125, 155);">
    <h1>Ejercicios "Constantes y operaciones</h1>
    <p>1. Constantes</p>
        
</body>

<?php

/*
Las constantes son variables cuyo valor no se puede cambiar o volver indefinidas.
Las constantes son globales, es decir, se pueden usar en todo el código.


Para definir una constante usamos la palabra reservada "define":

define("nombre", "valor", distinción entre mayus y minus): permite crear constantes. Son globales. El último parámetro indica si el nombre de la constante es sensible a mayúsculas. 
True para NO DISTINGUIR y false para DISTINGUIR, puede no especificarse.

Compruebalo con ejemplos:

Realiza una constante cuyo valor sea un número entero positivo al que llamaremos "num1".
A continuación comprueba con "echos" te sucede si al definir la constante tiene 2 parametros.
Comprueba también si al introducir el tercer parametro a true o a false e intentar mostrarla este valor cambia dependiendo de si lo 
escribimos con alguna mayúscula o con alguna minúscula. (Num1, nUM1, nuM1, etc).
¿Qué muestra cuando la constante no tiene el nombre correctamente escrito?

*/


define("nUm1", 7, true);
echo num1;

//define("nuM2", 6, false);
//echo num2;

?>

<p>1.2 Arrays de constantes</p>
<?php

/*

Podemos definir un array de constantes de esta manera:

define("Nombre", ["Valor1","Valor2","Valor3"]);

Pruebalo realizando un ejemplo donde se guarde un array de los números 4, 8, 15, 16, 23 y 42.

Luego, suma "num1" del ejercicio anterior con el número de la posición 3.

¿Qué número has sumado?
*/

define("numeros", [4, 8, 15, 16, 23, 42]);
echo num1 + numeros[3];

?>

<p>2.Operadores</p>

<?php 

/*

Existen multitud de operadores: Sirven para realizar operaciones o comparativas entre variables y constantes.
Vamos a realizar un ejemplo con cada uno: 


•Incremento/decremento: ++, --. Colocados antes que la variable, primero
incrementan o decrementan y luego devuelven el valor, mientras que colocados
después, primero devuelven el valor y luego incrementan o decrementan la
variable.

•Lógicos: and, or, not, xor, &&, ||, !

•De cadena: ., .= Este último operador concatena el contenido de una variable a otra.

•Asignación condicional: ?:, ??

 */

$num2 = 4;
echo ++$num2 . "<br>";
echo --$num2;



?>

<p>2.Operadores Aritméticos</p>

<?php 
/*
Sirven para operar con diferentes números:

    Sumar   	                $x + $y
    Restar	                    $x - $y
    Multiplicar                 $x * $y
    Dividir                     $x / $y
    Resto de una división       $x % $y
    Realizar el exponente       $x ** $y



Realiza un ejemplo de cada operador combinando constantes y variables.
¿Qué sucede se realizamos la división entre 10 y 3?
*/

$numC = 7;
$numV = 4;

$suma= $numV + $numC;
echo  $suma . "<br>";

$resta = $numV - $numC;
echo $resta . "<br>";

$multi = $numC * $numV;
echo $multi . "<br>";

$div = 10/3;
echo $div . "<br>";

$resto = $numC % $numV;
echo $resto . "<br>";

$exponente = $numV ** $numC;
echo $exponente;
 


?>


<p>2.Operadores de asignación</p>

<?php 
/*
Sirven para, como su nombre indica, asignar un valor a una variable. Ejemplo:
$Num1 += $Num2;  Ahora la variable "Num1" poseé el valor de Num1 más el valor de Num2

Prueba cada una de las asignaciones =, +=, -=, *=, /= con un ejemplo.

¿Se puede asignar dentro de la misma linea varias operaciones a la vez, que pasa cuando se intenta?


*/


$num1 = 27;
$numP = 13;

$num1 += $numP;
echo $num1 . "<br>";

$num1 -= $numP;
echo $num1 . "<br>";

$num1 *= $numP;
echo $num1 . "<br>";

$num1 /= $numP;
echo $num1 . "<br>";

?>


<p>2.Operadores de comparación</p>
<?php 

/*
Sirven para, comparar dentro de bucles o condiciones, devuelven 1 si se cumple la condición y 0 si no se cumplen. 
==, ===, !=, !==, >, <, <=, >=, <=>.

Ejemplo:

$x = 5;
$y = 10;
echo ($x <= $y) //Devuelve 1

Realiza 3 ejemplos con los operador que quieras, sin repetir operador en el ejemplo.

El operador "<=>" es un poco particular. Investiga como funciona y explicalo con ejemplos.

¿Qué diferencia hay entre el operador "!==" y el operador "!="? Escribe algún ejemplo.

*/


$x = 6;
$y = 10;
echo ($x <= $y)? "True <br>":"False <br>";
echo ($x >= $y)? "True <br>":"False <br>";
echo ($x != $y)? "True <br>":"False <br>";

//La inigualdad estrita ( !== )  diferencia el tipo de la variable , por lo que por mucho que el contenido sea el mismo estos pueden ser diferentes.
echo (1 != '1')? "True <br>":"False <br>";
echo (1 !== '1')? "True <br>":"False <br>";


// <=> Sirve para hacer una triple comprobación x<y , x>y & x==y, devolviendo -1 , 1 o 0 correspondientemente.
$comp = $x <=> $y;

if($comp < 0){
    echo "Es menor";
    
}elseif($comp > 0){
    echo "Es mayor";
    
}elseif($comp == 0){
    echo "Es igual";
    
}else{
    echo "Esto no debería pasar";
}

?>




<p>2.Operadores Lógicos e incremento</p>

<?php 

/*
INCREMENTO Y DESCREMENTO
++, --. Colocados antes que la variable, primero
incrementan o decrementan y luego devuelven el valor, mientras que colocados
después, primero devuelven el valor y luego incrementan o decrementan la
variable.

OPERADORES LÓGICOS

Son el "and", "or", "xor" y "not"

Se pueden escribir como 

and o &&        Devuelve "true" si los las dos variables son verdaderas
or o ||         Devuelve "true" si una de las dos variables es verdadera
!               Devuelve "true" si la variable es falsa
xor             Devuelve "true" si una de las dos variables es verdadera y solo una de ellas.


Ejemplo
$x = 20;  
$y = 40;

if ($x == 20 xor $y == 40) {
    echo "El operador xor funciona asi"; //No realiza el "echo"
}
?>  

Realiza un bucle "While" con ejemplerizando Estos operadores lógicos, incrementando o decrementando 
un número hasta que se cumpla (o no se cumpla) una condición. 

¿Puedo concatenar diferentes operadores lógicos en la misma sentencia?

*/

$i = 20;
$f = 40;

while($i > 5 && $f > 20){
    if(($i%2)!=0 xor ($f%2)!=0){
        echo "Uno de los dos es impar <br>";
    }
    echo $i . " " . $f . "<br>";
    $i--;
    $f -= 2;
}
echo "Finaliza " . $i . "   " . $f;

?>




<p>2.Operadores De cadena y asignación condicional</p>
<?php 

/*
Los operadores de cadena nos permiten "encadenar" textos, uno detras del otro. Lo conseguimos con un punto "." en el echo o en el print.
Podemos asignar esa cadena a una solo variable usando ".="

Concatena estas variables.
$txt1 = "¿Dónde";
$txt2 = " están";
$txt3 = "las gata' que nos";
$txt4 = "hablan y tiran pa' a'lante?";

¿Se puede concatenar variables y constantes?
¿Se puede concatenar otro tipo de dato que no sea un string?
Contesta a las preguntas con algún ejemplo


Por último, existen las asignaciones condicionales, que se escriben con "?" o "??" siguiendo esta sintaxis:

   "condición" ? "expr1" : "expr2";

   Si la condición es verdadera si realizará la expr1, y si no, la expr2.

Existe también la asignación "??", escribiendose así:

    $x = expr1 ?? expr2

    Devuelve el valor de X. Si la expr1 existe. Si no existe o es NULL, el valor de $x cambia al valor de la expr2
    
Ejemplo:

$cantante = "Aitana";
echo $cantante; //Muestra Aitana
$cantante = NULL;
echo "<br>";
$cantante = $cantante ?? "Amaia";
echo $cantante; //Muestra Amaia



Realiza un último ejemplo conviertiendo las variables anteriores ($txt1, $txt2, $txt3 y $txt4) en una
sola variable ($txt5) si $txt1 no existe o es nulo. 
*/

$txt1 = "¿Dónde ";
$txt2 = " están ";
$txt3 = " las gata' que no ";
$txt4 = " hablan y tiran pa' a'lante?";

$txt = $txt1 . $txt2 . $txt3 . $txt4;
echo $txt;

$concNum = $txt1 . 273;
echo '<br>' . $concNum . "<br>";

$ternaria = 32 < 4 ? "true":"false";
echo $ternaria . "<br>";

$txt5 = $txt1 ?? $txt1 . $txt2 . $txt3 . $txt4;
echo $txt5 . "<br>";

$txt1 = null;
$txt5 = $txt1 ?? $txt1 . $txt2 . $txt3 . $txt4;
echo "<br>" . $txt5;