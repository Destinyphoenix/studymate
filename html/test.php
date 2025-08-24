<?php
$name = $_POST["name"];
echo "Hello, World!";
echo $name;
/*
$servername = getenv("MYSQL_HOST") . ":" . getenv("MYSQL_PORT");
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");
*/
$servername = "db:3306";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
