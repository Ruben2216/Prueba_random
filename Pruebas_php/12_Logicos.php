<!-- 12_logicos.php
Programa de ejemplo de operadores logicos
Por: Lic. Sergio Hugo Sanchez O.
Para: Universidad Matamoros
17, Mayo, 2009 -->
<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de operadores Logicos</title>
</head>
<body>
    <h1>Ejemplo de operaciones logicas en PHP</h1>
    <?php
    $a = 8;
    $b = 3;
    $c = 3;
    $var1 = "comparacion 3: ";
    $var2 = "comparacion 2: ";
    $var3 = "comparacion 1: ";

    echo $var3, ($a == $b) && ($c > $b), "<br>";
    echo $var2, ($a == $b) || ($b == $c), "<br>";
    echo $var1, !($b <= $c), "<br>"; //-- Habia un error con el b
    ?>
</body>
</html>