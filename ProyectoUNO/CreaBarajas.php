<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $colores = array("rojo","azul",'verde','amarillo','negro');
        $valor = array(0,1,2,3,4,5,6,7,8,9,'+2','cambioSentido','prohibido');
        $accion = array('+4','comodin');
        
        $baraja = array();
        $aux = array();
        
        for ($i=0; $i< count($colores); $i++){
            if($colores[$i] === 'negro'){
                for($j=0; $j<count($accion); $j++){
                    $repNeg = 0;
                    
                    while($repNeg < 8){
                        $aux = array();
                        array_push($aux, "color =>  $colores[$i]");
                        array_push($aux, "valor => $accion[$j]");
                        array_push($baraja, $aux);
                    $repNeg++;
                    }
                }
            }else{
                for($h=0; $h<count($valor); $h++){
                    $repColor = 0;
                    
                    while($repColor < 2){
                        $aux = array();
                        
                        array_push($aux, "color => $colores[$i]");
                        array_push($aux, "valor => $valor[$h]");
                        array_push($baraja, $aux);
                        $repColor++;
                    }
                }
            }
        }
        
        $fichero = fopen("Baraja.json", "w+");
        fwrite($fichero, json_encode($baraja));
        echo "<a href='Baraja.json'>Ir al fichero</a> ";
        fclose($fichero);

        ?>
    </body>
</html>
