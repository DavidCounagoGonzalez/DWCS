<!DOCTYPE html>
<html>
<body>
    <?php
    session_start();
    
    $nArchivo = $_SESSION['nombreA'] . ".txt";
    $cadena = $_SESSION['txtCont'];
    
    echo $nArchivo . " ha sido creado";
    $abre = fopen($nArchivo, "w");
    
    fwrite($abre, $cadena);
    
    fclose($abre);
    
    ?>
</body>
</html>



