<?php
    var_dump($_POST);
    if (isset($_POST["num1"]) && is_numeric($_POST["num1"]))
        $numero1 = $_POST["num1"];
    else
        $numero1 = 0;
    if (isset($_POST["num2"]) && is_numeric($_POST["num2"]))
        $numero2 = $_POST["num2"];
    else
        $numero2 = 0;
    $operMat = $_POST["operacion"];
    switch ($operMat) {
            case "suma":
                $result = $numero1 + $numero2;
                break;
            case "rest":
                $result = $numero1 - $numero2;
                break;
            case "mult":
              $result = $numero1 * $numero2;
                break;
            case "divi":
                $result = $numero1 / $numero2;
                break;
            default:
                echo "Elige una operación a realizar";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>



        
    </style>
</head>
<body>
    <h2>Calculadora RVM</h2>

    <form action="" method="POST">
        <label for="num1">Número 1:</label><br>
        <input type="text" id="num1" name="num1" value="<?= $numero1 ?>"><br><br>
        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion">
            <option value="suma">+</option>
            <option value="rest">-</option>
            <option value="mult">*</option>
            <option value="divi">/</option>
        </select>
        <br><br>
        <label for="num2">Número 2:</label><br>
        <input type="text" id="num2" name="num2" value="<?= $numero2 ?>"><br><br>
        <input type="submit" value="Calcular" title="Calcular con los datos ingresados">  <!-- se ejecuta los datos obtenidos en los input -->
        <input type="reset" value="Limpiar" title="limpiar"> <!-- limpia los datos de los input -->
        <br><br>
        <label for="resu">Resultado:</label><br>
        <input type="text" id="resu" name="resu" value="<?= $result ?>" ><br><br>
    </form>     
</body>
</html>