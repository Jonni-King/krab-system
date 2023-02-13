<?php
$servername = "localhost";
$username = "a0435840_krab_system";
$password = "alOF7e6Z";
$dbname = "a0435840_krab_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, phone,link FROM cities";
$result = $conn->query($sql);


$conn->close();
?>
