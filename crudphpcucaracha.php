<?php

// Connect to CockroachDB
$dsn = "pgsql:host=localhost;port=26257;dbname=mydatabase;sslmode=disable";
$username = "";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// CRUD Operations
// Create
$stmt = $pdo->prepare("INSERT INTO my_table (column1, column2) VALUES (?, ?)");
$stmt->execute([$value1, $value2]);

// Read
$stmt = $pdo->query("SELECT * FROM my_table");
while ($row = $stmt->fetch()) {
    echo $row['column1'] . "\t" . $row['column2'] . "\n";
}

// Update
$stmt = $pdo->prepare("UPDATE my_table SET column1 = ? WHERE id = ?");
$stmt->execute([$newValue, $id]);

// Delete
$stmt = $pdo->prepare("DELETE FROM my_table WHERE id = ?");
$stmt->execute([$id]);

?>
