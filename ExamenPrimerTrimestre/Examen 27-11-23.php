<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">

<h1>Examen Desenvolvemento Web Contorno Servidor </h1>
<p>27-11-23</p>

<h2>Calcular Areas</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="base">Base</label>
    <!--Doy steps a los input number para los decimales-->
    <input type="number" name="base" step="0.01">
    <br>
    <label for="altura">Altura</label>
    <input type="number" name="altura" step="0.01">
    <br>
    <input type="submit" name="cuadrado" value="cuadrado">
    <input type="submit" name="rectangulo" value="rectangulo">
    <input type="submit" name="triangulo" value="triangulo">
</form>

</body>


<?php

/*
CONSIDERACION INICIAL

Si durante el desarrollo de alguna pregunta del examen el alumno se encuentra
con algun error de ejecucion que no es capaz de resolver puede volcar ese ejercicio
en otro archivo .php y continuar el examen.

*/


/*
Ejercicio 1 - Calculo y redondeo  ----- 2'5 puntos

Crea un formulario donde se le pida al usuario la altura y la base, en formato de dos cifras decimales,
para calcular un area. En ese mismo formulario el usuario eligira si quiere calcular el area de un 
cuadrado, un rectangulo o un triangulo.

A continuacion muestra el resultado de esa operacion por pantalla, redondeando los decimales para que solo
se muestre un decimal en pantalla.

Ejemplo: La base de un cuadrado es 25'34, su area es igual a 50'7.

Ten en cuenta que:

Para calcular el area:
    >Cuadrado: Base x Base
    >Rectangulo: Base X Altura
    >Triangulo: (Base X Altura) / 2

Si el usuario quiere calcular un cuadrado debe escribir el mismo número en la base y en la altura.
Si el usuario no introduce algun dato debe aparecer un mensaje de error para que rectifique.
Si el usuario introduce caracteres en vez de numeros debe aparecer un mensaje de error para que rectifique.
Ten en cuenta que este ultimo mensaje de error se debe realizar con filtros.

*/

//Hago un isset para cada botón y depende de cada uno realiza su verificación y calculo
if(isset($_POST['cuadrado'])){
    if(empty($_POST['base'])){
        $alerta = "Debes dar la base para poder calcular el área de esta figura";
        echo "<script type='text/javascript'>alert('$alerta');</script>";        
    }else if($_POST['base'] != $_POST['altura']){ // si la base es distinta a la altura pide que corrijas
        $alerta = "Indica la misma base que altura";
        echo "<script type='text/javascript'>alert('$alerta');</script>";     
    }else{
        $resultado = $_POST['base']*$_POST['altura'];
        echo "<br> El area del cuadrado sería " . round($resultado,1);
    }
}

if(isset($_POST['rectangulo'])){
    if(empty($_POST['base']) || empty($_POST['altura'])){
        $alerta = "Necesita pasar ambos datos para saber el área";
        echo "<script type='text/javascript'>alert('$alerta');</script>";
    }else{
        $resultado = $_POST['base'] * $_POST['altura'];
        echo "<br> El area del rectángulo sería " . round($resultado,1);
    }
}

if(isset($_POST['triangulo'])){
    if(empty($_POST['base']) || empty($_POST['altura'])){
        $alerta = "Necesita pasar ambos datos para saber el área";
        echo "<script type='text/javascript'>alert('$alerta');</script>";
    }else{
        $resultado = ($_POST['base'] * $_POST['altura'])/2;
        echo "<br> El area del triángulo sería " . round($resultado,1);
    }
}
/*
Ejercicio 2 - Creación de listas ----- 2'5 puntos

Lee el fichero "peliculas.json" y crea una tabla mostrando por pantalla la pelicula,
su fecha y su nota, a continuación guarda en un fichero nuevo la nota media de 
todas las peliculas, señalando dentro del fichero tambien el nombre de todas las peliculas, pero 
no muestres su fecha de creación. A ese fichero llamalo "NotaMedia".

*/
?>
<h2>Tabla Películas</h2>
<!--Creo la cabecera-->
<table style='border:1px solid black; margin: 10px'>
    <tr style='border:1px solid black'>
        <th style='border:1px solid black; padding:5px'>Nombre</th>
        <th style='border:1px solid black; padding:5px'>Fecha</th>
        <th style='border:1px solid black; padding:5px'>Nota</th>
    </tr>
<?php
//SI existe lo borra
if(file_exists("NotaMedia.txt")){
    unlink("NotaMedia.txt");
}
//leemos y decodeamos el json
$json = file_get_contents('peliculas.json');

$decoded_json = json_decode($json, true);
//lo guardamos en una variable 
$peliculas = $decoded_json['peliculas'];
//Por cada objeto pelicula en peliculas creanis una fila y celdas con cada valor
foreach ($peliculas as $pelicula) {
    echo "<tr style='border:1px solid black'>".
            "<td style='border:1px solid black; padding:5px'>" . $pelicula['nombre'] . "</td>".
            "<td style='border:1px solid black; padding:5px'>" . $pelicula['año'] . "</td>".
            "<td style='border:1px solid black; padding:5px'>" . $pelicula['Nota'] . "</td>".
         "</tr>";
    
    $notaPeli = $pelicula['nombre'] . " tiene un " . $pelicula['Nota'] . " de nota media según la audiencia \n";
    //Abrimos o creamos el archivo en añadir
    $fichero = fopen("NotaMedia.txt", 'a');
    
    fwrite($fichero, $notaPeli);
    
    fclose($fichero);
}


