<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de Conocimientos Aprendidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(72, 72, 72);
            color: white;
            margin: 0;
            font-size:16px;
            align-items: center;
            justify-content: center;
            padding: 20px 0 0 25%;
            line-height: 1.6;
            box-sizing: border-box;
        }
        h1{
            font-weight: bold;
            font-size: 2rem;
        }
        h1, h2 {
            color:rgb(34, 137, 240);
        }
        h1,h2:hover{
            color:rgb(255, 255, 255);
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        div{
            
            
        }
        div .container2{
            border: 2px solid white;
            padding-left: 10rem;
            border-radius: 15px;
            max-width: 65%;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            padding-bottom:4rem;
        } 

        div .container{
            background-color:rgb(50, 50, 50);
            padding:10px;
            border-radius:5px;
            width: 50%;
            border:none;

        }
        .container:hover{
            font-weight:bold;
            font-size:18px;
            background-color:rgb(108, 137, 167);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        
        </style>
</head>
<body>
<div>
    <div class="container2">

    <h1>Aplicación de Conocimientos Aprendidos</h1>
    <?php
    // Uso de variables y concatenación
    $name = "Ruben Clemente";
    echo "Hola <b>" . $name . "</b>, encantado de conocerte<br>";

    // Operaciones aritméticas
    $a = 8;
    $b = 3;
    echo "<h2>Operaciones aritméticas:</h2>";
    // Creación de un div con contenido dinámico
    echo '<div class="container">';
    echo "$a + $b = " . ($a + $b) . "<br>";
    echo "$a - $b = " . ($a - $b) . "<br>";
    echo "$a * $b = " . ($a * $b) . "<br>";
    echo "$a / $b = " . ($a / $b) . "<br>";
    echo '</div>';


    // Operadores de comparación
    echo "<h2>Operadores de comparación:</h2>";
    echo '<div class="container">';

    if ($a == $b) {
        echo "$a == $b: true<br>";
    } else {
        echo "$a == $b: false<br>";
    }
    if ($a != $b) {
        echo "$a != $b: true<br>";
    } else {
        echo "$a != $b: false<br>";
    }
    if ($a > $b) {
        echo "$a > $b: true<br>";
    } else {
        echo "$a > $b: false<br>";
    }
    if ($a < $b) {
        echo "$a < $b: true<br>";
    } else {
        echo "$a < $b: false<br>";
    }
    echo '</div>';


    // Uso de arrays
    $dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
   

    echo "<h2>Uso de arrays:</h2>"; 
    echo '<div class=container>';
    echo "El tercer día de la semana es: " . $dias[2] . "<br>";   
    echo '</div>';



    // Redondeo
    $precioNeto = 1000.64;
    $iva = 0.16;
    $resultado = $precioNeto * $iva;
    echo "<h2>Redondeo:</h2>";
    echo '<div class="container">';

    echo "El precio es de $precioNeto y el IVA es $iva%<br>";
    echo "Resultado: " . round($resultado, 3) . " con uso de ROUND()<br>";
    echo "Resultado sin redondeo: $resultado<br>";
   


    // Uso de sprintf para formateo
    $resultadoFormateado = sprintf("%01.3f", $resultado); // 3 decimales y 1 entero mínimo
    echo "Usando la función SPRINTF se ve así: $resultadoFormateado<br>"; 
    echo '</div>';
    ?>
        </div>
    </div>
</body>
</html>
