<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        p{
            font-weight: bold;
        }
    </style>
    <body>
        <h1>Sombrero Seleccionador</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p>Pregunta 1</p>
            <input type="radio" id="p1r1" name="preg1" value="1">
            <label for="p1r1">R1</label> 
            <input type="radio" id="p1r2" name="preg1" value="2">
            <label for="p1r2">R2</label>
            <input type="radio" id="p1r3" name="preg1" value="3">
            <label for="p1r3">R3</label> 
            <input type="radio" id="p1r4" name="preg1" value="4">
            <label for="p1r4">R4</label> 
            
            <p>Pregunta 2</p>
            <input type="radio" id="p2r1" name="preg2" value="3">
            <label for="p2r1">R1</label> 
            <input type="radio" id="p2r2" name="preg2" value="2">
            <label for="p2r2">R2</label>
            <input type="radio" id="p2r3" name="preg2" value="4">
            <label for="p2r3">R3</label> 
            <input type="radio" id="p2r4" name="preg2" value="1">
            <label for="p2r4">R4</label> 
            
            <p>Pregunta 3</p>
            <input type="radio" id="p3r1" name="preg3" value="2">
            <label for="p3r1">R1</label> 
            <input type="radio" id="p3r2" name="preg3" value="3">
            <label for="p3r2">R2</label>
            <input type="radio" id="p3r3" name="preg3" value="1">
            <label for="p3r3">R3</label> 
            <input type="radio" id="p3r4" name="preg3" value="4">
            <label for="p3r4">R4</label> 
            
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                session_start();
                
                $archivo = fopen("Registro.txt", "w+") or die("No se puede abrir");
                
                if(empty($_SESSION['nombre'])){
                    $contenido = fread($archivo, filesize("Registro.txt"));
                    $_SESSION['nombre'] = $contenido;
                }else{
                    fwrite($archivo, "");
                }
                if(empty($_POST['preg1']) || empty($_POST['preg2']) || empty($_POST['preg3'])){
                    $alerta = 'Debes responder a todas las preguntas';
                    echo "<script type='text/javascript'>alert('$alerta');</script>";
                }else{
                    
                    $suma = $_POST['preg1'] + $_POST['preg2'] + $_POST['preg3'];
                   
                    switch ($suma){
                        case $suma<6: 
                            $cadena = $_SESSION['nombre'] . " ,eres el esto";
                            echo $cadena;
                            fwrite($archivo, $cadena);
                            break;
                        
                        case $suma>9:
                            $cadena = $_SESSION['nombre'] . " ,eres el aquello";
                            echo $cadena;
                            fwrite($archivo, $cadena);
                            break;
                        
                        default:
                            $cadena = $_SESSION['nombre'] . " ,eres el eso";
                            echo $cadena;
                            fwrite($archivo, $cadena);
                            break;
                   }
               }
               
               fclose($archivo);
            }
        ?>
    </body>
</html>
