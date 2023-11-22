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
        
        Persona::calcular($persona);
        ?>
    </body>
</html>
