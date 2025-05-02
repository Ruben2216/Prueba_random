<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <link rel="stylesheet" href="../Login_2.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasena = htmlspecialchars($_POST['contrasena']);
        $comentario = htmlspecialchars($_POST['comentario']);
        echo "<p>Usuario: $usuario</p>";
        echo "<p>Contraseña: $contrasena</p>";
        echo "<p>Comentario: $comentario</p>";
    }
    ?>
    <form action="" method="post" class="iniciarsesion">
        <div class="content">
            <h2>Iniciar sesión</h2>
            <div>
                <input type="text" name="usuario" placeholder="Usuario...." required/>
            </div>
            <div>
                <input type="password" name="contrasena" placeholder="Contraseña..." required/>
            </div>
            <div>
                <textarea name="comentario" placeholder="Agrega un comentario"></textarea>
            </div>
            <div class="button">
                <button type="submit">Iniciar sesión</button>
            </div>
        </div>
    </form>
</body>
</html>