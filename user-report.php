<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Report | BellBird</title>
    <link rel="icon" href="images/bd.png">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
    </head>

    <body>

        <?php include "admin-header.php"; ?>

        <div class="container-fluid">
            <div class="row">

                <?php include "admin-sidebar.php"; ?>

                <main class="col-lg-10 ms-sm-auto px-md-4">
                    <div class="container">
                        <div class="row ">
                            <div class="col-12 mt-5 d-flex justify-content-end gap-3">
                                <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>BACK</button>
                                <button class="btn btn-outline-danger" onclick="printReport();"><i class="bi bi-printer-fill"></i>PRINT</button>
                            </div>
                        </div>
                    </div>

                    <div class="container" id="printArea">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <h1 class="">User Report</h1>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>

                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs = Database::search("SELECT `users`.`id`,`users`.`fname`,`users`.`lname`,`users`.`email`,`users`.`mobile`, `user_type`.`name` AS `type`,`users`.`status` FROM `users` JOIN `user_type` ON `users`.`user_type_id` = `user_type`.`id` WHERE `user_type_id`='2'");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {
                                            $row = $rs->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?php echo ($row["id"]); ?></td>
                                                <td><?php echo ($row["fname"] . " " . $row["lname"]); ?></td>
                                                <td><?php echo ($row["email"]); ?></td>
                                                <td><?php echo ($row["mobile"]); ?></td>

                                                <td>
                                                    <?php
                                                    if ($row["status"] == "1") {
                                                        echo ("Active");
                                                    } else {
                                                        echo ("Inactive");
                                                    }


                                                    ?>
                                                </td>
                                            </tr>
                                        <?php

                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </main>
            </div>
        </div>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:admin-signin.php");
}
