<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CheckBox Formulario</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                
            <label for="nombre" id="lblNombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"> <br>
            
            <input type='checkbox' id='futbol' name='futbol'
                   value='futbol'>
            <label for='futbol'>Futbol</label><br>
            
            <input type='checkbox' id='basket' name='basket'
                   value='basket'>
            <label for='basket'>Basket</label><br>
            
            <input type='checkbox' id='tennis' name='tennis'
                   value='tennis'>
            <label for='tennis'>Tennis</label><br>
            
            <input type='checkbox' id='volley' name='volley'
                   value='volley'>
            <label for='volley'>Volley</label><br>
            
            <input type="submit" name="submit" value="Envia">

        </form>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        session_start();
        
        $_SESSION['nombre'] = $_POST['nombre'];
        
        $deportes = array();
        
        if(isset($_POST['futbol'])){
            array_push($deportes, $_POST['futbol']);
        }
        if(isset($_POST['basket'])){
            array_push($deportes, $_POST['basket']);
        }
        if(isset($_POST['tennis'])){
            array_push($deportes, $_POST['tennis']);
        }
        if(isset($_POST['volley'])){
            array_push($deportes, $_POST['volley']);
        }
        
        $_SESSION['deportes'] = $deportes;
                
        header("location:CheckForm.php");
    }

?>
