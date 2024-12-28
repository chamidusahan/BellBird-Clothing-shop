<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BellBird Clothing</title>
  <link rel="icon" href="images/bd.png">
  <link rel="stylesheet" href="bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

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
      background-image: url('images/banner.png');
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

<body>

  <div class="container-fluid">
    <div class="row">
      <?php include "index-header.php"; ?>

    </div>
    <div class="hero d-flex align-items-center">
      <div class="hero-content text-center">

        <h1 class="mb-2">Find Your Perfect Style</h1>
        <p class="fs-5 mb-5">Discover the latest trends and timeless pieces to elevate your wardrobe.</p>

        <form class="search-bar col-12 col-md-8 d-flex mx-auto" action="shop.php" method="GET">
          <input class="form-control me-2 bg-body-secondary " id="search" type="search" name="search" placeholder="Search for Clothes..." aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>

      </div>
    </div>

    <main class="col-lg-10 offset-lg-1 mt-4">
      

      <h3 class="text-center">New Arrivals</h3>
      <hr>

      <div class="row my-5">
        <?php
        $rs = Database::search("SELECT * FROM `stock_view` ORDER BY `stock_view`.`stock_id` DESC LIMIT 8");
        $num = $rs->num_rows;

        for ($x = 0; $x < $num; $x++) {
          $row = $rs->fetch_assoc();
        ?>
          <div class="col-6 col-md-4 col-lg-3 my-3">
            <div class="card card-custom">
              <a href="single-product-view.php?product=<?php echo ($row['stock_id']); ?>" class="text-decoration-none">
                <img src="<?php echo ($row['img']); ?>" class="card-img-top" alt="Product Image">
                <div class="card-body text-center">
                  <h5><?php echo ($row['name']); ?></h5>
                  <p class="fs-4 fw-bold">Rs.<?php echo ($row['price']); ?>.00</p>
                </div>
              </a>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="container pt-4">
        <div class="row px-xl-5 pb-3 justify-content-center">
          <div class="col-6  col-lg-3 pb-1">
            <div class="d-flex justify-content-around justify-md-content-evenly py-3 px-sm-5 px-md-0 rounded align-items-center border mb-4">
              <h1 class="fa fa-shipping-fast m-0 " aria-hidden="true"></h1>
              <div class="p-0 m-0">
                <h5 class="font-weight-semi-bold m-0">Safe Delivery</h5>
                <p class="p-0 m-0 small">You are safe hand</p>
              </div>
            </div>
          </div>
          <div class="col-6  col-lg-3 pb-1">
            <div class="d-flex justify-content-around justify-md-content-evenly py-3 px-sm-5 px-md-0 rounded align-items-center border mb-4">
              <h1 class="fa-solid fa-box-open m-0 " aria-hidden="true"></h1>
              <div class="p-0 m-0">
                <h5 class="font-weight-semi-bold m-0">Best Products</h5>
                <p class="p-0 m-0 small">Quality Products</p>
              </div>
            </div>
          </div>
          <div class="col-6  col-lg-3 pb-1">
            <div class="d-flex justify-content-around justify-md-content-evenly py-3 px-sm-5 px-md-0 rounded align-items-center border mb-4">
              <h1 class="fa fa-phone-volume m-0 " aria-hidden="true"></h1>
              <div class="p-0 m-0">
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                <p class="p-0 m-0 small">Anytime Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <?php include "index-footer.php"; ?>
  <script src="https://kit.fontawesome.com/3770592bab.js" crossorigin="anonymous"></script>
  <script src="bootstrap.bundle.js"></script>
  <script src="script.js"></script>
</body>

</html>