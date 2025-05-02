<?php
    require_once "econect.php";
    
    if (isset($_POST) && (!empty($_POST["submit"]))) {
        var_dump($_POST);
        $sql = " INSERT INTO usuarios 
            VALUES (NULL, '" . $_POST["name"] . "','" . $_POST["surname"] . "','" . 
            $_POST["bio"] . "','" . $_POST["email"] . "','" . $_POST["imagen"] . 
            "','" . $_POST["password"] . "','" . $_POST["role"] . "');";
        
        echo $sql;
        $insert_usuarios = mysqli_query($db, $sql);
        if ($insert_usuarios){
           echo "Datos insertados a la bd correctamente";
           header("Location: elistado.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
<h1> Alta de usuarios </h1>
    <h3> <div align="right">&nbsp;</div></h3>
    <hr>
   <form action="ealta.php" method="POST">
    <table border = "0">
        <tr>
            <td>
                Nombre:
            </td>
            <td>
                <input type="text" name="name" value="" /><br/>
            </td>
        </tr>
        <tr>
            <td>Apellidos: </td>
            <td><input type="text" name="surname" value="" /><br/></td>
        </tr>
        <tr>
          <td>Biografía: </td>
          <td><textarea name="bio"></textarea><br/></td>
        </tr>
        <tr>
            <td>Correo: </td>
            <td><input type="email" name="email" value=""/><br/></td>
        </tr>
        <tr>
            <td>Imagen: </td><td><input type="file" name="imagen" /><br/></td>
        </tr>
        <tr>
            <td>Contraseña: </td>
            <td><input type="password" name="password" /><br/></td>
        </tr>
        <tr>
            <td>Rol: </td>
            <td><select name="role">
                <option value="0">Normal </option>
                <option value="1">Administrador </option>
                </select><br/>
            </td>
        </tr>
        <tr><td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" value="Enviar"></td>
        </tr>
    </table>
   </form> 
</body>
</html>