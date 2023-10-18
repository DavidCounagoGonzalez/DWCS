<?php
    if(isset($_POST['submit'])){
        session_start();
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p>Si pulsa el botón se destruirá la sesión: </p>
            <input type="submit" name="submit" value="Destruir">
        </form>
        <br>
        <a href="index.php">Inicio....</a><br />
        <a href="mostrar.php">Mostrar los valores....</a><br />
        <a href="modificar.php">Modificar los valores....</a><br />
        <a href="borrar_vars.php">Borrar variables de sesión....</a>
    </body>
</html>

