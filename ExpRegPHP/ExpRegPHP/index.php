<?php

$nombre = "Juan";
    $MiTexto = "Alan Mathison Turing (Paddington, Londres; 23 de junio de 1912-Wilmslow, Cheshire; 7 de junio de 1954) 
    fue un matemático, lógico, informático teórico, criptógrafo, filósofo y biólogo teórico británico. 
    Es considerado como uno de los padres de la ciencia de la computación y precursor de la informática moderna. 
    Proporcionó una formalización influyente de los conceptos de algoritmo y computación: la máquina de Turing.";
    $CorreoElectronico = "elprofesoralberto@gmail.com";
    $abecedario = "abcdefghijklmnñopqrstuvwz";
    
    echo "<h1>Ejercicios de expresiones regulares</h1>";
    
    //Ejercicio 1 - Usando "preg_match()" comprueba se en la variable abecedario existe el patron "abc"
    echo preg_match("/abc/", $abecedario)? "Está" : "No está";
    
    echo "<br><br>";
    //Ejercicio 2 - Usando "preg_match()" comprueba se en la variable abecedario existe el patron "fyu"
    echo preg_match("/fyu/", $abecedario)? "Está" : "No está";
    
    echo "<br><br>";
    //Ejercicio 3 - Comprueba si el la variable "Mitexto" empieza por una a
    echo preg_match("/^a/", $MiTexto)? "Sí" : "No";

    echo "<br><br>";
    //Ejercicio 3 b - Usa un "insensitive" para comproebar que  la variable "Mitexto" empieza por una a, independientemente si es mayuscula o minuscula
    echo preg_match("/^a/i", $MiTexto)? "Sí" : "No";

    echo "<br><br>";
    //Ejercicio 4 - Comprueba si el la variable "Mitexto" termina con la expresión "Turing."
    echo preg_match("/Turing.$/", $MiTexto)? "Sí" : "No";

    echo "<br><br>";
    //Ejercicio 5 - Comprueba si en la variable "Nombre" la segunda letra es una vocal.
    $letra = substr($nombre, 1, 1);
    echo preg_match("/[aeiou]/", $letra)? "Es vocal" : "Es consonante";

    echo "<br><br>";
    //Ejercicio 6 - Compruebame que la variable "abecedario" solo contiene letras minusculas
    echo preg_match("/[A-Z]/", $abecedario)? "Hay mayúsculas" : "Solo hay minúsculas";
    // echo preg_macth("/^[a-z]+$/", $abecedario)? "Solo minúsculas" : "hay mayúsculas";
    
    echo "<br><br>";
    //Ejercicio 7 - Explica para que sirve los metacaracteres "*", "+", y "?" usando un ejemplo de cada uno.
    echo "Expresa si hay cero o un caracter del indicado seguidos: ";
    echo preg_match("/ama?l/", "amaaaaalgama");
    echo "<br>";
    echo "Expresa si hay cero o más caracteres del indicado seguidos: ";
    echo preg_match("/ama*l/", "amaaaaalgama");
    echo "<br>";
    echo "Indica si hay uno o varios del carcacter indicado seguidos: ";
    echo preg_match("/a+/", "amaaaaalgama");
    
    echo "<br><br>";
    //Ejercicio 8 - Explica para que serve los metacaracteres "{}" Usa un ejemplo.
    echo "Sirve para indicar el número exacto de caracteres que quieres del indicado. ";
    echo preg_match("/[aeiou]{2,5}/", "amalgama");
    
    echo "<br><br>";
    //Ejercicio 9 - Comprueba que en la variable "MiTexto" aparece la palabra "algoritmo", "ordenador", o "computación"
    echo preg_match("/algoritmo|ordenador|computación/i", $MiTexto)? "Está <br><br>" : "No está <br><br>";

    //Ejericico 10 - Comprueba cuantas veces aparece la palabra "computación" en el texto
    $repeticion = preg_match_all("/computación/i", $MiTexto);
    echo "Se repite " . $repeticion . " vez/veces.<br><br>";

    //Ejericico 11 - Comprueba cuantas veces aparece la palabra "computación" o "moderna" en el texto
    $repeticion2 = preg_match_all("/computación|moderna/i", $MiTexto);
    echo "Se repiten " . $repeticion2 . " vez/veces. <br><br>";

    //Ejercicio 12 - Remplaza en "MiTexto" la palabra "padres" por "progenitores"
    echo preg_replace("/padres/i", "progenitores", $MiTexto);
    
    echo "<br><br>";
    //Ejercicio 13 - Cuenta cuantos números hay en el texto "MiTexto
    $numeros = preg_match_all("/[0-9]+/", $MiTexto);
    echo "Hay " . $numeros . " números en el texto <br><br>";

    //Ejercicio 14 - Comprueba que el correo de la variable $CorreoElectronico es un correo valido, es decir, esta formado por una cadena de al menos 1 caracter de caracteres con
    //              letras o numeros, seguido de un "@", seguido de otra cadena de caracteres sin numeros, seguido de ".com"
    echo preg_match("/^[A-z0-9]+@[A-z]+(.com)$/", $CorreoElectronico)? "Email válido" : "Email inválido";
