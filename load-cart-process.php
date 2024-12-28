<?php

include "connection.php";
session_start();

if (isset($_SESSION['user'])) {

    $userId = $_SESSION['user']['id'];

    $rs = Database::search(" SELECT * FROM `cart` WHERE `users_id` = '$userId' ");
    $num = $rs->num_rows;
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <style>
            body {
                background-color: #121212;
                color: #ffffff;
                font-family: Arial, sans-serif;
            }

            .cart-item {
                padding: 1rem 0;
            }

            .cart-item img {
                max-width: 100%;
                height: auto;
            }

            .cart-item .remove-btn {
                position: absolute;
                top: 1rem;
                right: 1rem;
            }

            .cart-summary {
                background-color: #1f1f1f;
                position: sticky;
                top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Shopping Cart</h1>
            <div class="row">
                <div class="col-md-8">
                    <?php

                    if ($num > 0) {
                        $netTotal = 0;

                        for ($i = 0; $i < $num; $i++) {
                            $row = $rs->fetch_assoc();
                            $stockId = $row['stock_id'];

                            $stockRs = Database::search(" SELECT * FROM `stock_view` WHERE `stock_id` = '$stockId' ");
                            $stock = $stockRs->fetch_assoc();
                    ?>
                            <div class="cart-item row position-relative">
                                <div class="col-4">
                                    <img height="150px" src="<?php echo ($stock['img']); ?>" />
                                </div>
                                <div class="col-8">
                                    <h5><?php echo $stock['name']; ?></h5>
                                    <p>Color: <?php echo $stock['color_name']; ?></p>
                                    <p>Size: <?php echo $stock['size_name']; ?></p>
                                    <p>Brand: <?php echo $stock['brand_name']; ?></p>
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <button onclick="decrementCartQty('<?php echo ($row['id']); ?>');" class="btn btn-sm btn-light rounded-pill">-</button>
                                        <input id="qty-<?php echo ($row['id']); ?>" type="text" value="<?php echo ($row['qty']); ?>" disabled class="form-control form-control-sm rounded-pill text-center" style="width: 70px;">
                                        <button onclick="incrementCartQty('<?php echo ($row['id']); ?>');" class="btn btn-sm btn-light rounded-pill">+</button>
                                    </div>

                                    <div class="">
                                        <?php
                                        $pTotal = $stock['price'] * $row['qty'];
                                        $netTotal += $pTotal;
                                        ?>
                                        <p class="mb-1">Price: Rs.<?php echo ($stock['price']); ?>.00</p>
                                        <h4 class="fw-bold text-success-emphasis">Rs.<?php echo $pTotal; ?>.00</h4>
                                    </div>


                                    <button onclick="removeFromCart('<?php echo ($row['id']); ?>');" class="btn btn-danger btn-sm remove-btn"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <hr>
                    <?php
                        }
                    } else {
                        echo "<p>Your cart is empty.</p>";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <?php if ($num > 0) { ?>
                        <div class="card cart-summary">
                            <div class="card-body">
                                <h5 class="card-title">Cart Summary</h5>
                                <?php
                    
                                $delivery = 500;
                                $total = $netTotal + $delivery;
                                ?>
                                <p class="card-text">Subtotal: Rs.<?php echo ($netTotal); ?></p>
                                <p class="card-text">Delivery: Rs.<?php echo ($delivery); ?></p>
                               
                                <p class="card-text">Total: Rs.<?php echo ($total); ?></p>
                                <button onclick="checkout();" class="btn btn-primary w-100">Checkout</button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="text-center">
                            <h2 class="mb-4">Cart is empty. Continue shopping!</h2>
                            <a href="index.php" class="btn btn-primary mb-5">Go to Shop</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
} else {
    echo "Please login first!";
    exit();
}
?>
