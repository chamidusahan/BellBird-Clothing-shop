<?php

include "connection.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: signin.php");
}
$userId = $_SESSION["user"]["id"];

$ohRs = Database::search("SELECT * FROM `order_history` WHERE `users_id`='$userId'");
$num = $ohRs->num_rows;

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="icon" href="images/bd.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }

        .order-history {
            background-color: #212529;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .order-header,
        .order-footer {
            border-bottom: 1px solid #495057;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .order-footer {
            border-top: 1px solid #495057;
            border-bottom: none;
            padding-top: 10px;
            padding-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "index-header.php"; ?>
        </div>

        <div class="container mt-5">
            <h1 class="text-center mb-4">Order History</h1>

            <?php
            if ($num > 0) {
                for ($x = 0; $x < $num; $x++) {
                    $row = $ohRs->fetch_assoc();
                    $orderId = $row["order_id"];
                    $orderDate = $row["order_date"];
                    $oiRs = Database::search("SELECT `order_items`.*, `stock_view`.`name`, `stock_view`.`price` FROM `order_items` JOIN `stock_view` ON `order_items`.`stock_id` = `stock_view`.`stock_id` WHERE `oh_id` = '" . $row["id"] . "'");
                    $total = 0;
                    ?>
                    <div class="order-history">
                        <div class="order-header">
                            <h5>Order #<?php echo $orderId; ?></h5>
                            <p>Date: <?php echo $orderDate; ?></p>
                        </div>
                        <div class="order-details">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($oi = $oiRs->fetch_assoc()) {
                                        $productName = $oi["name"];
                                        $quantity = $oi["qty"];
                                        $price = $oi["price"];
                                        $itemTotal = $price * $quantity;
                                        $total += $itemTotal;
                                        ?>
                                        <tr>
                                            <td><?php echo $productName; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td>Rs.<?php echo $price; ?>.00</td>
                                            <td>Rs.<?php echo $itemTotal; ?>.00</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-footer text-end">
                            <p><strong>Subtotal:</strong> Rs. <?php echo $total; ?>.00</p>
                            <p><strong>Delivery:</strong> Rs. 500.00</p>
                            <p><strong>Total:</strong> Rs. <?php echo $total + 500; ?>.00</p>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="text-center">
                    <h5>No orders in your order history.</h5>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
