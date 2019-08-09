<?php
$servername = "localhost";
$username = "";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
} 
echo "Connected successfully <br>";
?>