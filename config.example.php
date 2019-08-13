<?php
$servername = "localhost";
$database = "tb_note";
$username = "";
$password = "";
$dsn = 'mysql:host='.$localhost.';dbname='.$tb_note;
$connect_feedback=[];

try{ 
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect_feedback['confirm']= "Connected successfully"; 
}
catch(PDOException $exception){
    $connect_feedback['confirm']= "Connection failed: " . $exception->getMessage();
}
$feedback_json = json_encode($connect_feedback);
echo $feedback_json;
?>