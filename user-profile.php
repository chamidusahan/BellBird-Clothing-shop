<?php
include "connection.php";

session_start();
include "index-header.php";

if (isset($_SESSION['user'])) {
  $uid = $_SESSION['user']['id'];
  $rs = Database::search("SELECT * FROM `users` WHERE `id`='$uid'");
  $rs2 = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid'");

  if ($rs->num_rows < 1) {
    header("Location: signin.php");
  }

  $user = $rs->fetch_assoc();
?>
  <!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" href="images/bd.png">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <style>
      .profile-card {
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
      }

      .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
      }

      body {
        overflow-x: hidden;
      }
    </style>
  </head>

  <body>
    <section>
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                <li class="breadcrumb-item"><a href="edit-user-profile.php">Edit</a></li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <?php
                $profile = "images/profile/images.png";
                if (isset($user['profile']) && !empty($user['profile'])) {
                  $profile = $user['profile'];
                }
                ?>
                <img src="<?php echo $profile ?>" alt="avatar"
                  class="img-fluid rounded-circle profile-img mt-3" style="width: 150px;">
                <h4 class="my-3"><?php echo ($user['fname']); ?> </h4>
               <h5><?php echo ($user['lname']); ?></h5>
                
              </div>
            </div>


          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Frist Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo ($user['fname']); ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Last Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo ($user['lname']); ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo ($user['email']); ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo ($user['mobile']); ?></p>
                  </div>
                </div>
                <hr>



                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                      <?php
                                     
                      $uA = $rs2->fetch_assoc();

                      if (isset($uA['address']) && isset($uA['address2'])) {
                        echo $uA['address'] . ', ' . $uA['address2'];
                      }                   
                      ?>
                    </p>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      </div>
    </section>
    <?php include "index-footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location: signin.php");
}
?>