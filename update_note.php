<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type,X-Requested-With,origin, Authorization");
require 'config.php';

// sanitize
$title = test_input($_GET['title']);
$author = test_input($_GET['author']);
$note = test_input($_POST['note']);
$last_updated = test_input($_GET['last_updated']);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// validate
$feedback = [];
$feedback['connect']= $connect_feedback;
if (empty($title)) {
    $feedback['errors'] ="title is required.";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $title)){
    $feedback['errors'] = "This title is invalid.";
}
if (empty($author)) {
    $feedback['errors'] ="Author is required.";
} else if (!preg_match("/^([a-zA-Z' ]+)$/", $author)){
    $feedback['errors'] ="This author name is invalid.";
}
if (empty($last_updated)) {
    $feedback['errors'] ="last_updated is required.";
}
if (empty($note)) {
    $feedback['notes']= $note;
    $feedback['errors'] ="Note is required.";
}

// execute
if (count($feedback['errors'])> 0){
    $feedback['confirm'] = "There are still feedback";
} else {
    try {
        $sql  = "UPDATE db_note.tb_note SET note = :note WHERE title = :title && author = :author && last_updated = :last_updated";
    
        $statement = $conn->prepare($sql);     
        $statement->execute([':note'=>$note , ':title'=>$title , ':author'=>$author , ':last_updated'=>$last_updated])  ;
        $feedback['confirm'] = "Note updated successfully";
    } catch(PDOException $exception){
        $feedback['confirm'] = "Error updating note: " . $exception->getMessage();
    }
}

// status
$error_json = json_encode($feedback);
echo $error_json;

$conn = null;
?>