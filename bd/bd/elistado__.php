
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>    
<body>    
    <h1> Listado de usuarios </h1>
    <h3> <div align="right"><a href="ealta.php">Alta de usuarios </a></div></h3>
    <hr>
<table border = 0 >
    <tr>
        <th width="35%">Nombre</th>
        <th width="30%">Apellidos</th>
        <th width="20%">email</th>
        <th width="7%">Ver / Editar</th>
        <th width="8%">Borrar </th>
    </tr>
<?php
require_once "econect.php";
$sql = "SELECT * FROM usuarios ";
$usuarios = mysqli_query($db,$sql);
$color = "#f0f2f2";
while ($usua = mysqli_fetch_assoc($usuarios)){
    var_dump($usua);
?>
    <tr bgcolor="<?=$color?>">
        <td><?=$usua["nombre"];?></td>
        <td><?=$usua["apellidos"];?></td>
        <td><?=$usua["email"];?></td>
        <td><center><a href="ever.php?usua=<?=$usua["usuario_id"];?>">Editar/Ver</a></center></td>
        <td><center><a href="eborrar.php?usua=<?=$usua["usuario_id"];?>">Borrar</a></center></td>
    </tr>
<?php 
    if ($color == "#f0f2f2"){
        $color = "#f32f20";
    } else {
        $color="#f0f2f2";
    }
}
?>
</table>
</body>
</html>