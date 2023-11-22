<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcular Salario</title>
    </head>
    <body>
        <h2>Salario con clase</h2>
        <?php
        session_start();
        
        require_once('Persona.php');
        
        $persona = new Persona($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['salario'], $_SESSION['edad']);
        
        $salario = Persona::calcular($persona);
        
        setcookie('nombre', $persona->getNombre(), time()+1000, "/");
        setcookie('apellido', $persona->getApellido(), time()+1000, "/");
        setcookie('salario' , $salario, time()+1000, "/");
        setcookie('edad', $persona->getEdad(), time()+1000, "/");
        
        echo "<p> El salario de " . $_COOKIE['nombre'] . " " . $_COOKIE['apellido'] . " es de " . round($_COOKIE['salario'], 2) . "€</p>";
        
//        setcookie('nombre', $persona->getNombre(), time()-3600, "/");
//        setcookie('apellido', $persona->getApellido(), time()-3600, "/");
//        setcookie('salario' , $salario, time()-3600, "/");
//        setcookie('edad', $persona->getEdad(), time()-3600, "/");
        ?>
    </body>
</html>
