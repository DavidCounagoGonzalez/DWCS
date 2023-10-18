<?php
    if(isset($_POST['submit'])){
        session_start();
        session_unset();
    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p>Si pulsa el botón borrará las variables de la sesión: </p>
            <input type="submit" name="submit" value="Borrar">
        </form>
        <br>
        <a href="index.php">Inicio....</a><br />
        <a href="mostrar.php">Mostrar los valores....</a><br />
        <a href="modificar.php">Modificar los valores....</a><br />
        <a href="destruir_sess.php">Destruir la sesion....</a>
    </body>
</html>