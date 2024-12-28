<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin/Signup - BellBird Clothing</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/bd.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .form-container {
            z-index: 2;
            position: relative;
            padding: 30px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .form-container .form-control {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        .form-container .form-control:focus {
            background: transparent;
            border-color: #fff;
            color: #fff;
        }

        .form-container label {
            color: #fff;
        }

        .form-container .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }

        .form-container .btn-primary:hover {
            background-color: #5848e8;
            border-color: #5848e8;
        }

        .form-container a {
            color: #6c63ff;
        }

        .form-container a:hover {
            color: #fff;
        }

        .form-container h2 {
            color: #fff;
        }

        .hidden {
            display: none;
        }

        .active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">

                <!-- Sign-in Form -->
                <div id="signinBox" class="form-container active">
                    <h2 class="text-center mb-4">Welcome Back!</h2>
                    <form>
                        <?php

                        $email = "";
                        $password = "";

                        if (isset($_COOKIE["email"])) {
                            $email = $_COOKIE["email"];
                        }
                        if (isset($_COOKIE["password"])) {
                            $password = $_COOKIE["password"];
                        }
                        ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="em" placeholder="Enter your email" value="<?php echo $email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pw" placeholder="Enter your password" value="<?php echo $password ?>">
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rmb" <?php if (isset($_COOKIE["email"])) echo ("checked") ?>>
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                           
                            <a href="forgot-password.php" class="link-secondary text-decoration-none text-black">Forgot Password?</a>
                        </div>
                        <div id="errorMsgDiv1" class="d-none">
                                <div class="alert alert-danger" id="errorMsg1"></div>
                            </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="signin();">SIGN IN</button>
                        </div>
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span> <a onclick="changeView();">Register</a>
                        </div>
                    </form>
                </div>

                <!-- Sign-up Form -->
                <div id="signupBox" class="form-container d-none">
                    <h2 class="text-center mb-4">Create an Account</h2>
                    <form>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input id="fname" type="text" class="form-control" placeholder="Enter your first name">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input id="lname" type="text" class="form-control" placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input id="mobile" type="text" class="form-control" placeholder="Enter your mobile number">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Create a password">
                        </div>
                        <div id="errorMsgDiv2" class="d-none">
                            <div class="alert alert-danger" id="errorMsg2"></div>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="signup();">SIGN UP</button>
                        </div>
                        <div class="text-center mt-3">
                            <span>Already have an account?</span> <a href="#" onclick="changeView();">Sign In</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>