<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>
  <!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="bootstrap.css">
    <link href="admin-style.css" rel="stylesheet">
    <title>User Management - BellBird</title>
    <link rel="icon" href="images/bd.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  </head>

  <body onload="loadUsers(1);">
    <?php include "admin-header.php" ?>
    <div class="container-fluid">
      <div class="row">

        <?php include "admin-sidebar.php"; ?>

        <div class="col-lg-10 mt-2">
          <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">User Management</h1>

          </div>
          <br>

          <div class="mt-4 table-responsive" id="content">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    </div>

    
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
  </body>

  </html>

<?php
} else {
  header("location:admin-signin.php");
}
