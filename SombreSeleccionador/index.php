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
            <p>Cuál es tu color favorito?</p>
            <input type="radio" id="p1r1" name="preg1" value="1">
            <label for="p1r1">Rosa</label> 
            <input type="radio" id="p1r2" name="preg1" value="2">
            <label for="p1r2">Negro</label>
            <input type="radio" id="p1r3" name="preg1" value="3">
            <label for="p1r3">Merequetengue</label> 
            
            <p>Cuál es tu comida favorita</p>
            <input type="radio" id="p2r1" name="preg2" value="3">
            <label for="p2r1">Merequetengue</label> 
            <input type="radio" id="p2r2" name="preg2" value="1">
            <label for="p2r2">Como de todo</label>
            <input type="radio" id="p2r3" name="preg2" value="2">
            <label for="p2r3">La cocina asática</label> 
            
            <p>Que haces en tus tiempos libres</p>
            <input type="radio" id="p3r1" name="preg3" value="2">
            <label for="p3r1">Entrenar para ninja</label> 
            <input type="radio" id="p3r2" name="preg3" value="3">
            <label for="p3r2">Merequetengue</label>
            <input type="radio" id="p3r3" name="preg3" value="1">
            <label for="p3r3">Comer</label>  
            
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
                    fwrite($archivo, "");
                }
                if(empty($_POST['preg1']) || empty($_POST['preg2']) || empty($_POST['preg3'])){
                    $alerta = 'Debes responder a todas las preguntas';
                    echo "<script type='text/javascript'>alert('$alerta');</script>";
                }else{
                    
                    $suma = $_POST['preg1'] + $_POST['preg2'] + $_POST['preg3'];
                   
                    switch ($suma){
                        case $suma<5: 
                            $cadena = $_SESSION['nombre'] . " , eres Kirby";
                            echo $cadena;
                            echo "<br>";
                            echo "<img src='imgs/kirbyvlc.jpeg'>";
                            fwrite($archivo, $cadena);
                            break;
                        
                        case $suma>7:
                            $cadena = $_SESSION['nombre'] . " ,  eres EL Merequetengue";
                            echo $cadena;
                            echo "<br>";
                            echo "<img src='imgs/merequetengue.jpeg'>";
                            fwrite($archivo, $cadena);
                            break;
                        
                        default:
                            $cadena = $_SESSION['nombre'] . " , eres Sergio";
                            echo $cadena;
                            echo "<br>";
                            echo "<img src='imgs/sergiofoty.jpeg'>";
                            fwrite($archivo, $cadena);
                            break;
                   }
               }
               
               fclose($archivo);
            }
        ?>
    </body>
</html>
