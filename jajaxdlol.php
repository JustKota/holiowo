<?php

$dbname = 'postgres';
$host = 'localhost';
$user = 'postgres'; 
$password = '12345'; 
$port = '5432';

// Variables para almacenar mensajes de error o éxito
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los valores del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            // Conectar a la base de datos
            $conn = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Preparar la consulta SQL para verificar las credenciales
            $sql = "SELECT * FROM usuario WHERE username = :username AND password = :password";
            $ps = $conn->prepare($sql);
            $ps->bindParam(':username', $username);
            $ps->bindParam(':password', $password);
            $ps->execute();
            
            // Obtener el resultado de la consulta
            $user = $ps->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // El usuario y la contraseña son válidos
                $success = "Inicio de sesión exitoso. Bienvenido, " . $user['username'] . "!";
            } else {
                // El usuario y/o la contraseña son incorrectos
                $error = "Nombre de usuario y/o contraseña incorrectos.";
            }
        } catch (PDOException $th) {
            // Error al conectar a la base de datos
            $error = "Error de conexión: " . $th->getMessage();
        }
    } else {
        // Los datos del formulario no están completos
        $error = "Por favor, complete todos los campos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar sesión</button>
    </form>
    <div>
        <?php
        // Mostrar mensajes de error o éxito
        if ($error != "") {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        if ($success != "") {
            echo '<p style="color: green;">' . $success . '</p>';
        }
        ?>
    </div>
</body>
</html>