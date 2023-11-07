<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar UNO</title>
</head>
<body>
    

    <?php
    session_start();
    //Creamos clase jugador con nombre y mano de cartas
    class Jugador{
    public $nombre;
    public $mano = array();
    
    public function __construct($nombre, $mano) {
        $this->nombre = $nombre;
        $this->mano = $mano;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMano() {
        return $this->mano;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setMano($mano): void {
        $this->mano = $mano;
    }
    
    }
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
  
    for($i=0; $i<$numeroJug;$i++){
        //For que quita 7 cartas del array cartas y las manda a la mano.
        for($c=0; $c<7;$c++){

            array_push($mano, array_pop($cartas));
        }
        //creamos una variable para cada jugador le damos su nombre y su mano.
        ${'jugador' . ($i+1)} = new Jugador($jugadores[$i], $mano);

        echo "<br>" . (${'jugador' . ($i+1)})->getNombre() . "<br>";
        //Imprimimos la mano del jugador 
        foreach($mano as $key => $value){
            echo $value["color"] . "/" . $value["valor"] . " , ";
        }
        $mano = [];
        echo "<br>";
    }
    echo "<br><br>";

    $primera;
    //Mientras la carta que saque sea negra se barajan hasta sacar una válida.
    do{
    shuffle($cartas);
    $primera = $cartas[count($cartas)-1];
    }while($primera["color"] == "negro");

    //sacamos la carta con la que inciamos de la baraja
    array_pop($cartas);

    echo "Mesa :" . $primera["color"] . " " . $primera["valor"];

    echo "<br><br> Quedan: " . count($cartas) . " cartas";

    ?>
</body>
</html>

<!--  -->
