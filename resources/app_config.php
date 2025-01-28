<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "openbook";  // Name of the database

try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (mysqli_sql_exception $e) {
    die("Could not connect! Error: " . $e->getMessage());
} catch (Exception $e) {
    die($e->getMessage());
}

try {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect! Error: " . $e->getMessage());
}

try {
    $stmt = $pdo->prepare("SELECT * FROM buildings");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Process the results as needed
} catch (PDOException $e) {
    die("Query failed! Error: " . $e->getMessage());
}
