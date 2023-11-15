<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar UNO</title>
    <link rel="shortcut icon" href="#">
</head>
<body>
    <form id="fJugar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <?php
    session_start();
    //Llamamos a la clase jugador con nombre y mano de cartas
    require_once('Jugador.php');
    //Guardamos en un array los nombres de los jugadores recogidos en el session
    $jugadores = $_SESSION['jugadores'];
    
    $numeroJug = count($jugadores);

    //Obtenemos los datos guardados en el json que es nuestra baraja, lo decodeamos y lo guardamos en el array cartas.
    $json = file_get_contents("Baraja.json");
    
    $decoded_json = json_decode($json, true);
    
    $cartas = $decoded_json;
    $primera;
    $comienzo;

    //array auxiliar para recoger la mano de cada jugador.
    $mano = array();
    if($_SESSION['nuevo']==true){
        shuffle($cartas);
        for($i=0; $i<$numeroJug;$i++){
            //For que quita 7 cartas del array cartas y las manda a la mano.

                for($c=0; $c<7;$c++){

                    array_push($mano, array_pop($cartas));
                }
            //creamos una variable para cada jugador le damos su nombre y su mano.
            ${'jugador' . ($i+1)} = new Jugador($jugadores[$i], $mano);
            $_SESSION['jugador'.($i+1)] = (${'jugador' . ($i+1)})->getNombre();
            $_SESSION['mano'.($i+1)] = (${'jugador' . ($i+1)})->getMano();

            //print_r($_SESSION['jugador1']->getMano());

    //        echo "<br>" . (${'jugador' . ($i+1)})->getNombre() . "<br>";
    //        //Imprimimos la mano del jugador 
    //        foreach((${'jugador' . ($i+1)})->getMano() as $key => $value){
    //            echo $value["color"] . "/" . $value["valor"] . " , ";
    //        }
            $mano = [];
    //        echo "<br>";
            $_SESSION['baraja'] = $cartas;
            do{
                shuffle($_SESSION['baraja']);
                $_SESSION['primera'] = ($_SESSION['baraja'])[count($_SESSION['baraja'])-1];
            }while(($_SESSION['primera'])["color"] == "negro");
            array_pop($_SESSION['baraja']);
            $_SESSION['comienzo'] = true;
        }
        
    }
    $_SESSION['nuevo'] = false;

    
    
    $mesa = "<p id='mesa'>Mesa :" . ($_SESSION['primera'])["color"] . " " . ($_SESSION['primera'])["valor"] . "</p>";
    
    $ganador=0;
    
    if(isset($_POST["jugarCarta"])){
        $valoresMesa = explode("/", $_SESSION['cartaJuega']);
        $valoresMano = explode("/", $_POST['manoJug']);
        echo $_SESSION['cartaJuega'];
        if($_SESSION['comienzo']==false){
            if($valoresMano[0]===$valoresMesa[0] || $valoresMano[1]===$valoresMesa[1]){
                
                 $_SESSION['cartaJuega'] = $_POST['manoJug'];
                 $mesa = "<p id='mesa'>Mesa :" . $_SESSION['cartaJuega'] . "</p>";

                 foreach($_SESSION['mano' . ($_SESSION['jugando'])] as $key => $value){
                     $compara = $value["color"] . "/" . $value["valor"];
                     if($compara === $_SESSION['cartaJuega']){
                         unset($_SESSION['mano' . ($_SESSION['jugando'])][$key]);
                     }
                 }
            }
            $_SESSION['jugando']++;

            if($_SESSION['jugando']>$numeroJug){
             $_SESSION['jugando'] = 1;
             }
        }
        if($_SESSION['comienzo']==true){
            $_SESSION['jugando']++;
        }
        echo "<br>" . $_SESSION['jugador' . $_SESSION['jugando']] . "<br>";
        echo "<select name='manoJug'>";
        foreach($_SESSION['mano' . $_SESSION['jugando']] as $key => $value){
            echo "<option value='". $value["color"] . "/" . $value["valor"] . "'>" . $value["color"] . "/" . $value["valor"] . "</option> ";
        }
        echo"</select>";
        
        $_SESSION['comienzo'] = false;
    }
    
    if(isset($_POST["robar"])){
        $ultima = array_pop($_SESSION['baraja']);
        array_push($_SESSION['mano' . $_SESSION['jugando']], $ultima);

        echo "<br>" . $_SESSION['jugador' . $_SESSION['jugando']] . "<br>";
        echo "<select name='manoJug'>";
        foreach($_SESSION['mano' . $_SESSION['jugando']] as $key => $value){
            echo "<option value='". $value["color"] . "/" . $value["valor"] . "'>" . $value["color"] . "/" . $value["valor"] . "</option> ";
        }
        echo"</select>";
    }

    echo "<input type='submit' name='jugarCarta' value='Jugar'/>";
    echo "<input type='submit' name='robar' value='Robar'/>";
    echo $mesa;

    echo "<p id='moton'> Quedan: " . (count($_SESSION['baraja'])-1) . " cartas</p>";
    
    ?>
    </form>
</body>
</html>