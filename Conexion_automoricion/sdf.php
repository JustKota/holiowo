<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos (cambiar estos valores según tu configuración)
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$database = "nombre_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si la lista no existe en la sesión, inicializarla como un arreglo vacío
if (!isset($_SESSION['lista'])) {
    $_SESSION['lista'] = array();
}

// Si se envió el formulario y se proporcionó un nuevo elemento
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nuevo-elemento"])) {
    // Obtener el nuevo elemento desde el formulario
    $nuevo_elemento = $_POST["nuevo-elemento"];
    
    // Insertar el nuevo elemento en la base de datos
    $sql = "INSERT INTO nombre_tabla (nombre_columna) VALUES ('$nuevo_elemento')";
    
    if ($conn->query($sql) === TRUE) {
        // Si la inserción fue exitosa, agregar el nuevo elemento a la lista en la sesión
        $_SESSION['lista'][] = $nuevo_elemento;
    } else {
        echo "Error al insertar en la base de datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Dinámica</title>
</head>
<body>
    <h1>Lista Dinámica</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nuevo-elemento">Nuevo Elemento:</label>
        <input type="text" id="nuevo-elemento" name="nuevo-elemento" required>
        <button type="submit">Agregar</button>
    </form>

    <h2>Lista Actualizada</h2>

    <ul>
        <?php foreach ($_SESSION['lista'] as $elemento): ?>
            <li><?php echo $elemento; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
