<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Número Secreto</title>
    </head>
    <body>
        <h2>Adivina el Número 1-100</h2>
        <form id="f01" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="numInp">Introduce el número: </label>
            <input type="number" id="numInp" name="numInp" autofocus="autofocus">
            <input type="submit" name="comprobar" value="Comprobar">
            <input type="submit" name="reset" value="Reintentar">
        </form>
        <?php
        session_start();
        
        
        function generarNum(){
            $_SESSION['randomNum'] = round(rand(1,100));
        }
        
        if(isset($_POST['comprobar'])){
            
            if($_SESSION['turnos'] == 0){
                generarNum();
            }
            
            if($_SESSION['turnos'] <= $_SESSION['dificultad']){
                $_SESSION['turnos']++;

                if($_POST['numInp'] > $_SESSION['randomNum']){
                    $resultado = "El número que buscas es menor";
                }else if($_POST['numInp'] < $_SESSION['randomNum']){
                    $resultado = "El número que buscas es mayor";
                }else{
                    $resultado = "Felicidades! Has acertado el número " . $_SESSION['randomNum'] . " en " . $_SESSION['turnos'] . " turnos.";
                    $_SESSION['turnos'] = 0;
                    $_SESSION['randomNum'] = 0;
                }
            }else{
                $resultado = "Has agotado tus intentos, el número era " . $_SESSION['randomNum'];
                $_SESSION['turnos'] = 0;
                $_SESSION['randomNum'] = 0;
            }
            echo $resultado;
        }
        
        if(isset($_POST['reset'])){
            $_SESSION['turnos'] = 0;
            $_SESSION['randomNum'] = 0;
            header('location:index.php');
        }
        
        ?>
        
    </body>
</html>
