<?php
require 'config.php';

// sanitize
$title = test_input($_GET['title']);
$author = test_input($_GET['author']);
$note = test_input($_GET['note']);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// validate
$errors = [ ];
if (empty($title)) {
    $errors['title'] = "title is required. <br />";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $title)){
    $errors['title'] = "This title is invalid. <br />";
}
if (empty($author)) {
    $errors['author'] = "Author is required. <br />";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $author)){
    $errors['author'] = "This author name is invalid. <br />";
}
if (empty($note)) {
    $errors['note'] = "Note is required. <br />";
}

// execute
if (count($errors)> 0){
    $errors['confirm'] = "There are still errors";
} else {
    $sql  = "INSERT INTO db_note.tb_note (title, author, note)
        VALUES ('$title', '$author', '$note');";
    if ($conn->query($sql)) {
        $errors['confirm'] = "Note created successfully <br>";
    } else {
        $errors['confirm'] = "Error creating note: " .$conn->error."<br>";
    }
}

$error_json = json_encode($errors);
// status
echo $error_json;

$conn->close();
?>