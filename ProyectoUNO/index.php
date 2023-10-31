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
            <input type='button' class="numPJ" onclick='oculta()' value="2 Jugadores"> 
            <input type='button' class='numPJ' onclick='oculta()' value='3 Jugadores'>
            <input type="button" class="numPJ" onclick='oculta()' value='4 Jugadores'>
        </div>
        <div id="nombres">
            <label for="j1">Jugador 1:</label>
            <input id="j1" class="nombrePJ">
            <label for="j2">Jugador 2:</label>
            <input id="j2" class="nombrePJ">
            <label for="j3">Jugador 3:</label>
            <input id="j3" class="nombrePJ">
            <label for="j1">Jugador 4:</label>
            <input id="j4" class="nombrePJ">
            <input type='submit' name="submit" id='comenzar' value='Comenzar'>
            <input type="button" class="atras" id='atras' onclick='oculta2()' value='Atras'>
        </div>
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
        $jugadores = array();
        array_push($jugadores, $_POST['j1']);
        array_push($jugadores, $_POST['j2']);
        array_push($jugadores, $_POST['j3']);
        array_push($jugadores, $_POST['j4']);
        
        header('location:mainJugar.php?jugadores='.$jugadores);
     }
    ?>
</body>
</html>


<!-- dependiendo de cuantos jugadores se escojan que sería mejor
mostrar los 4 cuadros de texto de nombres o cambiar todo y mostrar los necearios,
obviamente en ela primera opción bloquendo los no utilizados y marcandolos en gris po rojo.
¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿?¿? -->