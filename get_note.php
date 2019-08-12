<?php
require 'config.php';

// sanitize
$title = test_input($_GET['title']);
$author = test_input($_GET['author']);
$last_updated = test_input($_GET['last_updated']);

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
if (empty($last_updated)) {
    $errors['last_updated'] = "last_updated is required.";
}


// execute
if (count($errors)> 0){
    $errors['confirm'] = "There are still errors";
} else {
    $sql  = "SELECT note FROM db_note.tb_note WHERE title = :title && author = :author && last_updated = :last_updated";

    $statement = $conn->prepare($sql);     
    $statement->execute([':title'=>$title , ':author'=>$author , ':last_updated'=>$last_updated]);
    $posts = $statement->fetch(PDO::FETCH_OBJ);
    $posts_json = json_encode($posts);
    echo $posts_json;

    if ($posts_json) {
        $errors['confirm'] = "Notes listed successfully";
    } else {
        $errors['confirm'] = "Error listing notes: " .$conn->error;
    }
}

// status
$error_json = json_encode($errors);
echo $error_json;

$conn = null;
?>