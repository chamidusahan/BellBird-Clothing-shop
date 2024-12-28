<?php

include "connection.php";
session_start();

if (!isset($_SESSION['user']) || !isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
$userId = $user['id']; 
$ohId = $_GET['id'];

$ohRs = Database::search("SELECT * FROM `order_history` WHERE `id`='$ohId'");
$num = $ohRs->num_rows;

if ($num < 1) {
    header("Location: index.php");
    exit;
}

$uaRs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$userId'");
$num2 = $uaRs->num_rows;

$oh = $ohRs->fetch_assoc();
$ua = $uaRs->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="icon" href="images/bd.png">
    <link href="bootstrap.css" rel="stylesheet">
    <style>
        .invoice-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
            max-width: 800px;
        }

        .header img {
            width: 250px;        
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <div id="printArea" class="invoice-container mt-4 mb-4 p-4">
            <div class="header text-center mb-4">
                <img src="images/b.png" alt="Company Logo">
                <h1 class="fw-bold text-dark">INVOICE</h1>
            </div>

            <div class="mb-4">
                <table class="table table-bordered">
                    <tbody class="table-light">
                        <tr>
                            <th>Invoice No:</th>
                            <td>#<?php echo $oh['order_id'] ?></td>
                            <th>Invoice Date:</th>
                            <td><?php echo $oh['order_date'] ?></td>
                        </tr>
                        <tr>
                            <th>Customer Name:</th>
                            <td><?php echo $user['fname'] ?> <?php echo $user['lname'] ?></td>
                            <th>Customer Email:</th>
                            <td><?php echo $user['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $user['mobile'] ?></td>
                            <th>Customer Address:</th>
                            <td><?php echo $ua['address'] ?>, <?php echo $ua['address2'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oiRs = Database::search(" SELECT `order_items`.`price`, `order_items`.`qty`, `stock_view`.`name` FROM `order_items` JOIN `stock_view` ON `order_items`.`stock_id` = `stock_view`.`stock_id`  WHERE `oh_id`='$ohId' ");

                        $total = 0;
                        while ($oi = $oiRs->fetch_assoc()) {
                            $total += $oi['price'] * $oi['qty'];
                        ?>
                            <tr>
                                <td><?php echo $oi['name']; ?></td>
                                <td><?php echo $oi['qty']; ?></td>
                                <td>Rs.<?php echo $oi['price']; ?>.00</td>
                                <td>Rs.<?php echo $oi['qty'] * $oi['price']; ?>.00</td>
                            </tr> 
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="text-right mb-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Subtotal:</th>
                            <td>Rs. <?php echo $total; ?>.00</td>
                        </tr>
                        <tr>
                            <th>Delivery:</th>
                            <td>Rs. 500.00</td>
                        </tr>
                       
                        <tr>
                            <th>Total:</th>
                            <td>Rs. <?php echo $oh['amount'] ?>.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <p>Thank you for your purchase!</p>
                <p>We hope you enjoy your new items and look forward to serving you again soon. If you have any questions or need further assistance, please do not hesitate to contact us at support@example.com.</p>
            </div>
        </div>
        <div class="col-12 mt-5 mb-3 d-flex justify-content-center gap-2">
            <button class="btn btn-dark w-25" onclick="history.back();"><i class="bi bi-arrow-left"></i>BACK</button>
            <button class="btn btn-outline-danger w-25" onclick="printReport();"><i class="bi bi-printer-fill"></i>PRINT</button>
        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>