<?php

//Completa las variables de inicio de sesion:
$inicia;

session_start();

if(isset($_SESSION['nombre'])){
$_SESSION["nombre"];
}

if(isset($_SESSION['edad'])){
$_SESSION["edad"];
}

if(isset($_SESSION['curso'])){
$_SESSION["curso"];
}

if(isset($_SESSION['peliculaFavorita'])){
$_SESSION["peliculaFavorita"];
}

if(isset($_SESSION['nombre']) && isset($_SESSION['edad']) && isset($_SESSION['curso']) && isset($_SESSION['peliculaFavorita'])){
    $inicia = true;
} else {
    $inicia = false;
}


if($inicia == true){
    echo "Variables de sesión, creadas!<br />";
}else{
    echo "No existen datos vaya a la modificación para crearlos o reinci<br />";
}

if(isset($_POST['submit'])){
    $_SESSION['nombre'] = "Usuario Promedio";
    $_SESSION['edad'] = " la edad que te haga feliz";
    $_SESSION['curso'] = " el curso de rio";
    $_SESSION['peliculaFavorita'] = " tu propia vida.";
    
    header("location:index.php");
}

/*Realiza las cuatro paginas PHP de manejo de sesiones sabíendo que 
-Para mostar variables, basta con señalar el array $_SESSION donde se encuentran
-Para modificar una sesión solo hace falta cambiar los valores del array.
-Para borrar las variables basta con usar session_unset();
-Para destruir la sesión, se usa desson_destoy();

En las paginas crear Links con la etiqueta <a> para poder comprobar las modificaciones, borrados y destrucciones.


*/
?>

<!DOCTYPE html>
<html>
<body>
    
    <a href="mostrar.php">Mostrar los valores....</a><br />
    <a href="modificar.php">Modificar los valores....</a><br />
    <a href="borrar_vars.php">Borrar variables de sesion....</a><br />
    <a href="destruir_sess.php">Destruir la sesion....</a><br /><br />
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="submit" name="submit" value='Resetear'>
    </form>
    
</body>
</html>
