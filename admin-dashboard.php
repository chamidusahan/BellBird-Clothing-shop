<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>
  <!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-dashboard | BellBird</title>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="icon" href="images/bd.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="admin-style.css" rel="stylesheet">
  </head>

  <body onload="loadChart();">

    <?php include "admin-header.php"; ?>

    <div class="container-fluid">
      <div class="row">

        <?php include "admin-sidebar.php"; ?>

        <main class="col-lg-10 ms-sm-auto px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <div class="card d-flex justify-content-center mb-3" style="width: 100%;height: 500px;">
            <canvas id="myChart"></canvas>
          </div>


        </main>
      </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
  </body>

  </html>
<?php
} else {
  header("location:admin-signin.php");
}
