<?php
include "connection.php";

$pw = $_POST["pw"];
$cpw = $_POST["cpw"];
$vcode = $_POST["vcode"];

if (empty($pw)) {
    echo ("Please enter your password");
} else if (empty($cpw) || $pw != $cpw) {
    echo ("Please Confirm Password");
} else if (empty($vcode)) {
    echo ("Please enter your verification code");
} else {
    $rs = Database::search("SELECT * FROM `users` WHERE `vcode` = '$vcode'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $row = $rs->fetch_assoc();

        Database::iud("UPDATE `users` SET `password` =  '$pw', `vcode` = NULL WHERE `id` = '" . $row["id"] . "' ");
        echo "success";
    }else{
        echo "User not found";
    }
}