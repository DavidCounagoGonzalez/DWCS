<?php
session_start();
$existe = 0;
if(isset($_SESSION['nombre'])){
    $nombre = $_SESSION['nombre'];
    if($nombre == ""){
        $nombre = " (NO INDICADO) ";
    }
    $existe++;
}

if(isset($_SESSION['edad'])){
    $edad = $_SESSION['edad'];
    if($edad == ""){
        $edad = " (NO INDICADO) ";
    }
    
    $existe++;
}

if(isset($_SESSION['curso'])){
    $curso = $_SESSION['curso'];
    if($curso == ""){
        $curso = " (NO INDICADO) ";
    }
    $existe++;
}

if(isset($_SESSION['peliculaFavorita'])){
    $peliculaFavorita = $_SESSION['peliculaFavorita'];
    if($peliculaFavorita == ""){
        $peliculaFavorita = " (NO INDICADO) ";
    }
    $existe++;
}

if($existe > 0){
    echo "Hola " . $nombre . "<br> tienes: " . $edad . "<br> estás en: " . $curso . "<br> y tu película favorita es: " . $peliculaFavorita;
}else{
    echo "No existe ningún dato disponible";
}

?>

<br /><br />
</body>
<a href="index.php">Inicio....</a><br />
<a href="modificar.php">Modificar los valores....</a><br />
<a href="borrar_vars.php">Borrar variables de sesion....</a><br />
<a href="destruir_sess.php">Destruir la sesion....</a>
</html>