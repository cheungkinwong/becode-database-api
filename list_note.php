<?php
require 'config.php';

$sql  = 'SELECT *  FROM db_note.tb_note';
$statement = $conn->query($sql);   

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