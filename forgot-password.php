<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - BellBird Clothing</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
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

        .form-container h2 {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">

                <div class="form-container">
                    <h2 class="text-center mb-4">Forgot Password</h2>
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="d-grid mb-3">
                            <button type="button" class="btn btn-primary" onclick="forgotPassword();">SEND</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
