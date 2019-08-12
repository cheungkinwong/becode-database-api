<?php
require 'config.php';
$database = 'db_note.tb_note';

$sql  = 'SELECT *  FROM db_note.tb_note';
$statement = $conn->prepare($sql);   
$statement->execute([$database]);

$posts = $statement->fetchAll(PDO::FETCH_OBJ);
$posts_json = json_encode($posts);
echo $posts_json;

if ($statement) {
    $errors['confirm'] = "Notes listed successfully";
} else {
    $errors['confirm'] = "Error listing notes: " .$conn->error;
}
// status
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>