<?php
include "connection.php";

session_start();
include "index-header.php";

if (isset($_SESSION['user'])) {
  $uid = $_SESSION['user']['id'];
  $rs = Database::search("SELECT * FROM `users` WHERE `id`='$uid'");

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
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <style>
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
    }

    .nav-pills .nav-link {
      border-radius: 0;
    }

    .nav-pills .nav-link.active {
      background-color: #007bff;
      border-radius: 20px;
    }

    .card-body .fas {
      margin-right: 10px;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-control-file {
      margin-top: 1rem;
    }

    .tab-content>.tab-pane {
      padding-top: 1rem;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3 text-center">
        <div class="card">
          <div class="card-body">
            <?php
            $profile = "images/profile/images.png";
            if (isset($user['profile']) && !empty($user['profile'])) {
              $profile = $user['profile'];
            }
            ?>
            <img src="<?php echo $profile ?>" alt="Profile Image" class="profile-img">
            <h5 class="card-title">Hello <?php echo ($user["fname"]); ?></h5>
            <input type="file" id="profileImg" class="form-control-file">
            <button onclick="updateProfileImg();" class="btn btn-secondary mt-3 w-100">Upload</button>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <ul class="nav nav-pills mb-3" id="pills-tab" >
          <li class="nav-item">
            <a class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">User Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-billing-tab" data-bs-toggle="pill" href="#pills-billing" role="tab" aria-controls="pills-billing" aria-selected="false">Billing Details</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-details" role="tabpanel">
            <div class="card">
              <div class="card-body">
                <form>
                  <div class="row g-3">
                    <div class="form-group col-md-6">
                      <label for="firstName">First Name</label>
                      <input type="text" class="form-control" id="fname" value="<?php echo ($user['fname']); ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lastName">Last Name</label>
                      <input type="text" class="form-control" id="lname" value="<?php echo ($user['lname']); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled id="email" value="<?php echo ($user['email']); ?>">
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" value="<?php echo ($user['mobile']); ?>">
                  </div>
                  <button type="submit" class="btn btn-outline-primary w-100" onclick="updateProfile();">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab">
            <div class="card">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <?php
                    $userAddressRs = Database::search("SELECT * FROM `user_address` WHERE `users_id`='$uid'");

                    $address = "";
                    $address2 = "";
                    $district = "";
                    $city = "";
                    $zcode = "";

                    if ($userAddressRs->num_rows > 0) {
                      $addres = $userAddressRs->fetch_assoc();
                      $address = $addres['address'];
                      $address2 = $addres['address2'];
                      $district = $addres['district'];
                      $city = $addres['city'];
                      $zcode = $addres['zcode'];
                    }
                    ?>
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="<?php echo ($address); ?>">
                  </div>
                  <div class="form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" class="form-control" id="address2" value="<?php echo ($address2); ?>">
                  </div>
                  <div class="row g-3">
                    <div class="form-group col-md-4">
                      <label for="district">District</label>
                      <input type="text" class="form-control" id="district" value="<?php echo ($district); ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" value="<?php echo ($city); ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zcode" value="<?php echo ($zcode); ?>">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-outline-primary w-100"  onclick="updateProfile();">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "index-footer.php";?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script.js"></script>
</body>

</html>
<?php
} else {
  header("Location: signin.php");
}
?>
