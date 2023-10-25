<body style="background-color:rgba(205, 205, 235);">

<h1>Ejercicios JSON</h1>
<p>1. Comprobación de la codificación JSON</p>
</body>

<?php

/*
Presentando este array peliculas:
$peliculas = array("Sherk" => 8, "El Padrino" => 9, "El rey Leon" => 7);

Codifica el array para que se trasformen en datos JSON usando json_encode();
Luego, muestra el resultado obtenido.

*/

$peliculas = array("Sherk" => 8, "El Padrino" => 9, "El rey Leon" => 7);

$peliculasjson = json_encode($peliculas);
echo "<pre>" . print_r($peliculasjson, true) . "</pre>";

?>

<p>2. Comprobación de la codificación como objeto</p>
<?php

/*JSON convierte con json_decode() un objeto. Compruebalo con la función var_dump() 
con el array de las peliculas del ejercicio anterior.

JSON puede devolver con el json_decode() un array asociado. Investiga como es esto posible y
muestralo por pantalla

*/

var_dump(json_decode($peliculasjson));

?>
<p>3. Buble para mostrar objetos en JSON</p>


<?php
/*

Muestra con un foreach los parametros de tu variable JSON con las peliculas
y muestra cada una de ellas diciendo la nota que tienen.
Hazlo de dos formas, con un objeto y con un array asociativo.

*/

$obj = json_decode($peliculasjson);
$asociativo = json_decode($peliculasjson, true);

echo "<b>Como Objeto:</b><br>";
foreach ($obj as $clave => $valor){
    echo $clave . " tiene un " . $valor . ". <br>";
}
echo"<br>";
echo "<b>Como Array Asociativo:</b><br>";
foreach ($asociativo as $key => $value) {
    echo $key . " tiene un " . $value . ". <br>";
}
echo "<br><br>";


echo "<b>Decodificando un archivo json:</b><br>"
. "<a href='jsonTest.json'>Contenido del archivo</a><br><br>";
$json = file_get_contents('jsonTest.json'); 
  
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:<br>";
    } else {
        echo "$key => $val <br>";
    }

}

echo "<br><br>";
echo "<b>Arrays a JSON: </b><br>";

$datos = array(
    'Django Desencadenado' => array(
        'id'=>1,
        'nota'=>8.7,
        'director'=>'Quentin Tarantino',
        'año'=>'2012'
    ),
    'Spider-Man : Across the Spider-Verse' => array(
        'id'=>2,
        'nota'=>9.4,
        'director'=>'Joaquim Dos Santos, Justin Thompson & Kemp Powers',
        'año'=>'2023'
    ),
    'Kung Fury' => array(
        'id'=>3,
        'nota'=>7.9,
        'director'=>'David Sandberg',
        'año'=>'2015'
    )
);

$fichero = fopen('Peliculas.json', 'w+');
fwrite($fichero, json_encode($datos));
echo "<a href='Peliculas.json'>Ir al fichero</a> ";
fclose($fichero);
