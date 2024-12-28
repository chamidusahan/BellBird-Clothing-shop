<?php

include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $uid = $_SESSION['user']['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $zcode = $_POST['zcode'];

    //validation
    if (empty($fname)) {
        echo "First name is required.";
    } elseif (empty($lname)) {
        echo "Last name is required.";
    } elseif (empty($mobile)) {
        echo "Mobile number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        echo "Mobile number must be 10 digits.";
    } else{
        Database::iud(" UPDATE `users` SET `fname`='$fname', `lname`='$lname', `mobile`='$mobile' WHERE `id`='$uid' ");
    }
       
        $rs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid' ");
        $num = $rs->num_rows;

        if ($num > 0) {
            //Update
            Database::iud(" UPDATE `user_address` SET `address` = '$address', `address2` = '$address2',  `district`= '$district', `city`='$city',`zcode`='$zcode' WHERE `users_id`='$uid' ");
        } else {
            //Insert
            Database::iud(" INSERT INTO `user_address` VALUES ('$uid','$address', '$address2', '$district', '$city', '$zcode' ) ");
        }
        echo "success";
    }

   