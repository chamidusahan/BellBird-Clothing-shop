<?php

session_start();
include "connection.php";
include "index-header.php";

if (!isset($_GET['product']) || empty(($_GET['product']))) {
    header("Location:index.php");
}
$stockId = $_GET['product'];

$rs = Database::search("SELECT * FROM `stock_view` WHERE `stock_id` ='$stockId'");
$num = $rs->num_rows;

if ($num < 1) {
?>
    <script>
        alert("Product Not Found");
        window.location = "index.php";
    </script>
<?php
}

$row = $rs->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product View</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="icon" href="images/bd.png">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .product-view {
            padding: 2rem;
        }

        .product-img {
            max-width: 100%;
            height: auto;
            max-height: 350px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control input {
            text-align: center;
            border: 1px solid #ced4da;
            background-color: #333;
            color: #fff;
            height: 38px;
            width: 60px;
            margin-right: 1rem;
        }

        .product-details p {
            margin-bottom: 0.5rem;
        }

        .badge {
            padding: 0.6rem 1rem;
            font-size: 1rem;
        }

        .btn-lg {
            padding: 0.75rem 1.25rem;
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="container product-view mt-5">
        <div class="row g-3">
            <div class="col-md-6 order-md-2">
                <img src="<?php echo ($row['img']); ?>" class="img-fluid product-img rounded">
            </div>
            <div class="col-md-6 order-md-1">
                <h1 class="mb-3"><?php echo ($row['name']); ?></h1>
                <h4 class="text-muted mb-4">Rs.<?php echo ($row['price']); ?>.00</h4>
                <p class="mb-4"><?php echo ($row['description']); ?></p>
                <div class="product-details mb-4">
                    <p><strong>Category:</strong> <?php echo ($row['cat_name']); ?></p>
                    <p><strong>Brand:</strong> <?php echo ($row['brand_name']); ?></p>
                    <p><strong>Color:</strong> <?php echo ($row['color_name']); ?></p>
                    <p><strong>Size:</strong> <?php echo ($row['size_name']); ?></p>
                </div>
                <div class="quantity-control mb-4">
                    <input id="qty" class="form-control" type="number" value="1" min="1" />
                    <?php if ($row['qty'] > 0) { ?>
                        <span class="badge bg-body-tertiary "><?php echo ($row['qty']); ?> Available</span>
                    <?php } else { ?>
                        <span class="badge bg-danger">Out of Stock</span>
                    <?php } ?>
                </div>
                <div>
                    <button onclick="addToCart(<?php echo $row['stock_id'] ?>);" class="btn btn-primary btn-lg me-2" ><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                    <button onclick="buyNow(<?php echo $stockId; ?>);" class="btn btn-success btn-lg"><i class="fas fa-bolt"></i> Buy Now</button>
                </div>
            </div>
        </div>
    </div>
    <?php include "index-footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
