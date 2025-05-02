<?php

// Cambiar nombres de variables a español
$servidor = "localhost";
$usuario = "root";
$contrasena = "1234";
$base_datos = "taller_desarrollo";
$confirmacion = "";

// Crear la tabla si no existe
$sql_crear_tabla = "CREATE TABLE IF NOT EXISTS Recordatorio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    descripcion TEXT
)";
            $conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Procesamiento del formulario al hacer submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {  //post definido en submit


    if (isset($_POST["guardar"]) ){ //verifica si el boton guardar fue presionado y si los campos no estan vacios

        $titulo = $_POST["titulo"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $descripcion = $_POST["descripcion"];
        
        $sql_insertar = "INSERT INTO Recordatorio (titulo, fecha, hora, descripcion) VALUES ('$titulo', '$fecha', '$hora', '$descripcion')"; //codigo mysql para insersion de datos de la base de datos a la tabla

        if ($conn->query($sql_insertar) === TRUE) {
            $confirmacion = "Recordatorio guardado correctamente!"; //mensaje de prueba de guardado y confirmacion
        }
    } elseif (isset($_POST["eliminar"])) {
        $id = $_POST["id"];
        $sql_eliminar = "DELETE FROM Recordatorio WHERE id=$id"; //codigo mysql para eliminar el recordatorio de la base de datos

        if ($conn->query($sql_eliminar) === TRUE) {
            $confirmacion = "Recordatorio eliminado correctamente!"; //mensaje de prueba de eliminacion y confirmacion
        }
    }
}

// Consulta para obtener los recordatorios de la base de datos
$sql_consultar = "SELECT * FROM Recordatorio"; 
$resultado = $conn->query($sql_consultar);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Recordatorios</title>
    <link rel="stylesheet" href="agenda.css">
</head>
<body>

<div class="contenedor">
    <div class="contenido">
        <h1>Recordatorios</h1>
        
        
        

        <form method="post">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" required><br><br>
            
            <label for="fecha">Fecha:</label><br>
            <input type="date" id="fecha" name="fecha" min="2025-01-01" max="2030-12-31" value="<?php echo date('Y-m-d'); ?>" required><br><br>
            
            <label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora" required><br><br>
            
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion"></textarea><br><br>
            
            <button type="submit" name="guardar">Guardar</button>
            <label for="confirmacion" class="confirmacion"> <?php echo $confirmacion; ?></label><br><br>
        </form>

        <table>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["id"] . "</td>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["fecha"] . "</td>";
                    echo "<td>" . $fila["hora"] . "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td>
                            <form method='post'>
                                <input type='hidden' name='id' value='" . $fila["id"] . "'>
                                <button type='submit' name='eliminar'>Eliminar</button>
                            </form>
                            </td>";
                    echo "</tr>";
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
</div>

</body>
</html>
