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
    $conn = new PDO(
        "mysql:host=$servername;dbname=studymate",
        $username,
        $password,
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// Insert into studymate table
$email = $_POST["email"];
//$user_password = $_POST["password"];
$user_password = "test";
$stmt = $conn->prepare(
    "INSERT INTO USER (name, email, password) VALUES (:name, :email, :password)",
);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $user_password);
$stmt->execute();
echo "New record created successfully";
?>
