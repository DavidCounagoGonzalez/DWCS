<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Datos</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"><br>
            
            <label for="edad">Edad: </label>
            <input type="text" name="edad" id="edad"><br>
            
            <input type="submit" name="submit" value="Envia"><br>
        </form>
    </body>
</html>

<?php

    if(isset($_GET['submit'])){
        
        $nombre = $_GET['nombre'];
        $edad = $_GET['edad'];
        
        if($edad < 18){
            echo "<p> Es menor de 18";
        } else {
            header("location:DatosForm.php?nombre=".$nombre."&edad=".$edad);
        }
        
    }
