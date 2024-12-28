<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>Feedback Engine</title>
    <link rel="icon" href="images/bd.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
   
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .feedback-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .agile_head {
            margin-bottom: 20px;
            font-weight: 700;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .w3l_summary {
            resize: none;
        }

        .agileits_copyright {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "index-header.php"; ?>

        </div>
        <div class="container feedback-container">
            <h1 class="agile_head text-center">Feedback Form</h1>
            <h3 class="text-center">Please help us to serve you better by taking a couple of minutes.</h3>
            <form id="feedbackForm" class="mt-4">
                <h2>How satisfied were you with our Service?</h2>
                <div class="form-group mb-3">
                    <textarea placeholder="Good / Bad / Medium / Excellent" class="form-control w3l_summary" id="comments" rows="4"></textarea>
                </div>

                <h2>If you have specific feedback, please write to us...</h2>
                <div class="form-group mb-3">
                    <textarea placeholder="Additional comments" class="form-control w3l_summary" id="comments2" rows="4"></textarea>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="submitFeedback();">Submit Feedback</button>
                </div>
            </form>
        </div>
    </div>
    <?php include "index-footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>