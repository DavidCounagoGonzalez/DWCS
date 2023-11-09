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
    <form id="fJugar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
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
    
    //mezclamos las cartas.
    shuffle($cartas);
    
    //array auxiliar para recoger la mano de cada jugador.
    $mano = array();
    if($_SESSION['nuevo']==true){
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
        }
    }
    $_SESSION['nuevo'] = false;
//    echo "<br><br>";

    $primera;
    //Mientras la carta que saque sea negra se barajan hasta sacar una válida.
    do{
    shuffle($cartas);
    $primera = $cartas[count($cartas)-1];
    }while($primera["color"] == "negro");

    //sacamos la carta con la que inciamos de la baraja
    array_pop($cartas);

    $mesa = "<p id='mesa'>Mesa :" . $primera["color"] . " " . $primera["valor"] . "</p>";
    
    $ganador=0;
    
    
    if(isset($_GET["jugarCarta"])){
       $_SESSION['jugando']++;
       
       if($_SESSION['jugando']>$numeroJug){
        $_SESSION['jugando'] = 1;
        }
       
       echo "<br>" . $_SESSION['jugador' . $_SESSION['jugando']] . "<br>";
       echo "<select id='jugar'>";
       foreach($_SESSION['mano' . $_SESSION['jugando']] as $key => $value){
            echo "<option value='". $value["color"] . "/" . $value["valor"] . "'>" . $value["color"] . "/" . $value["valor"] . "</option> ";
        }
        echo"</select>";
    }

    echo "<input type='submit' name='jugarCarta' value='Jugar'/>";
    echo $mesa;

    echo "<p id='moton'> Quedan: " . count($cartas) . " cartas</p>";
    ?>
    </form>
</body>
</html>