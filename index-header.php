<header class="navbar sticky-top bg-light-subtle flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="index.php">
    <img class="img-fluid" src="images/logo-text(1).png" alt="Logo">
  </a>

  <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="cart.php">
              <i class="bi bi-cart4"></i>&nbsp;Cart
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-profile.php">
              <i class="bi bi-person-circle"></i>&nbsp;Profile
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              More
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li class="nav-item">
                <a class="nav-link" href="order-history.php">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">Feedback</a>
              </li>
            </ul>
          </li>

          <?php if (isset($_SESSION['user'])) { ?>
          <li class="nav-item">
            <a class="btn btn-danger" href="signout.php">
              <i class="bi bi-box-arrow-left"></i> Sign Out
            </a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="btn btn-light" href="signin.php">
              <i class="bi bi-box-arrow-in-right"></i> Sign In
            </a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
