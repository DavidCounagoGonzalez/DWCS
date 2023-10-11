<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Con RadioButton</title>
        <link rel="stylesheet" href="StyleSheet.css"
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                
            <label for="nombre" id="lblNombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"> <br>
            
               
            <input type="radio" id="estudiante" name="ocupacion" 
                   value="estudiante" checked />
            <label for="estudiante"> Estudiante </label><br>
                
            <input type="radio" id="profesor" name="ocupacion" 
                   value="profesor"/>
            <label for="profesor"> Profesor </label><br>
                
            <input type="radio" id="administrador" name="ocupacion"
                   value="administrador"/>
            <label for="administrador">Administrador</label><br>
            
            <input type="submit" name="submit" value="Envia">

        </form>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        session_start();

        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['ocupacion'] = $_POST['ocupacion'];

        header('location:RadioForm.php');
    }
?>