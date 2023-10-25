<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<b>Decodificando un archivo json:</b><br>"
        . "<a href='Peliculas.json'>Contenido del archivo</a><br><br>";
         
//
//        $jsonIterator = new RecursiveIteratorIterator(
//            new RecursiveArrayIterator(json_decode($json, TRUE)),
//            RecursiveIteratorIterator::SELF_FIRST);
        $json = file_get_contents('Peliculas.json');
        
        $decoded_json = json_decode($json, true);
        
        $peliculas = $decoded_json['peliculas'];
        
        $cadena = "";
        
        foreach($peliculas as $pelicula){
            $nombre = $pelicula['nombre'];
            $datos = $pelicula["datos"];
            $cadena.= 'La película ' . $nombre;
            foreach ($datos as $dato){
                $actores = $dato['actores'];
                $cadena.=" del año " . $dato['año'] . 
                        ', dirigida por ' . $dato['director'] . ", le doy una nota "
                        . "de un " . $dato['nota'] . ", con ";
                foreach ($actores as $actor){
                    $cadena.= $actor['nombre']
                            . " (" . $actor['nacimiento'] . "), ";
                }
                $cadena.= ' como protagonistas.';
            }
            $cadena.= "<br> <br>";  
        }
        echo $cadena;
        
//        foreach ($jsonIterator as $key => $val) {
//            if(is_array($val)) {
//                echo "<br>$key:<br>";
//            } else {
//                if($key != "id"){
//                echo "&nbsp $key => $val <br>";
//                }
//            }
//
//        }
        ?>
    </body>
</html>
