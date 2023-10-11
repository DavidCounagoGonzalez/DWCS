<!DOCTYPE html>
<html>
    <body>
        <?php
        session_start();
        echo $_SESSION['nombre'] . " practica: ";
        
        foreach ($_SESSION['deportes'] as $valor) {
            echo $valor . ", ";
}
        ?>
    </body>
</html>
