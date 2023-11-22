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
        
        setcookie('nombre', $persona->getNombre());
        setcookie('apellido', $persona->getApellido());
        setcookie('salario' , $salario);
        setcookie('edad', $persona->getEdad());
        
        echo "<p> El salario de " . $_COOKIE['nombre'] . " " . $_COOKIE['apellido'] . " es de " . round($_COOKIE['salario'], 2) . "€</p>";
        ?>
    </body>
</html>
