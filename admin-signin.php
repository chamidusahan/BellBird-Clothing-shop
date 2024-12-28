<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In - BellBird Clothing</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/bd.png">

    <style>
        body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            font-family: Arial, sans-serif;
        }

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

        .form-container .btn-secondary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }

        .form-container .btn-secondary:hover {
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
                
                <!-- Admin Sign-in Form -->
                <div class="form-container">
                    <h2 class="text-center mb-4">Admin Sign In</h2>
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                       
                        <div id="msgDiv" class="d-none">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-secondary" onclick="adminSignIn();">SIGN IN</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
