<?php
require 'config.php';
$errors = [ ];
try {
    $sql  = "CREATE DATABASE IF NOT EXISTS db_note;";  
    $sql .= "CREATE TABLE IF NOT EXISTS db_note.tb_note ( 
            last_updated TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            title VARCHAR(32) NOT NULL ,
            author VARCHAR(32) NOT NULL ,
            note TEXT NULL DEFAULT NULL , 
            PRIMARY KEY (last_updated , title, author)
    )";
    $statement = $conn->multi_query($sql); 
    $errors['confirm'] = "Database created successfully";
} catch(PDOException $exception){
    $errors['confirm'] = "Error creating database: " . $exception->getMessage();
}
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>