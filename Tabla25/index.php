<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tabla 5x5</title>
    </head>
    <body>
        <h2>Tabla Multiplicar hasta 25</h2>
        <form id="f01" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="numInp"> Escribe un número: </label>
            <input type="number" id="numInp" name="numInp">
            <input type="submit" name="crear" value="Crear">
        </form>
        <table style='border:1px solid black; margin: 10px'>
        <?php
        session_start();
        
        if(isset($_POST['crear'])){
            $multi = 1;
                for($i=0; $i<5; $i++){
                    echo "<tr style='border:1px solid black'>";
                    for($j=0; $j<5; $j++){
                        $resultado = $_POST['numInp']*$multi;
                        $caja = $_POST['numInp'] . " x " . $multi . " = " . $resultado;
                        echo "<td style='border:1px solid black; padding:5px'>".$caja."</td>"; 
                        $multi++;
                    }
                    echo "</tr>";
                }
        }
        ?>
        </table>
    </body>
</html>
