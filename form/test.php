<!DOCTYPE html>
<html>
    <head>
        <title>Mi primer formulario</title>
    </head>
    
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre"><br>
            
            <label for="edad">Edad: </label>
                <input type="text" name="edad"><br>
            
            <label for="email">Email: </label>
                <input type="text" name="email"><br>
            
            <input type="submit" name="submit" value="Enviar">
            
        </form>
    </body>
    </html>

    <?php 
        if(isset($_GET['submit'])){
            
            $nombre = $_GET['nombre'];
            $edad = $_GET['edad'];
            $email = $_GET['email'];

            $errores = false;
            if(empty($nombre)){
                echo "<p class='error'> El nombre es requerido </p>";
                $errores = true;
            }
            if(empty($edad) || !is_numeric($edad)){
                echo "<p class='error'> Edad requerida </p>";
                $errores = true;
            }
            if(10>$edad){
                echo "<p class='error'> Edad fuera de límites </p>";
                $errores = true;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
                echo "<p class='error'> No se ha indicado email o el formato no es correcto </p>";
                $errores = true;
            }
            

            if(!$errores){
                header('location:formpost.php?nombre='.$nombre.'&edad='.$edad.'&email='.$email);
            }
        }