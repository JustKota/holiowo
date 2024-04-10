<?php
// Iniciar la sesión
session_start();

// Si la lista no existe en la sesión, inicializarla como un arreglo vacío
if (!isset($_SESSION['lista'])) {
    $_SESSION['lista'] = array();
}

// Si se envió el formulario y se proporcionó un nuevo elemento
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nuevo-elemento"])) {
    // Agregar el nuevo elemento a la lista en la sesión
    $nuevo_elemento = $_POST["nuevo-elemento"];
    $_SESSION['lista'][] = $nuevo_elemento;
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Dinámica y Generador de PDF</title>
</head>
<body>
    <h1>Lista Dinámica</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nuevo-elemento">Nuevo Elemento:</label>
        <input type="text" id="nuevo-elemento" name="nuevo-elemento" required>
        <button type="submit">Agregar a la Lista</button>
    </form>

    <h2>Lista Actualizada</h2>

    <ul>
        <?php foreach ($_SESSION['lista'] as $elemento): ?>
            <li><?php echo $elemento; ?></li>
        <?php endforeach; ?>
    </ul>


</body>
</html>
