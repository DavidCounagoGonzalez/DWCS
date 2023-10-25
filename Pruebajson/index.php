<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $people_json = file_get_contents('people.json');
        $decoded_json = json_decode($people_json, true);
        $customers = $decoded_json['customers'];
        foreach($customers as $customer) {
            $name = $customer['name'];
            $countries = $customer['countries'];
            foreach($countries as $country) {
                echo $name.' visited '.$country['name'].' in '.$country['year'].'.<br>';
            }
        }
/* 
Andrew visited Italy in 1983. 
Andrew visited Canada in 1998. 
Andrew visited Germany in 2003. 

Sajal visited Belgium in 1994. 
Sajal visited Hungary in 2001. 
Sajal visited Chile in 2013. 

Adam visited France in 1988. 
Adam visited Brazil in 1998. 
Adam visited Poland in 2002. 

Monty visited Spain in 1982. 
Monty visited Australia in 1996. 
Monty visited Germany in 1987. 
*/
?>
    </body>
</html>
