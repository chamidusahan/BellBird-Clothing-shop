<?php
include "connection.php";

session_start();

if (isset($_SESSION['user'])) {

    $userId = $_SESSION['user']['id'];

    $rs = Database::search(" SELECT * FROM `cart` WHERE `users_id` = '$userId' ");
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link rel="icon" href="images/bd.png">
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            .cart-item {
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 15px;
                margin-bottom: 15px;
            }

            .cart-item:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            .cart-summary {
                border-top: 2px solid #007bff;
                padding-top: 20px;
            }

            .hero-content {
                background-image: url('images/cart.jpg');
                background-size: cover;
                background-position: center;
                color: white;
                text-align: center;
                width: 100%;
                height: auto;
                padding: 100px 20px;
                position: relative;
            }
        </style>
    </head>

    <body onload="loadCart();">

        <div class="container-fluid">
            <div class="row">
                <?php include "index-header.php"; ?>
            </div>

            <div class="hero d-flex align-items-center">
                <div class="mt-3 hero-content text-center">
                    <h1 class="mb-2 fw-bold">Your Shopping Cart Awaits</h1>
                    <p class="fs-5 mb-5">Review the items you've chosen and make any adjustments before proceeding to checkout.</p>
                    <p class="fs-5">Use the options below to update quantities, remove items, and ensure everything is perfect for your purchase.</p>


                </div>
            </div>

            <div class="container">
                <div class="row" id="content">

                </div>
            </div>

        </div>
        <?php include "index-footer.php";?>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:signin.php");
}
?>