<?php
require 'config.php';
$errors = [ ];
try {
    $sql  = 'SELECT *  FROM db_note.tb_note';
    $statement = $conn->query($sql);   
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    $posts_json = json_encode($posts);
    echo $posts_json;
    $errors['confirm'] = "Notes listed successfully";
} catch(PDOException $exception){
    $errors['confirm'] = "Error listing note: " . $exception->getMessage();
}
// status
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>