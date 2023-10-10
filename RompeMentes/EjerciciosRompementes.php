<body style="background-color:rgba(125, 125, 155);">

<h1>Ejercicios "Rompementes"</h1>
<p>Level 1. ValidaNombreUsuario</p>
</body>

<?php

/*
Haga que la función ValidaNombreUsuario(str) tome el parámetro str que se pasa y determine si la cadena String es un nombre de usuario válido de acuerdo con las siguientes reglas:

1. El nombre de usuario tiene entre 4 y 25 caracteres.
2. Debe comenzar con una letra.
3. Solo puede contener letras, números y el carácter de subrayado.
4. No puede terminar con un carácter de subrayado.

Si el nombre de usuario es válido, entonces su programa debería devolver un booleano "true"; de lo contrario, devolverá un booleano "false".

Ejemplos

    Input: "lp_"
    Output: false

    Input: "Pazo_da_merce"
    Output: true
*/

$str = "Pazo_da_merce";

function ValidaNombreUsuario($str) {

    // El código empieza aquí
    $caract = strlen($str);
    if($caract >= 4 & $caract <= 25){
        
        $comprueba = preg_match("/^([A-z])[A-z0-9]*([A-z0-9])$/", $str);
        if($comprueba == 1){
            $barrabaja = preg_match("/[^_]$/", $str);
            
            if($barrabaja == 1){
                echo "El nombre de usuario es válido";
                
            }else{
                echo "El nombre de usuario es inválido";
            }
                      
        }else{
            echo "El nombre de usuario es inválido";
        }
        
    }else{
        echo "El nombre debe tener entre 4 y 25 caracteres.";
    }

}

  //Comprobación 
  echo ValidaNombreUsuario($str);  

?>

<p>Level 2. ComprobarCorchetes
</p>
<?php

/** 
 * Haga que la función ComprobarCorchetes(str) tome el parámetro str que se pasa y devuelva 1 si los corchetes 
 * coinciden correctamente y se tiene en cuenta cada uno. De lo contrario, devuelve 0. Por ejemplo: si str es 
 * "(hola (mundo))", entonces la salida debería ser 1, pero si str es "((hola (mundo))", la salida debería ser 
 * 0 porque los corchetes no coinciden correctamente. Sólo "(" y ")" se utilizarán como corchetes. Si str no 
 * contiene corchetes, devuelva 1.
 * 
 * */

$str2 = "((hola (mundo)))";

function ComprobarCorchetes($str){
    
   $arrayStr = new CachingIterator(new ArrayIterator(str_split($str, $length = 1)));
   $contA = 0;
   $contC = 0;
  
  while($arrayStr->hasNext()){
      $arrayStr->next();
      $comp = $arrayStr->current();
     
      if($comp == "("){
          $contA++;
      }elseif ($comp == ")") {
          $contC++;
      }
      if($contA < $contC){
          return 0;
      }
  }
  
  if($contA == $contC){
      echo "La estructura es correcta";
      
  }else{
      echo "La estructura es incorrecta";
  }
        
}

echo ComprobarCorchetes($str2);
?>

<p>Level 3. CuestionDeInterrogaciones</p>

<?php 


/**
 * 
 * Haga que la función CuestionDeInterrogaciones(str) tome el parámetro de cadena str, que contendrá números de un solo dígito, letras y 
 * signos de interrogación, y verifique si hay exactamente 3 signos de interrogación entre cada par de dos números que suman 10. 
 * Si es así, entonces su programa debería devolver "tru"; de lo contrario, debería devolver "false"". Si no hay dos números que sumen
 *10 en la cadena, entonces su programa también debería devolver falso.
 *
 *Por ejemplo: si str es "arrb6???4xxbl5???eee5", entonces su programa debería devolver verdadero porque hay exactamente 3 
 *signos de interrogación entre 6 y 4, y 3 signos de interrogación entre 5 y 5 al final de la cadena.
 * 
 */

 $str1 = "arrb6???4xxbl5???eee5";


function CuestionDeInterrogaciones($str1) {
    
    

}
   

echo CuestionDeInterrogaciones($str);  


