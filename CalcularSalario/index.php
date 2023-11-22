<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcular Salario</title>
    </head>
    <body>
        <h2>Indica tus datos</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label for="apellido">Apellido: </label>
            <input type="text" id="apellido" name="apellido">
            <br>
            <label for="salario">Salario: </label>
            <input type="decimal" id="salario" name="salario">
            <br>
            <label for="edad" >Edad: </label>
            <input type="number" id="edad" name="edad">
            <br>
            <input type="submit" id="registrar" name="registrar" value="Registrar">
        </form>
        <?php
        session_start();
        
        if(isset($_POST['registrar'])){
            if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['salario']) || empty($_POST['edad'])){
                $alerta = 'Debe rellenar todos los campos';
                echo "<script type='text/javascript'>alert('$alerta');</script>";
            }else if(!is_numeric($_POST['salario'])){
                $alerta = 'El salario introducido contiene errores';
                echo "<script type='text/javascript'>alert('$alerta');</script>";
            }else if ($_POST['edad']<16) {
                $alerta = 'La persona debe ser mayor de 16 años';
                echo "<script type='text/javascript'>alert('$alerta');</script>";
            }else{
                
               $_SESSION['nombre'] = $_POST['nombre'];
               $_SESSION['apellido'] = $_POST['apellido'];
               $_SESSION['salario'] = $_POST['salario'];
               $_SESSION['edad'] = $_POST['edad'];
               
               header('location:SalarioClase.php');
                 
            }
             
        }
        
        ?>
    </body>
</html>
