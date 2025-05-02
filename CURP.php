
<?php
//JOSE RUBEN CLEMENTE CORZO

// Verificar si se ha enviado el formulario
if (isset($_POST["submit"])) {
    // Convertir los datos a mayúsculas con strtoupper
    $nombre = strtoupper($_POST["nombre"]);
    $apellidoPaterno = strtoupper($_POST["apellido_Paterno"]);

    $apellidoMaterno = strtoupper($_POST["apellido_Materno"]);

    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $sexo = strtoupper($_POST["sexo"]);

    $lugarNacimiento = strtoupper($_POST["lugar_nacimiento"]);

    // Obtener inicial y primera vocal interna del primer apellido
    $primer = $apellidoPaterno[0];
    $vocalInterna = "";
    for ($i = 1; $i < strlen($apellidoPaterno); $i++) {
        if (in_array($apellidoPaterno[$i], ["A", "E", "I", "O", "U"])) {
            $vocalInterna = $apellidoPaterno[$i];
            break;
        }
    }

    // Inicial del segundo apellido y del primer nombre
    $inicialMaterno = $apellidoMaterno[0];
    if (strpos($nombre, "JOSE") === 0) {
        $nombre = substr($nombre, 5); // Eliminar "JOSE " y el espacio siguiente por eso 5 
        $inicialNombre = $nombre[0];
    } elseif (strpos($nombre, "MARIA") === 0) {
        $nombre = substr($nombre, 6); // Eliminar "MARIA" y el espacio siguiente por eso 6
        $inicialNombre = $nombre[0];
    } else {
        $inicialNombre = $nombre[0];
    }

    // Fecha de nacimiento con formato  
    list($dia, $mes, $anio) = explode("/", $fechaNacimiento);
    $anio = substr($anio, -2); // de 2005 a 05
    $mes = str_pad($mes, 2, "0", STR_PAD_LEFT); // de 5 a 05
    $dia = str_pad($dia, 2, "0", STR_PAD_LEFT); // de 2 a 02

    // Código de la entidad de nacimiento
    if ($lugarNacimiento === "CHIAPAS") {
        $entidad = "CS";
    } 

    // Consonantes internas vacias
    $consonantePaterno = "";
    $consonanteMaterno = "";
    $consonanteNombre = "";
    
    for ($i = 1; $i < strlen($apellidoPaterno); $i++) {
        if (!in_array($apellidoPaterno[$i], ["A", "E", "I", "O", "U"])) {
            $consonantePaterno = $apellidoPaterno[$i];  
            break;
        }
    }
    for ($i = 1; $i < strlen($apellidoMaterno); $i++) {
        if (!in_array($apellidoMaterno[$i], ["A", "E", "I", "O", "U"])) {
            $consonanteMaterno = $apellidoMaterno[$i];
            break;
        }
    }
    for ($i = 1; $i < strlen($nombre); $i++) {
        if (in_array($nombre[$i], ["B", "C", "D", "F", "G", "H", "J", "K", "L", "M", "N", "Ñ", "P", "Q", "R", "S", "T", "V", "W", "X", "Y", "Z"]) && ctype_alpha($nombre[$i])) {
            $consonanteNombre = $nombre[$i];
            break;
        }
    }

    // Dígito diferenciador y verificador
    $diferenciador = "A";
    $verificador = "9";

    // Formato de la CURP a imprimir
    $curp = $primer . $vocalInterna . $inicialMaterno . $inicialNombre . $anio . $mes . $dia . $sexo . $entidad . $consonantePaterno . $consonanteMaterno . $consonanteNombre . $diferenciador . $verificador;
} else {
    // Si no se ha enviado el formulario devuelvo algo vacío
    $curp = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>GenerarCURP</title>
</head>
<body>
    <div class="contenedor">
        <div class="contenedor2">
            <h1>Generar CURP</h1>
            <h2>Ingrese sus datos</h2>
            <form method="POST" action="">
                <label for="nombre"><b>Nombre</b> completo:</label><br>
                <input id="nombre" type="text" name="nombre" placeholder="Nombre"><br><br>

                <label for="apellido_Paterno"> <b>Apellido Paterno</b>:</label><br>
                <input id="apellido_Paterno"type="text"  name="apellido_Paterno" placeholder="Apellido Paterno"><br><br>
                

                <label for="apellido_Materno"><b>Apellido Materno</b>:</label><br>
                <input id="apellido_Materno"type="text"  name="apellido_Materno" placeholder="Apellido Materno"><br><br>

                <label for="fecha_nacimiento"><b>Fecha de Nacimiento d/m/a</b> :</label><br>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Dia/Mes/Año"><br><br>

                <label for="sexo"><b>Sexo</b>:</label><br>
                <select id=sexo name="sexo">
                    <option value="H">Masculino</option>
                    <option value="M">Femenino</option>
                </select><br><br>

                <label for="lugar_nacimiento"><b>Lugar </b>de Nacimiento:</label><br>
                <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de nacimiento" ><br><br>

                <button type="submit" name="submit">Generar CURP</button><br><br>

                <label for="resu">Esta es tu CURP:</label><br>
                <input class="impresion" type="text" id="resu" name="curp_final" value="<?= htmlspecialchars($curp) ?>"><br><br>
            </form>
        </div>
    </div>
</body>
</html>
