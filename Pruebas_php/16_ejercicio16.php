<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $tabla=array(
        "Frutas"=>array("Manzana","Naranja","Fresa"),
        "Deportes"=>array("Futbol","Bolley","Tenis"),
        "Idiomas"=>array("Español","Ingles","Frances"),
        );
        var_dump($tabla);
        echo "<p aling=center>".date(format:"d/m/Y")."</p>";
    
    
    ?>
    <table border="2" width="75%">
        <tr>
            <th>Frutas</th>
            <th>Deportes</th>
            <th>Idiomas</th>
        </tr>
        <tr>
            <td><?= $tabla["Frutas"][0] ?></td>
            <td><?= $tabla["Deportes"][0] ?></td>
            <td><?= $tabla["Idiomas"][0] ?></td>
        </tr>
        <tr>
            <td><?= $tabla["Frutas"][1] ?></td>
            <td><?=  $tabla["Deportes"][1] ?></td>
            <td><?= $tabla["Idiomas"][1] ?></td> 
        </tr>
        <tr>
            <td><?= $tabla["Frutas"][2] ?></td>
            <td><?= $tabla["Deportes"][2] ?></td>
            <td><?= $tabla["Idiomas"][2] ?></td>
        </tr>

    
</body>
</html>