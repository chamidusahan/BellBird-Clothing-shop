<?php
$search = "";
session_start();
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - BellBird Clothing</title>
    <link rel="icon" href="images/bd.png">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card-custom {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #343a40;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            color: #fff;
        }

        .card-body h5 {
            margin: 0.5rem 0;
            font-size: 1.2rem;
        }

        .card-body p {
            margin: 0;

        }

        .hero-content {
            background-image: url('images/banner-6.jpg');
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

<body onload="search(1);">

    <!-- Header -->
    <?php include "index-header.php"; ?>
    <!-- Header -->

    <div class="container">
        <div class="hero d-flex align-items-center">
            <div class="mt-3 hero-content text-center">
                <h1 class="mb-2">Discover Your Ideal Look</h1>
                <p class="fs-5 mb-5">Explore the newest styles and classic essentials to enhance your wardrobe.</p>
                <p class="fs-5">Use the filters below to narrow down your search and find your perfect match.</p>

            </div>
        </div>
        <form class="search-bar col-md-8 d-flex mx-auto" action="shop.php" method="GET">
            <input class="form-control me-2 bg-body-secondary text-light mt-3" id="search" name="search" type="text" value="<?php echo ($search); ?>" placeholder="Search for Clothes...">
            <button class="btn btn-success mt-3" type="submit">Search</button>
        </form>

        <div class="row" id="content">

            <!-- load -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>