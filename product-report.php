<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product-Report | BellBird</title>
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
                        <div class="row">
                            <div class="col-12 mt-5 d-flex justify-content-end gap-3">
                                <button class="btn btn-dark" onclick="history.back();"><i class="bi bi-arrow-left"></i>BACK</button>
                                <button class="btn btn-outline-danger" onclick="printReport();"><i class="bi bi-printer-fill"></i>PRINT</button>
                            </div>
                        </div>
                    </div>

                    <div class="container" id="printArea">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <h1 class="">Product Report</h1>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs = Database::search("SELECT * FROM `product_details`");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {
                                            $row = $rs->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?php echo ($row["id"]); ?></td>
                                                <td><?php echo ($row["name"]); ?></td>
                                                <td><?php echo ($row["cat_name"]); ?></td>
                                                <td><?php echo ($row["brand_name"]); ?></td>
                                                <td><?php echo ($row["size_name"]); ?></td>
                                                <td><?php echo ($row["color_name"]); ?></td>
                                                




                                                <td>
                                                    <?php
                                                    if ($row["status"] == "1") {
                                                        echo ("Active");
                                                    } else {
                                                        echo ("Inactive");
                                                    }


                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo ($row["img"]); ?>" height="100">
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