?>
</table>

<h2>Confirmar Contraseña</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre">
    <br>
    <label for="contraseña">Contraseña</label>
    <input type="password" name="contraseña" required="required">
    <br>
    <label for="confirma">Confirma</label>
    <input type="password" name="confirma" required="required">
    <br>
    <input type="submit" name="registrar" value="Registrar">
</form>
<?php
/*
Ejercicio 3 - Cookies ----- 2'5 puntos

Crea un formulario que emule una pagina para crear una contraseña para un usuario.
La pagina solicita por pantalla un nombre y una contraseña, que el usuario tiene que escribir dos
veces para verificar que realmente quiere tener esa contraseña. Usando Cookies guarda esas dos 
contraseñas y el nombre del usuario. A continuación, cuando la persona finaliza el formulario, este
te llevara a una pagina web php nueva llamada "ValidacionDeContraseña" la cual lee las cookies
de las dos contraseñas; si coiniciden, mandara un mensaje de "Usuario <nombre de usuario> creado correctamente."
Si no coincide, mandara un mensaje de error pidiendo que las dos contraseñas seran iguales.

Para ambos casos, crea un boton que vuelva a la pagina web "Examen 27-11-23".
Ten en cuenta que el usuario no puede ver las contraseñas que está escribiendo, como sucede en la vida real.

*/
//Cuando se pulsa el botón creamos las cookies que duran 1 hora y vamos al otro php
if(isset($_POST['registrar'])){
    setcookie("nombre", $_POST['nombre'], time()+3600);
    setcookie("contraseña", $_POST['contraseña'], time()+3600);
    setcookie("confirma", $_POST['confirma'], time()+3600);
    
    header("location:ValidacionContraseña.php");
}


?>
<br><br>
<h2>Salario Final</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="nombre" >Nombre: </label>
    <input type="text" name="nombre">
    <label for="apellido">Apellidos: </label>
    <input type="text" name="apellido">
    <br>
    <label for="añosEmp">Años en la Empresa: </label>
    <input type="number" name="añosEmp">
    <br>
    <label for="salariOG">Salario original: </label>
    <input type="number" name="salariOG" step="0.01">
    <br>
    <label for="puesto">Puesto: </label>
    <select name="puesto">
        <option value="empleado" selected>Empleado</option>
        <option value="jefe">Jefe</option>
        <option value="becario">Becario</option>
    </select>
    <br>
    <input type="submit" name="calculaSal" value="Calcula">
</form>

<?php
/*
Ejercicio 4 - Objetos ----- 2'5 puntos

Crea un objeto "Empleado" que contrendrá los atributos: "Nombre", "Apellido", "años en la empresa" y "salario original".

Para calcular el salario Final, que es lo que cobra este mes la persona, se tiene que realizar un bono:

    Bono = (Salario original X (años en la empresa / 100))

    salario Final = Salario original + Bono

Es decir:

    salario Final = Salario original + (Salario original X (años en la empresa / 100))

A continuación crea dos clases abstractas.

Una de esas clases, sera de "jefe", que calcula el salario final con un bono diferente:
    Bono = (Salario original X (años en la empresa / 20))

La otra será "becario", que calcula el salario final con otro bono diferente:
    Bono = (Salario original X (años en la empresa / 500))

A continuación crea un formulario para calcular el salario del empleado, donde se pedira el nombre, apellido, 
años en la empresa, salario original y si es un empleado normal, un jefe o un becario.

Luego, usando objetos, muestra por pantalla su nombre, puesto y salario final. Puedes realizar tantas paginas php como necesites.

*/
require_once('Empleado.php');
if(isset($_POST['calculaSal'])){
    //Si algún input está vacio pide llenarlo
    if(empty($_POST['nombre']) || empty($_POST['nombre']) || empty($_POST['nombre']) || empty($_POST['nombre'])){
        $alerta = "rellena todos los campos";
        echo "<script type='text/javascript'>alert('$alerta');</script>";  
    }else{
        //depende del valor del select lanza un case creando el objeto de ese tipo e imprimiendo sus datos con la función correspondiente al salario final.
        switch ($_POST['puesto']) {
            case 'empleado':
                    $empleado = new Normal($_POST['nombre'], $_POST['apellido'], $_POST['añosEmp'], $_POST['salariOG']);
                    echo $empleado->getNombre() . " " . $empleado->getApellido() . " es ". $_POST['puesto'] . " y tiene un salario final de " . $empleado::calculaSalario($empleado) . "€";
                break;
            case 'jefe':
                    $empleado = new Jefe($_POST['nombre'], $_POST['apellido'], $_POST['añosEmp'], $_POST['salariOG']);
                    echo $empleado->getNombre() . " " . $empleado->getApellido() . " es ". $_POST['puesto'] . " y tiene un salario final de " . $empleado::calculaSalario($empleado) . "€";
                break;
            case 'becario':
                    $empleado = new Becario($_POST['nombre'], $_POST['apellido'], $_POST['añosEmp'], $_POST['salariOG']);
                    echo $empleado->getNombre() . " " . $empleado->getApellido() . " es ". $_POST['puesto'] . " y tiene un salario final de " . $empleado::calculaSalario($empleado) . "€";
                break;
        }
    }
}