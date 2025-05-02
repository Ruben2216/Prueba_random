    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agenda de Eventos</title>
        <style>
            /* Estilos generales */
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 80%;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
            }

            .container:hover {
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
                transform: translateY(-5px);
            }

            h1 {
                text-align: center;
                color: #333;
                font-size: 2rem;
                margin-bottom: 20px;
            }

            /* Estilos del formulario */
            form {
                margin-bottom: 20px;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f9f9f9;
                transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            }

            form:hover {
                background-color: #f1f1f1;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            form input[type="text"],
            form input[type="date"],
            form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
                transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            }

            form input[type="text"]:focus,
            form input[type="date"]:focus,
            form textarea:focus {
                border-color: #5cb85c;
                box-shadow: 0 0 5px rgba(92, 184, 92, 0.5);
                outline: none;
            }

            form textarea {
                resize: vertical;
            }

            /* Centrar el botón */
            .form-actions {
                text-align: center;
            }

            form input[type="submit"] {
                background-color: #5cb85c;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
                transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            }

            form input[type="submit"]:hover {
                background-color: #449d44;
                transform: scale(1.05);
            }

            form input[type="submit"]:active {
                background-color: #398439;
                transform: scale(0.95);
            }

            /* Estilos de la tabla */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                font-size: 1rem;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: left;
                transition: background-color 0.3s ease-in-out;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
                text-transform: uppercase;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #e9e9e9;
            }

            /* Centrar el botón Delete */
            td form {
                display: flex;
                justify-content: center;
            }

            input[name="delete"] {
                background-color: #d9534f;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                font-weight: bold;
                transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            }

            input[name="delete"]:hover {
                background-color: #c9302c;
                transform: scale(1.05);
            }

            input[name="delete"]:active {
                background-color: #ac2925;
                transform: scale(0.95);
            }

            /* Mensajes de éxito y error */
            p {
                font-size: 1rem;
                padding: 10px;
                border-radius: 4px;
                margin-bottom: 20px;
            }

            p[style*="color: green;"] {
                background-color: #dff0d8;
                border: 1px solid #d6e9c6;
            }

            p[style*="color: red;"] {
                background-color: #f2dede;
                border: 1px solid #ebccd1;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <!-- Título principal -->
        <h1>Agenda de Eventos</h1>

        <!-- Formulario para agregar eventos -->
        <form method="post">
            <label for="nom_event">Nombre del Evento:</label>
            <input type="text" id="nom_event" name="nom_event" placeholder="Ingrese el nombre del evento" required><br>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50" maxlength="200" placeholder="Ingrese una descripción del evento" required></textarea><br>

            <!-- Botón centrado -->
            <div class="form-actions">
                <input type="submit" value="Guardar Evento">
            </div>
        </form>

        <!-- PHP para manejar la lógica del servidor -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "taller_desarrollo";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nom_event"])) {
            // Bloque para guardar un nuevo evento
            $nom_event = $_POST["nom_event"];
            $fecha = $_POST["fecha"];
            $descripcion = $_POST["descripcion"];

            $sql = "INSERT INTO agenda (nom_event, fecha, descripcion) VALUES ('$nom_event', '$fecha', '$descripcion')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>New record created successfully</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $sql = "SELECT id_evento, nom_event, fecha, descripcion FROM agenda";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Event Name</th><th>Date</th><th>Description</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id_evento"] . "</td><td>" . $row["nom_event"] . "</td><td>" . $row["fecha"] . "</td><td>" . $row["descripcion"] . "</td><td><form method='post' style='display: flex; justify-content: center;'><input type='hidden' name='id_evento' value='" . $row["id_evento"] . "'><input type='submit' name='delete' value='Delete'></form></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>0 results</p>";
        }

        if (isset($_POST['delete'])) {
            // Bloque para eliminar un evento
            $id_evento = $_POST['id_evento'];

            // Eliminar el evento
            $sql = "DELETE FROM agenda WHERE id_evento=$id_evento";
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Record deleted successfully</p>";

                // Reordenar los IDs para que sean consecutivos
                $sql_reorder = "SET @count = 0; 
                                UPDATE agenda SET id_evento = (@count := @count + 1) ORDER BY id_evento ASC;";
                if ($conn->multi_query($sql_reorder)) {
                    do {
                        // Vaciar resultados intermedios
                        if ($result = $conn->store_result()) {
                            $result->free();
                        }
                    } while ($conn->next_result());
                }

                // Reiniciar el contador AUTO_INCREMENT
                $sql_reset = "ALTER TABLE agenda AUTO_INCREMENT = 1";
                $conn->query($sql_reset);
            } else {
                echo "<p style='color: red;'>Error deleting record: " . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>
    </div>

    </body>
    </html>
