
<body style="background-color:rgba(125,125,155);">
    
<h1>Ejercicios "Funciones"</h1>

<p>1. Cilindro</p>

<?php

/*
Crea una función que reciba como parámetros el valor del radio de la base y la altura de un cilindro y devuelva el volumen del cilindro, 
teniendo en cuenta que el volumen de un cilindro se calcula como Volumen = númeroPi * radio * radio * Altura 
siendo númeroPi = 3.1416 aproximadamente.
Utiliza float
*/

function volCilindro($radio, $altura){
    
    $volumen= pi() * ($radio**2) * $altura;
    
    echo "El volumen del cilindro es: " . $volumen;
}

volCilindro(12, 23);

?>



<p>2.Máximo valor del array</p>

<?php 

/*

Haya en una función el valor máximo de un array de ints, pasando como argumento el vector

 */

$lista = array(2,5,1,6,34,49,4,3);

function buscaMayor($nums){
    
    $maximo = 0;
    
    foreach ($nums as $valor){//Recorremos cada valor se la lista
        if($valor > $maximo){// Si el valor es mayor que el recogido en la var máximo
            $maximo = $valor;//Este se recoge en la variable
        }
    }
    echo "El número más grande de la lista es: " . $maximo;
    
}

buscaMayor($lista);


?>

<p>3. Ordenar array</p>
<?php 
/*

Realiza una función que, dado un array de integers, me muestre por pantalla el array ordenado de mayor e menos número

*/

$lista2 = array(2,5,1,6,34,49,4,3);

function ordenarLista($nums){
    $c = count($nums); //Recogemos el tamaño de la lista
    
    for($i = 0; $i < $c; $i++){ //Iniciamos un bucle for para limitar el comparativo
        
        for($j = 0; $j < $c - $i - 1; $j++){ //Iniciamos un bucle for para recorrer la lista poco a poco
            
            if($nums[$j] < $nums[$j + 1]){ //si el número es menor a su posterior estos intercambian posiciones
                $guard = $nums[$j];
                $nums[$j] = $nums[$j+1];
                $nums[$j + 1] = $guard;
            }

        }
          
    }  
    return $nums;
}
echo "La lista ordenada queda tal que así: ";
echo implode(", ", ordenarLista($lista2));

?>


<p>4.Función dentro de función</p>
<?php 
/*
Ya que se puede usar una función dentro de otra función, realiza una calculadora en una función que tenga como parametros
tres variables: num1, num2 y "Operación". Donde la operación sea un string que nos indica cual de las 4 operaciones basicas
queremos hacer. Esa calculadora hazla llamando a 4 funciones:
    sumar($n1, $n2);
    restar($n1, $n2);
    multiplicar($n1, $n2);
    dividir($n1, $n2);

*/

$operacion="dividir";
$n1=8;
$n2=7;

function Calculadora($op, $num1, $num2){
    
    
    switch ($op){ //Creamos un switch sobre la variable de la opción 
        case "sumar":   //según el string recogido se lanza un case que llama a la función que realice esa operación.
            echo sumar($num1, $num2);
            break;
        case "restar":
            echo restar($num1,$num2);
            break;
        case "multiplicar":
            echo multiplicar($num1, $num2);
            break;
        case "dividir":
            echo dividir($num1, $num2);
            break;
        default:
            echo "Esta no es una opción";
            break;
    }
    
    
    
}

function sumar($num1, $num2){
    return "La suma es de: " . ($num1 +$num2);
    }

function restar($num1, $num2){
    return "La resta es de: " . ($num1 - $num2);
    }

function multiplicar($num1, $num2){
    return "La multiplicación es de: " . ($num1 * $num2);
}

function dividir($num1, $num2){
    return "La división es de: " . ($num1/$num2);
}

Calculadora($operacion, $n1, $n2);

?>

    
    
</body>
