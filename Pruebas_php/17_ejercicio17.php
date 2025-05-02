<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-color:rgb(70, 65, 65);
        font-family: Arial, sans-serif;
    }
    h1 {
        color: rgb(255, 255, 255);
        text-align: center;
    }
    div {
        padding-top:1040px;
        border: 3px solid gray;
        width: 50%;
        margin: auto;
        padding: 10px;
        box-shadow: 0 0 15px rgba(242, 233, 233, 0.65);
        color:white;
        font-size: 20px;
        
    }
    .num{
        padding-top: 100px;
    }
    </style>
</head>
<body>
    <div class="num">
    <?php
    
    function tabla($numero): string{
        $tablaN="";
        for ($i=1; $i <= 10; $i++) { 
            $producto =$i * $numero;

            $tablaN .= "{$producto}  <br>";
        }
        return $tablaN;
    }
    echo "<h1>Tabla de multiplicar</h1>";
    echo tabla(numero:7);
    

    ?>
    </div>
</body>
</html>