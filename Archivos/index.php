<!DOCTYPE html>
<html>
<body>


<h1>1. Abrir, leer, escribir y cerrar un archivo</h1>

<p>1. Abrir un archivo</p>

<?php

/*
Los archivos en PHP se abren con la función fopen(), que requiere dos parámetros: el archivo que se quiere abrir y el modo en el que abrir el archivo

$fp = fopen("miarchivo.txt", "r");


Los modos de acceso existentes para fopen son:

Modo	  Descripción
r	      Apertura para lectura. Puntero al principio del archivo
r+	    Apertura para lectura y escritura. Puntero al principio del archivo
w	      Apertura para escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
w+	    Apertura para lectura y escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
a	      Apertura para escritura. Puntero al final del archivo. Si no existe se intenta crear.
a+	    Apertura para lectura y escritura. Puntero al final del archivo. Si no existe se intenta crear.
x	      Creación y apertura para sólo escritura. Puntero al principio del archivo. Si el archivo ya existe dará error E_WARNING. Si no existe se intenta crear.
x+	    Creación y apertura para lectura y escritura. Mismo comportamiento que x.
c	      Apertura para escritura. Si no existe se crea. Si existe no se sobreescribe ni da ningún error. Puntero al principio del archivo.
c+	    Apertura para lectura y escritura. Mismo comportamiento que C.





*/

// Crea un archivo "miarchivo.txt" en el que escribas 3 lineas cualesquiera.
//$Archivoabierto = fopen("miarchivo.txt", "r");

//Si no es posible abrir el archivo, devuelve cero, por eso es frecuente utilizar esta función en una condición:
/*
if (!$Archivoabierto = fopen("miarchivo.txt", "r")){
  echo "No se ha podido abrir el archivo";
}
*/

//Añade la nueva condición y comprueba que funciona
$archivo = fopen("miarchivo.txt", "r") or die("No se pudo abrir");


fclose($archivo);


?>



<p>2.Leer un archivo</p>

<?php 

/*
Ahora que sabemos abrir archivos, vamos a leerlo por pantalla, para eso si usa la función:
            $contenido = fread($NombreDelArchivoGuardadoComoVariable, filesize(miarchivo.txt));


La variable $contenido guardará el contenido que obtengamos con la función fread(). Esta función requiere dos parámetros, 
el archivo abierto y la longitud que queremos leer de dicho archivo (en bytes). En este caso hemos empleado la función
filesize() para obtener el tamaño del archivo y así devolver todo su contenido.

Leer el archivo que has creado, mostrandolo por pantalla.

Es una buena práctica cerrar los archivos una vez que has terminado de trabajar en ellos. Se cierra con la sintaxis "Fclose"

fclose($archivo);


Cierra el ejercicio con fclose.

Ahora prueba a realizar la lectura con readfile();
 */


$archivo = fopen("miarchivo.txt", "r") or die("No se puede abrir");
$contenido = fread($archivo, filesize("miarchivo.txt"));

echo $contenido;

fclose($archivo);

?>

<p>3. Limitar la longitud de datos que queremos escribir</p>
<?php 
/*
Podemos limitar la longitud de datos que queremos escribir (todos los datos que había en el archivo se borrarán por completo igualmente):

$file = "miarchivo.txt";
$texto = "Hola que tal";
$fp = fopen($file, "w"); //Esta vez hemos empleado el modo w, que permite escribir sobreescribiendo el archivo.
fwrite($fp, $texto, 4); // Escribirá sólo: Hola

Si el archivo miarchivo.txt no existe, se creará automáticamente con el modo w de la función fopen.




Crea un archivo nuevo llamado "rosas.txt" en el que añadas el texto "Por eso esperaba con la carita empapada, a que llegaras con rosas, con mil rosas para mí, 
porque ya sabes que me encantan esas cosas, que no importa si es muy tonto, soy así. ". Luego, muestra unicamente la primera frase.


*/

$archivo = "rosas.txt";
$cadena = "Por eso esperaba con la carita empapada, a que llegaras con rosas, con mil rosas para mí, 
porque ya sabes que me encantan esas cosas, que no importa si es muy tonto, soy así." ;
$abre = fopen($archivo, "w") or die("No se puede abrir");
fwrite($abre, $cadena);

fclose($abre);

$abre = fopen($archivo, "r") or die("No se puede abrir");
$contenido = fread($abre, 39);

echo $contenido;

fclose($abre);

?>


<p>4.Leer una sola linea</p>
<?php 
/*
Tambien podemos leer una unica linea con la función "fgets($MiArchivo);
Realiza el ejercicio anterior usando esta función



Con la función feof($myfile) podemos ver si alcanzamos el final del archivo, de esta manera lo podemos usar para recorer archivos si no sabemos
cual es su final. ¿Cómo se podría implementar con un while?
*/

//Sin while
$abre = fopen($archivo, "r") or die("No se puede abrir");
echo fgets($abre);

fclose($abre);

echo '<br><br>Con el while de feof<br><br>';
//Con while
$abre = fopen($archivo, "r") or die("No se puede abrir");
while(!feof($abre)){
    echo fgets($abre) . "<br>";
}
fclose($abre);

?>



<p>5.Escribir</p>
<?php 
/*
Para escribir en un fichero se usa la función 

fwrite(Nombre del archivo, texto a introducir);


Pruebalo creando un archivo nuevo y añadiendo este texto guardado en una variable:
$txt = "Sherk\n El padrino\n Star Wars\n Batman\n";

No olvides cerrar el documento al terminar.

¿Puedo escribir nuevas lineas?, depende de los parametros a la hora de abrir el documento, estos se van a sobreescribir, a escribir delante de todo, o al final de todo.

Escribe en el documento "rosas.txt" la siguiente parte de la canción.

$Parte2 = "Y aún me parece mentira que se escape mi vida imaginando que vuelves a pasarte por aquí, donde los viernes cada tarde, como siempre, la esperanza dice: "Quieta, hoy quizá sí. ";

A continuación, muestralo por pantalla.

*/

$abre = fopen($archivo, "a");
$cadena2 = " Y aún me parece mentira que se escape mi vida imaginando que vuelves a pasarte por aquí, donde los viernes cada tarde, como siempre, la esperanza dice: 'Quieta, hoy quizá sí.' ";

fwrite($abre, $cadena2);

fclose($abre);

$abre = fopen($archivo, "r");

echo fread($abre, filesize("rosas.txt"));

fclose($abre);

?>



<p>6.Formularios para escribir en ficheros</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    
    <fieldset>
        <legend>Documento</legend>
        <label>
            Nombre del archivo: 
            <input type="text" name="nombreA" id="nombreA">
            .txt
        </label>
        <br><br>
        
        <textarea id="txtCont" name="txtCont" rows="10" cols="50" placeholder="Escribe lo que deseas añadir al texto"></textarea>
        <br>
        <input type="submit" name="submit" value="Confirmar">
    </fieldset>
</form>

<?php 
/*

Usa todos tus conocimientos que has aprendido para guardar con un formulario un texto y luego crear y escribir un nuevo documento
donde guardar ese texto. 

?>

*/

if(isset($_POST['submit'])){
    session_start();
    
    if(isset($_POST['nombreA'])){
    $_SESSION['nombreA'] = $_POST['nombreA'];
    }
    
    if(isset($_POST['txtCont'])){
    $_SESSION['txtCont'] = $_POST['txtCont'];
    }
    
    header("location:GuardarTxt.php");
}

?>

</body>
</html>
