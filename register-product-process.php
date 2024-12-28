<?php

include "connection.php";

$name = $_POST["name"];
$desc = $_POST["desc"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$color = $_POST["color"];
$size = $_POST["size"];

if (empty($name)) {
    echo("Please enter the product name");
} else if(empty($desc)){
    echo("Please enter the product Description");
}else if(empty($_FILES["img"])){
    echo("Please select a product image");
}else{
    $rs = Database::search("SELECT * FROM `product` WHERE `name` = '$name' AND `color_id` = '$color' AND `brand_id`= '$brand' AND `cat_id`='$category' AND `size_id`='$size'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("The product you are going to register is already in the list");
    } else {
        $imgPath = "images/products/" . uniqid() . $_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], $imgPath);

        Database::iud("INSERT INTO `product`(`name`, `description`, `img`, `brand_id`, `cat_id`, `color_id`, `size_id`) VALUES ('$name', '$desc', '$imgPath', '$brand', '$category', '$color', '$size')");
        echo("success");
    }
    

}


?>