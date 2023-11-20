<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Número Secreto</title>
    </head>
    <body>
        <h2>Adivina el Número 1-100</h2>
        <form id="f01" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p>Escoge la dificultad:</p>
            <input type="radio" id="infinito" name="dificultad" value="infinito" checked="checked">
            <label for="sin">Sin Intentos</label>
            <br>
            <input type="radio" id="10" name="dificultad" value="10">
            <label for="10">10 Intentos</label>
            <br>
            <input type="radio" id="20" name="dificultad" value="20">
            <label for="sin">20 Intentos</label>
            <br>
            <input type="radio" id="30" name="dificultad" value="30">
            <label for="10">30 Intentos</label>
            <br>
            <input type="submit" name="comenzar" value="Comenzar">
        </form>
        <?php
        session_start();
        $_SESSION['turnos'] = 0;
        $_SESSION['randomNum'] = 0;
        
            if(isset($_POST['comenzar'])){
                switch ($_POST['dificultad']){
                    case 'infinito':
                        $_SESSION['dificultad'] = INF;
                        echo $_SESSION['dificultad'];
                        break;
                    
                    case 10:
                        $_SESSION['dificultad'] = 10;
                        echo $_SESSION['dificultad'];
                        break;
                    
                    case 20:
                        $_SESSION['dificultad'] = 20;
                        echo $_SESSION['dificultad'];
                        break;
                    
                    case 30:
                        $_SESSION['dificultad'] = 30;
                        echo $_SESSION['dificultad'];
                        break;
                    
                    default:
                        echo "Escoge algo porfis";
                        break;
                }
                header("location:adivina.php");
            }
        ?>
</body>
</html>
