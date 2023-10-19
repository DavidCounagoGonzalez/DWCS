<body style="background-color:rgba(125, 125, 155);">
<?php

/*

FILTROS

Los filtros facilitan la comprobación de la entra de usuario. Permiten verificar que
los datos están en el formato correcto (validate) y eliminar cualquier carácter ilegal
de los mismos (sanitize)

filter_var(): permite validar y sanear los datos. Un parámetro es la variable a
comprobar y otro el filtro que se va a usar.


*/

?>

<h1>Ejercicios "Filtros"</h1>

<p>1. Filtro simple</p>

<?php

/*

Teniendo en cuenta este ejemplo

$cadena ="<h1><i>Holaaaa</i></h1>";
$cadena= filter_var($cadena, FILTER_SANITIZE_STRING);
echo $cadena;
$entero = 0;
if (filter_var($entero, FILTER_VALIDATE_INT) === 0 ||
filter_var($entero, FILTER_VALIDATE_INT)) {
echo "<br />" . "Entero validado!";
} else {
echo "<br />" . "Entero NO validado!";
}



Crea un filtro que compruebe si una dirección IP es valida o no, teniendo en cuenta que una dirección IP
va a tener este formato: $IP = "127.0.0.1"



*/

$ip = "127.6.0.1";
//Filtramos por tipo ip
$ipVal = filter_var($ip, FILTER_VALIDATE_IP);
//Si devuelve true es válida
if($ipVal){
    echo "La ip es válida";
}else{
    echo "La ip NO es válida";
}

?>



<p>2.Filtrar ficheros</p>

<?php 

/*

Si tengo un fichero con datos, puedo intentar comprobar si hay datos incorrectos.

En  este ejercicio se presenta el fichero "correos.txt". Comprueba con un filtro si los correos son validos.
Si un correo no es valido, muestralo por pantalla. al final, señala la cantidad de correos no validos.

*/

$abreFich = fopen("correos.txt", 'r');//Abrimos archivo en lectura
//Mientras se pueda leer
while($correo = fgets($abreFich)){
    //Si hay otra línea
    if(!feof($abreFich)){
        //saneamos el correo recogido
        $correoSan = filter_var($correo, FILTER_SANITIZE_EMAIL);
        //Filtramos con el filtro de tipo correo
        if(filter_var($correoSan, FILTER_VALIDATE_EMAIL)){
            echo "El correo: " . $correo . "  es válido <br/>";
        }else{
            echo "El correo: " . $correoSan . " NO es válido <br/>";
        }
    }
}
fclose($abreFich);

?>

<p>3. Filtro avanzado</p>
<?php 
/*

Los filtros tienen opciones para comprobar si un entero está comprendido en un determinado rango de números.
Investiga como "FILTER_VALIDATE_INT" presenta un ""array de opciones" que puede guardar el rango minimo y el 
rango maximo y comprobar si el variable está dentro o fuera del rango. Compruebalo con un ejemplo.

*/

$int = 33;
$min = 30;
$max = 60;

//Filtramos el valor int pasando por opciones de filtro el menor  mayor
if(filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min,
    "max_range"=>$max))) === false){
    echo "La variable está fuera del rango.";
}else{
    echo "La variable está dentro de los límites.";
}



?>


<p>4.Filtros especiales </p>
<?php 
/*
filter_var() puede tener tres variables, en la última de esas variables puedes recoger opciones para filtrar
caracteres especiales, como, por ejemplo la "ñ". Crea un filtro en el que eliminemos las eñes de una cadena de caracteres
y realiza un echo de la cadena de caracteres nueva.


*/

$cadeña = "Mañana te devuelvo el paño, que hoy voy a por estaño";
//Filtramos la cadena con la opción de eliminar caracteres especiales
$cadena = filter_var($cadeña, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $cadena;

?>

<p>5.Filtros para PIv6 </p>
<?php 
/*
IPv6 es un nueva protocolo para filtrar IPs. Teniendo presente el archivo "DireccionesIPv6.txt", comprueba, igual que
en el ejercicio 2, si los datos de cada fila son validos.

*/

$abreFichIP = fopen("DireccionesIPv6.txt", 'r');//Abrimos en modo lectura
//Mientras se puedan leer líneas en el fichero
while($ipFich = fgets($abreFichIP)){
    //Si hay una siguiente 
    if(!feof($abreFichIP)){
        //validamos las ips con la opcion de que sea ipv6
        if(filter_var(trim($ipFich), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
            
            echo "La IPv6: " . $ipFich . "  es válida <br/>";
            
        }else{
            
            echo "La IPv6: " . $ipFich . " NO es válida <br/>";
            
        }
    }
}
fclose($abreFichIP);



?>

<p>6.Filtros con formulario </p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="enlace" >URL: </label>
    <input type="text" name="enlace" id="enlace"><br>
    <input type="submit" name="submit" value="Lanzar">
</form>
<?php 
/*
Modifica el ejercicio 1 para enviar por formulario una URL y comprobar con un filtro si esa URL es valida o no.
Ten en cuenta que filter_var() tiene opciones para filtrar URLs llamadas FILTER_VALIDATE_URL y FILTER_SANITIZE_URL
*/

if(isset($_POST['submit'])){//Pulsación del botón submit
    //Saneamos el valor del input
   $enlaceSan = filter_var($_POST['enlace'], FILTER_SANITIZE_URL);
   //filtramos el enlace saneado si es válido se va a esa página
   if(filter_var($enlaceSan, FILTER_VALIDATE_URL)){
       header('location:' . $enlaceSan);
   }else{
       echo "Enlace no válido.";
   }
}

?>


</body>
