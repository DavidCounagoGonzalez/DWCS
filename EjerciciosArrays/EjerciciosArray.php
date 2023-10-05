<body style="background-color:rgba(125, 125, 155);">
<?php

/*
ARRAYS

Ya hemos trabajado en clase con arrays, a si que no son nada nuevo, pero vamos a darles un repaso.

Para crear un array, solo tenemos que indicarlo en nuestra variable:
$Peliculas = array("Sherk", "El padrino", "Batman");

También puedes crear arrays vacios:
%series;

*/

?>

<h1>Ejercicios "Arrays"</h1>

<p>1. Array Indexados</p>

<?php

/*
Indexados: se usa un índice numérico para acceder o crear a los elementos del array.
Ejemplo:

$Peliculas[4] = "La extraña pareja";



Un metodo para convertir arrays en texto y textos en arrays son las funciones join() y exlode(). Investiga sobre ellas y
usa el ejemplo $IngredientesPizza para convertir el texto en un array, luego convierte el array $Peliculas a texto
.
$IngredientesPizza = "Jamon queso peperonni champiñoches aceitunas atun panceta"


*/

$IngredientesPizza = "Jamon queso peperonni champiñones aceitunas atun panceta";

$ingrediente = explode(" ", $IngredientesPizza);

echo $ingrediente[3] . "<br>";

$Peliculas = array("Sherk", "El padrino", "Batman");

echo implode(", ", $Peliculas);


?>



<p>2.Array asociativos</p>

<?php 

/*
Los arrays asociativos son arrays donde puedes asignar nombres a las claves del array, ejemplo:

$Peliculas = array("Sherk"=>"2001","El padrino"=>"1972","Batman"=>"1981");

echo "El padrino se estrenó en " . $Peliculas['El padrino'] . ".";


El metodo "foreach" presenta ahora una nueva variable, ya que hay que guardar tanto la llave como el valor asociado a la llave.
Crea un array asociativo con por lo menos 4 valores y haz que se muestren esos valores con un foreach.



 */

$monstEfect = array("Paolomu"=>"Sueño", 
    "Pukei Pukei"=>"Envenenado", 
    "Tobi Kadachi"=>"Parálisis",
    "Odogaron"=>"Sangrado");

foreach ($monstEfect as $indice => $valor) {
    
    echo "El efecto que aplica el " . $indice . " es: " . $monstEfect[$indice] . "<br>";
    
}

?>

<p>3. Array multidimensionales</p>
<?php 
/*

¿Se puede crear un array de array?, Correcto. 
Vamos a ejemplirizarlo:

$Peliculas = array(
  array("Sherk",2001,7.7),
  array("El padrino",1972,9.0),
  array("Batman",1981,6.8)
);

echo $Peliculas[0][0].": del año: ".$Peliculas[0][1].", con una nota de: ".$Peliculas[0][2].".<br>";
echo $Peliculas[1][0].": del año: ".$Peliculas[1][1].", con una nota de:  ".$Peliculas[1][2].".<br>";
echo $Peliculas[2][0].": del año: ".$Peliculas[2][1].", con una nota de:  ".$Peliculas[2][2].".<br>";



Este ejemplo tiene 3 lineas de echo iguales donde solo cambia las variables.
¿Se pueden usar 1 o varios for/foreach para no tener que repetir tanto los echo's?
Si la respuesta es afirmativa, resuelvelo.


*/

$AlumnosData = array(
  array("Juan","DAW",9.5),
  array("María","ASIR",7.2),
  array("Carlos","DAM",5.8)
);

for ($i = 0; $i<count($AlumnosData); $i++){
    foreach ($AlumnosData[$i] as $j) {
        echo $j . ", ";
    }
    echo "<br>";
}




?>


<p>4.Funciones asociadas a los arrays </p>
<?php 
/*

PHP presenta funciones internas para poder realizar acciones:

count() 	-	Retorna la longitud del array.
sort() 	- 	Ordena el array en forma ascendente.
rsort() 	- 	Ordena el array en forma descendente.
asort() 	- 	Ordena el array en forma ascendente, acorde a su valor.
ksort() 	- 	Ordena el array en forma ascendente, acorde a su llave.
arsort()	- 	Ordena el array en forma descendente, acorde a su valor.
krsort()	- 	Ordena el array en forma descendente, acorde a su llave.


4.1  ¿La función sort() y rsort() puede ordenar arrays que no sean de Integers? Pruebalo creando un array de strings 
e intenta ordenarla en orden alfabetico ascendente y descendente.

4.2 En los comentarios se ha presentado un array asociado, me gustaria verlo ordenado
por nota.

4.3 Partiendo del ejercicio anterior, ¿cual es el ranking de la peor a la mejor?


*/

$nombres = array("Maria", "Juan", "Ana", "Carlos", "Manuel");

echo "Normal: ";
for($i = 0; $i < count($nombres); $i++){
    echo$nombres[$i] . ", ";

}
echo "<br> Orden alfabético: ";
sort($nombres);

for($i = 0; $i < count($nombres); $i++){
    echo $nombres[$i] . ", ";

}
echo "<br> Inverso: ";
rsort($nombres);

for($i = 0; $i < count($nombres); $i++){
    echo  $nombres[$i] . ", ";

}

echo "<br><br>";

$notas = array("Javier" => 7.6,
    "Malena" => 9.4,
    "Fernando" => 3.3,
    "Carla" => 6.3,
    "Manuel" => 2.3);

arsort($notas);

foreach ($notas as $nombre => $nota) {
    echo $nombre . " ha sacado un: " . $notas[$nombre] . "<br>";
    
}

?>


</body>