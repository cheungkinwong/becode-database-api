<?php
header("Access-Control-Allow-Origin: *");
require 'config.php';
$feedback = [];
$feedback['connect']= $connect_feedback;
try {
    $sql  = 'SELECT *  FROM db_note.tb_note';
    $statement = $conn->query($sql);   
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    $feedback['notes']= $posts;
    $feedback['errors'] = "Notes listed successfully";
} catch(PDOException $exception){
    $feedback['errors'] = "Error listing note: " . $exception->getMessage();
}
// status
$json = json_encode($feedback);
echo $json;

$conn = null;
?>