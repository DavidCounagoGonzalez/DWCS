<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNO</title>
<!--    <link rel="stylesheet" href="inicio.css">-->
    
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
    
</head>
<body>
    <h1 id="titulo">Let's play UNO</h1>
    <form id="f01" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div id="botones">
            <input type='submit' name='2' class="numPJ" value="2 Jugadores"> 
            <input type='submit' name='3' class='numPJ' value='3 Jugadores'>
            <input type="submit" name='4' class="numPJ" value='4 Jugadores'>
        </div>
 
    <?php
    
    $numeroJug = 0;
    
    function script(){
        echo "<script>";
        echo "oculta();";
        echo "</script>";
    }
    
    function creaForm($numJug){
        echo '<div id="nombres">';
        for($i=0; $i<$numJug; $i++){
            $ident = "j" . ($i+1);
            echo "<label for='" . $ident . "'>Jugador " . ($i+1) . ":</label>" 
                 . "<input type='text' id='" . $ident . "' name='" . $ident . "' class='nombrePJ' placeholder='Jugador " . ($i+1) . "'>"
                    . "<br>";
        }
        echo '<input type="submit" name="submit" id="comenzar" value="Comenzar">
            <input type="button" class="atras" id="atras" onclick="oculta2()" value="Atras">';
        echo '<p> j'. $numJug .'</p>';
        echo '</div>';
        echo '</form>';
    }
    
    if(isset($_POST['2'])){
        session_start();
        script();
        $numeroJug = 2;
        $_SESSION['numJug']= $numeroJug;
        creaForm(2);
    }
    
    if(isset($_POST['3'])){
        session_start();
        script();
        $numeroJug = 3;
        $_SESSION['numJug']= $numeroJug;
        creaForm(3);
    }
    
    if(isset($_POST['4'])){
        session_start();
        script();
        $numeroJug = 4;
        $_SESSION['numJug']= $numeroJug;
        creaForm(4);
    }

    if(isset($_POST['submit'])){
        session_start();
        $jugadores = array();
        
        for($h=0; $h<$_SESSION['numJug']; $h++){
        array_push($jugadores, $_POST[('j' . $h)]);
        }

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