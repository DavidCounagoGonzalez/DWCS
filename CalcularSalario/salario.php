<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcular Salario</title>
    </head>
    <body>
        <h2>Salario Real</h2>
        <?php
        session_start();
        
        $salario = $_SESSION['salario'];
        
        if($salario<=2000 && $salario>=1000){
            if($_SESSION['edad']>45){
                $salario += ($salario*0.03);
            } else {
                $salario += ($salario*0.1);
            }
        }else if($salario<1000){
            if($_SESSION['edad']<30){
                $salario = 1100;
            }else if($_SESSION['edad']>45){
                $salario += ($salario*0.15);
            }else{
                $salario += ($salario*0.03);
            }
        }
        
        echo "<p> El salario de " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . " es de " . round($salario, 2) . "€";
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="submit" id="volver" name="volver" value="Volver">
        </form>
        <?php
        if(isset($_POST['volver'])){
            header('location:index.php');
        }
        ?>
    </body>
</html>
