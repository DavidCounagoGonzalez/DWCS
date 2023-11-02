<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNO</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
    <h1 id="titulo">Let's play UNO</h1>
    <form id="f01" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div id="botones">
            <input type='button' name='2' class="numPJ" onclick='oculta()' value="2 Jugadores"> 
            <input type='button' name='3' class='numPJ' onclick='oculta()' value='3 Jugadores'>
            <input type="button" name='4' class="numPJ" onclick='oculta()' value='4 Jugadores'>
        </div>
        <?php
        echo '<div id="nombres">
            <label for="j1">Jugador 1:</label>
            <input type="text" id="j1" name="j1" class="nombrePJ" placeholder="Jugador 1">
            <label for="j2">Jugador 2:</label>
            <input type="text" id="j2" name="j2" class="nombrePJ" placeholder="Jugador 2">
            <label for="j3">Jugador 3:</label>
            <input type="text" id="j3" name="j3" class="nombrePJ" placeholder="Jugador 3">
            <label for="j1">Jugador 4:</label>
            <input type="text" id="j4" name="j4" class="nombrePJ" placeholder="Jugador 4">
            <input type="submit" name="submit" id="comenzar" value="Comenzar">
            <input type="button" class="atras" id="atras" onclick="oculta2()" value="Atras">
        </div>';
        ?>
    </form>
    
    <script>
        function oculta(){
            document.getElementById("botones").style.visibility = "hidden";
            document.getElementById("nombres").style.visibility = "visible";
        }
        function oculta2(){
            document.getElementById("botones").style.visibility = "visible";
            document.getElementById("nombres").style.visibility = "hidden";
        }
    </script>
    
    <?php
    if(isset($_POST['submit'])){
        session_start();
        $jugadores = array();
        array_push($jugadores, $_POST['j1']);
        array_push($jugadores, $_POST['j2']);
        array_push($jugadores, $_POST['j3']);
        array_push($jugadores, $_POST['j4']);
        
        for($i=0; $i<count($jugadores); $i++){
            if($jugadores[$i] == ""){
                $jugadores[$i] = "Jugador " . ($i+1); 
            }
        }
        
        $_SESSION['jugadores'] = $jugadores;
        
        header('location:mainJugar.php');
     }
    ?>
</body>
</html>


<!-- dependiendo de cuantos jugadores se escojan que sería mejor
mostrar los 4 cuadros de texto de nombres o cambiar todo y mostrar los necearios,
obviamente en ela primera opción bloquendo los no utilizados y marcandolos en gris po rojo.
-->