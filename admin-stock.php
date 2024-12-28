<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Management | BellBird</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="images/bd.png">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
    </head>

    <body onload="loadStock(1);">

        <?php include "admin-header.php"; ?>

        <div class="container-fluid">
            <div class="row">

                <?php include "admin-sidebar.php"; ?>

                <main class="col-lg-10 ms-sm-auto px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Stock Management</h1>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary w-50 rounded-pill" data-bs-toggle="modal" data-bs-target="#addStockModel">Add stock</button>
                        </div>
                    </div>

                    <div class="mt-4 table-responsive" id="content">
                    </div>
                    <!--ADD stock Modal -->
                    <div class="modal fade" id="addStockModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Stock</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label" for="prodName">Product</label>
                                        <select id="product" class="form-select">
                                            <option value="0">Select Product</option>
                                            <?php
                                            $rs = Database::search("SELECT * FROM `product_details` WHERE `status`='1'");
                                            $num = $rs->num_rows;

                                            for ($i = 0; $i < $num; $i++) {
                                                $row = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo ($row["id"]); ?>"> <?php echo ($row["name"] . " - " . $row["brand_name"] . " - " .
                                                                                                    $row["cat_name"]  . " - " . $row["color_name"] . " - " . $row["size_name"]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="mb-2">
                                            <label class="form-label" for="">Qty</label>
                                            <input id="qty" class="form-control" type="text">
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="">Unit Price</label>
                                            <input id="unitPrice" class="form-control" type="text">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="addStock();">Add Stock</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ADD stock Modal -->

                    <!-- Update-Stock -->
                    <div class="modal fade" id="updateStockModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Update Stock</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-2">
                                        <label class="form-lable" for="uStkId">Stock ID</label>
                                        <input class="form-control" id="uStkId" type="text" disabled>
                                    </div>
                                                                                                                                                                                                              
                                    <div class="mb-2">
                                        <label class="form-lable" for="stkPrice">Price</label>
                                        <input class="form-control" id="stkPrice" type="text" >
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-lable" for="stkQty">Quantity</label>
                                        <input class="form-control" id="stkQty" type="text" >
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:admin-signin.php");
}
