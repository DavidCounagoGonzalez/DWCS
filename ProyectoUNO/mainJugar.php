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
    
    $jugadores = $_SESSION['jugadores'];
    
    $json = file_get_contents("Baraja.json");
    
    $decoded_json = json_decode($json, true);
    
    $cartas = $decoded_json;
    
    shuffle($cartas);
    
    $mano = array();
  
    for($i=0; $i<count($jugadores);$i++){
        for($c=0; $c<7;$c++){

            array_push($mano, $cartas[$c]);
        }
        ${'jugador' . ($i+1)} = new Jugador($jugadores[$i], $mano);
    }
    
    echo $jugador1->getNombre();
    ?>
</body>
</html>

<!--  -->