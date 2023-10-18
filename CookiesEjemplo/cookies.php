
<?php
/*

Las cookies son pequeños archivos que el servidor guarda en el equipo del cliente,
de forma que cada vez que el cliente pide la misma página al servidor, este puede
solicitar la cookie y obtener la información que hay en ella, habitualmente
información sobre alguna preferencia del cliente e identificación


Por orden, los parámetros que usaremos son:
◦ Nombre de la cookie.
◦ Valor que almacena.
◦ Tiempo de vida.
◦ Ámbito para el cual estará disponible. ‘/’ representa a todo el sitio web


setcookie(): permitite crear, modificar y leer una cookie. Esta función irá
siempre antes de la etiqueta <html>


*/



$nombre = "usuario";
$valor = "Alberto Álvarez";
$duracion = time() + (86400 * 30); //86400 = 1 dia
$ambito = "/";


// CREACIÓN DE LA COOKIE
setcookie($nombre, $valor, $duracion, $ambito);
if (count($_COOKIE) > 0) {
echo "Las cookies están activadas<br /><br />";
} else {
echo "Las cookies NO están activadas<br /><br />";
}
?>
<html>
<body>

<?php



// LECTURA DEL VALOR DE LA COOKIE
if (!isset($_COOKIE[$nombre])) {
echo "La cookie " . $nombre . " no está creada";
} else {
echo "La cookie " . $nombre . " está creada" . "<br />";
echo "Su valor es: " . $_COOKIE[$nombre];
}


//// MODIFICACION DE LA COOKIE
//echo "<br /><br />Modificamos la cookie $nombre a un nuevo valor...<br
///>";
//$valor = "Manuel Rodriguez";
//setcookie($nombre, $valor, $duracion, $ambito);
//echo "La cookie " . $nombre . " tiene el valor: " . $_COOKIE[$nombre];




//// BORRRADO DE LA COOKIE
//echo "<br /><br />Borramos la cookie $nombre...<br />";
//setcookie($nombre, $valor, time() -3600, $ambito);
//echo "La cookie " . $nombre . " tiene el valor: " . $_COOKIE[$nombre];



?>
</body>
</html>