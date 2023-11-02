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
    $jugadores = $_SESSION['jugadores'];
    
    $json = file_get_contents("Baraja.json");
    
    $decoded_json = json_decode($json, true);
    
    $cartas = $decoded_json;
  
    for($i=0; $i<count($jugadores);$i++){
        echo "<br>" . $jugadores[$i];
        echo implode(",", $cartas[$i]);
    }

    ?>
</body>
</html>

<!--  -->