<?php
$servername = "localhost";
$username = "root"; // Change this as per your MySQL username
$password = "Kapil@8009"; // Change this as per your MySQL password
$dbname = "hospital_uniform_management";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
