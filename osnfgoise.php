<?php

$dbname='postgres';
$host='localhost';
$user='postgres'; 
$password='12345'; 
$port='5432';

try {
    $conn=new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form is submitted
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Prepare SQL statement to fetch user details
            $sql = "SELECT * FROM usuario WHERE username = :username AND password = :password";
            $ps = $conn->prepare($sql);
            $ps->bindParam(':username', $username);
            $ps->bindParam(':password', $password);
            $ps->execute();
            $user = $ps->fetch(PDO::FETCH_ASSOC);

            if($user) {
                // User exists, redirect to dashboard or any other page
                header("Location: dashboard.php");
                exit();
            } else {
                // Invalid username or password
                echo "Invalid username or password.";
            }
        }
    }

} catch (PDOException $th) {
    echo $th;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>