<?php
    require_once "econect.php";

    if (isset($_GET["usua"]) && !empty($_GET["usua"]) && is_numeric($_GET["usua"])) {
        $usua = $_GET["usua"];
        $usuarios = mysqli_query($db,"SELECT * FROM usuarios WHERE usuario_id ={$usua}");
        $usuario = mysqli_fetch_assoc($usuarios);
        if ($usuario) {
            $idus = $usua;
            $nomb = $usuario["nombre"];
            $apel = $usuario["apellidos"];
            $biog = $usuario["biografia"];
            $emai = $usuario["email"];
            $pass = $usuario["password"];
            $role = $usuario["role"];
            $imag = $usuario["imagen"];
        } else {
            header("Location: elistado.php");
        }
    }

    if (isset($_POST) && !empty($_POST["submit"])){
        $sql = " UPDATE usuarios
            SET nombre = '". $_POST["nombre"] .
            "',apellidos ='". $_POST["apellidos"] . 
            "',biografia ='". $_POST["biografia"] .
               "', email ='". $_POST["email"] .
             "',password ='". $_POST["password"]. 
               "',  role ='". $_POST["role"] .
             "', imagen ='". $_POST["imagen"] .
              "'    WHERE usuario_id = " . $_POST["id"];
        
        $actualiza_usuarios = mysqli_query($db,$sql); 

        if ($actualiza_usuarios){
            echo "a La tabla se le insertaron registros";
            header ("Location:elistado.php");
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="eactualizar.css">
</head>
<body>
    <h1>Actualizar datos de un registro</h1>
    <hr>
    <div class="padre">
    <div class="contenedor">
    <form action=eactualizar.php method="post" >
        <input type="hidden" name="id" value="<?=$idus?>">
        <table   align="center">
            
            <tr>
                <td width="25%" "0">Nombre:</td>
                <td width="75%"><input type="text" name="nombre" value="<?=$nomb;?>"></td>
            </tr>
            <tr>
                <td  >Apellidos:</td>
                <td><input type="text" name="apellidos" value="<?=$apel;?>"></td>
            </tr>
            <tr>
                <td  >Biografía:</td>
                <td><textarea name="biografia"><?=$biog;?></textarea></td>
            </tr>
            <tr>
                <td  "0">email:</td>
                <td><input type="text" name="email" value="<?=$emai;?>"></td>
            </tr>
            <tr>
                <td  "0">password:</td>
                <td><input type="text" name="password" value="<?=$pass;?>"></td>
            </tr>
            <tr>
                <td "0">Role:</td>
                <td>
                    <select name="role">
                        <option value="0" <?php if($role==0){ echo "selected"; } ?> >Normal </option>
                        <option value="1" <?php if($role==1){ echo "selected"; } ?> >Administrador </option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td>Imagen:</td>
                <td><input type="file" name="imagen" value="<?=$imag;?>"></td>
            </tr>
            <tr class="centrar1">
                <td>&nbsp;</td>
                <td class="centrar"><input type="submit" class="button" name="submit" value="Enviar"></td>
            </tr>
        </table>
    </form>
    </div>
    </div>
</body>
</html>