<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <fieldset>
                <legend>Modifica los datos</legend>
                
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
                <br>
                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad">
                <br>
                <label for="curso">Curso: </label>
                <input type="text" name="curso" id="curso">
                <br>
                <label for="peliculaFavorita">Película Favorita: </label>
                <input type="text" name="peliculaFavorita" id="peliculaFavorita">
                <br>
                <input type="submit" name="submit" value="Modificar">
            </fieldset>
        </form>
        <br>
        <a href="index.php">Inicio....</a><br />
        <a href="mostrar.php">Mostrar los valores....</a><br />
        <a href="borrar_vars.php">Borrar variables de sesion....</a><br />
        <a href="destruir_sess.php">Destruir la sesion....</a>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    session_start();
    $_SESSION['nombre'] = $_POST["nombre"];
    $_SESSION['edad'] = $_POST['edad'];
    $_SESSION['curso'] = $_POST['curso'];
    $_SESSION['peliculaFavorita'] = $_POST['peliculaFavorita'];
}
