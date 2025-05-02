<?php
    require_once "econect.php";
    if (isset($_GET["usua"]) && !empty($_GET["usua"]) && is_numeric($_GET["usua"])) {
        $usua = $_GET["usua"];
        $usuarios = mysqli_query($db,"SELECT * FROM usuarios WHERE usuario_id=($usua)");
        $usuario = mysqli_fetch_array($usuarios);

    }
?>
<?php 
// validación
    function showError($errors, $field){
        if(isset($errors[$field]) && !empty( $errors[$field] )){
            $alert= "<div> " . $errors[$field]. " </div>";
        } else {
            $alert= "";
        }
        return $alert;
    }

    function setValueField($errors, $field, $textarea = false ){
        if(isset($errors) && count($errors)>=1 && isset($_POST[$field])){
            if ($textarea != false) {
                echo $_POST[$field];
            } else {
                echo "value = '$_POST[$field]'";
            }
        }
    }

    //echo var_dump($_POST);
    if (isset($_POST["submit"])) {
        $errors[] = "";
        
        if ( !empty( $_POST["name"] ) 
          && strlen( $_POST["name"] )<=20 
          && !is_numeric( $_POST["name"] ) 
          && !preg_match("/[0-9]/", $_POST["name"] )
         ) {
            $name_validate = true;
        }
        else {
            $name_validate = false;
            $errors["name"]="El nombre no es valido ";
        }
        if ( !empty( $_POST["surname"] 
          && !is_numeric($_POST["surname"])) 
          && !preg_match("/[0-9]/", $_POST["name"] )) {
            $surname_validate = true;
        }
        else {
            $surname_validate = false;
            $errors["surname"]= "En apellido no es valido";
        }
        if ( !empty( $_POST["bio"] ) ) {
            $bio_validate = true;
        }
        else {
            $bio_validate = false;
            $errors["bio"]= " La biografia no puede estar vacia ";
        }
        if ( !empty( $_POST["email"] ) 
          && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_validate = true;
        }
        else {
            $email_validate = false;
            $errors["email"]= "Introduce un correo valido";
        }
        if ( !empty( $_POST["password"] )
          && strlen($_POST["password"]) >=6 ) {
            $pass_validate= true;
        }
        else {
            $pass_validate = false;
            $errors["password"]= " Introduce una contraseña de mas de 6 caracteres ";
        }    
        if ( isset( $_POST["role"] ) && is_numeric($_POST["role"]) ) {
            $role_validate = true;
        }
        else {
            $role_validate = false;
            $errors["role"]= " Debes elegir un rol";
        }
        var_dump($_FILES[""]);
        $image = null;
        if ( isset($_FILES["image"]) && !empty( $_FILES["image"]["name"] )) {
          if (!is_dir("uploads")){
            $dir = mkdir("uploads",0777, true);
          } else {
            $dir = true;
          }

          if($dir){
            $filename = time()."-".$_FILES["image"]["name"];
            $muf = move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/");

            $imagen = $filename; 
            if($muf){
              $image_upload = true;
            } else{
              $image_upload = false;
              echo "La imagen no se ha subido";
            }
          }
          echo " La imagen nos ha llegadeo";
        } //!empty( $_POST[""] ) ) {

    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo usuario</title>
</head>
<body>
    <h2> Crear usuario </h2>
    <?php if(isset($_PORT["submit"]) && isset($errors) && count($errors)==0 ) { ?>
        <div>El usuario se ha enviado correctament</div>
    <?php }  ?>
    <hr>
   <form action="ecrear.php" method="POST" enctype="multipart/form-data">
    <table border = "0">
        <tr>
            <td>
                Nombre:
            </td>
            <td>
                <input type="text" name="name" <?php setValueField($errors,"name"); ?> /><br/>
                <?php echo showError($errors,"name"); ?>
            </td>
        </tr>
        <tr>
            <td>Apellidos: </td>
            <td><input type="text" name="surname" <?php setValueField($errors,"surname"); ?> /><br/>
            <?php echo showError($errors,"surname"); ?>
        </td>
        </tr>
        <tr>
          <td>Biografía: </td>
          <td><textarea name="bio"><?php setValueField($errors,"bio",true); ?></textarea><br/>
          <?php echo showError($errors,"bio"); ?>
          </td>
        </tr>
        <tr>
            <td>Correo: </td>
            <td>
                <input type="text" name="email" <?php setValueField($errors,"email"); ?>/><br/>
                <?php echo showError($errors,"email"); ?>
            </td>
        </tr>
        <tr>
            <td>Imagen: </td><td><input type="file" name="imagen" /><br/></td>
        </tr>
        <tr>
            <td>Contraseña: </td>
            <td><input type="password" name="password" <?php setValueField($errors,"password"); ?>/><br/>
            <?php echo showError($errors,"password"); ?>    </td>
        </tr>
        <tr>
            <td>Rol: </td>
            <td><select name="role">
                <option value="0">Normal </option>
                <option value="1">Administrador </option>
                </select><br/>
                <?php echo showError($errors,"role"); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td>
            <td><input type="button" name="boton1"value="Opcion1">
                <input type="submit" name="submit" value="Enviar"></td>
        </tr>
    </table>
   </form> 
</body>
</html>