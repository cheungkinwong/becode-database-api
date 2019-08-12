<?php
require 'config.php';

// sanitize
$title = test_input($_GET['title']);
$author = test_input($_GET['author']);
$note = test_input($_POST['note']);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // $data = mysql_real_escape_string($data);
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
    $sql  = "INSERT INTO db_note.tb_note (title, author, note)
            VALUES ( :title , :author , :note)";

    $statement = $conn->prepare($sql);     
    $statement->execute([':title'=>$title , ':author'=>$author , ':note'=>$note])  ;

    if ($statement) {
        $errors['confirm'] = "Note created successfully";
    } else {
        $errors['confirm'] = "Error creating note: " .$conn->error;
    }
}

// status
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>