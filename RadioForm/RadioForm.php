<!DOCTYPE html>
<html>
    <body>
        <?php
        session_start();
        echo "Hola " . $_SESSION['nombre'] . "<br>";
        echo "Te has identificado como " . $_SESSION['ocupacion'];
        ?>
    </body>
</html>
