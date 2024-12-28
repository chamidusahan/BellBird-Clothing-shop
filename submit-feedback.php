<?php
require "connection.php"; 


    $comment1 = $_POST['comments'];
    $comment2 = $_POST['comments2'];

    if (empty($comment1) && empty($comment2)) {
        echo ("Please provide feedback in at least one field");
    } else {
     
        $query = Database::iud("INSERT INTO feedback (`comment1`, `comment2`) VALUES ('$comment1', '$comment2')");
        echo "success";
        
        
    }
?>
