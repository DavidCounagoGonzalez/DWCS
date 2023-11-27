<html>
    <body>
        <h2>Comprobar Contraseñas</h2>
        <?php
        //Si las cookies contienen el mismo valor verifica la creación
            if($_COOKIE['contraseña'] === $_COOKIE['confirma']){
                echo "Usuario " . $_COOKIE['nombre'] . " registrado correctamente";
            }else{
                echo "No se ha podido registrar, las contraseñas no coinciden.";
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="submit" name="volver" value="Volver">
        </form>
        <?php
            if(isset($_POST['volver'])){
                header("location:Examen 27-11-23.php");
            }
        ?>
    </body>
</html>




