<?php
include "connection.php";
session_start();

if (!isset($_SESSION['user'])) {
    echo "Please login first!";
    exit();
}

$uid = $_SESSION['user']['id'];
$rs = Database::search("SELECT * FROM `users` WHERE `id`='$uid'");

if ($rs->num_rows < 1) {
    echo "User Not Found";
    exit();
}

$u = $rs->fetch_assoc();

if (!isset($_FILES['img']) || $_FILES['img']['error'] != UPLOAD_ERR_OK) {
    echo "No file uploaded or there was an error with the upload.";
    exit();
}

$img = $_FILES['img'];
$fileName = $img['name'];
$fileTmpName = $img['tmp_name'];
$fileSize = $img['size'];
$fileError = $img['error'];
$fileType = $img['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

if (!in_array($fileActualExt, $allowed)) {
    echo "You cannot upload files of this type!";
    exit();
}

if ($fileError !== UPLOAD_ERR_OK) {
    echo "There was an error uploading your file!";
    exit();
}


$imgPath = "images/profile/" . uniqid('', true) . "." . $fileActualExt;

if (isset($u['profile']) && !empty($u['profile']) && $u['profile'] != "images/profile/images.png") {
    unlink($u['profile']);
}

if (move_uploaded_file($fileTmpName, $imgPath)) {
    Database::iud("UPDATE `users` SET `profile`='$imgPath' WHERE `id`='$uid'");
    echo "success";
} else {
    echo "Failed to move the uploaded file.";
}
?>
