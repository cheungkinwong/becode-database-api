<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type,X-Requested-With,origin, Authorization");
require 'config.php';

// sanitize
$title = test_input($_POST['title']);
$author = test_input($_POST['author']);
$note = test_input($_POST['note']);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// validate
$errors = [ ];
if (empty($title)) {
    $errors['title'] = "title is required.";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $title)){
    $errors['title'] = "This title is invalid.";
}
if (empty($author)) {
    $errors['author'] = "Author is required.";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $author)){
    $errors['author'] = "This author name is invalid. ";
}
if (empty($note)) {
    $errors['note'] = "Note is required.";
}

// execute
if (count($errors)> 0){
    $errors['confirm'] = "There are still errors";
} else {
    try {
        $sql  = "INSERT INTO db_note.tb_note (title, author, note)
                VALUES ( :title , :author , :note)";
    
        $statement = $conn->prepare($sql);     
        $statement->execute([':title'=>$title , ':author'=>$author , ':note'=>$note]);  
        $errors['confirm'] = "Note created successfully";
    } catch(PDOException $exception){
        $errors['confirm'] = "Error creating note: " . $exception->getMessage();
    }
}

// status
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>