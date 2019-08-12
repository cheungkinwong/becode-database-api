<?php
$servername = "localhost";
$database = "tb_note";
$username = "";
$password = "";
$dsn = 'mysql:host='.$localhost.';dbname='.$tb_note;

// Create connection
// $conn = new mysqli($servername, $username, $password);
$conn = new PDO($dsn, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>