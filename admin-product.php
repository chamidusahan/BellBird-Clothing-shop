<?php
session_start();

include "connection.php";
if (isset($_SESSION["admin"])) {
?>

    <!doctype html>
    <html lang="en" data-bs-theme="dark">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Product Management | BellBird</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="images/bd.png">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
    </head>

    <body onload="loadProducts(1);">

        <?php include "admin-header.php"; ?>

        <div class="container-fluid">
            <div class="row">

                <?php include "admin-sidebar.php"; ?>

                <main class="col-lg-10 ms-sm-auto px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Product Management</h1>
                        <div class="col-4 offset-4 d-flex justify-content-center mb-3">
                            <button class="btn btn-primary w-50 rounded-pill" data-bs-toggle="modal" data-bs-target="#registerProductModal">Register product</button>

                        </div>
                    </div>
                    <div class="col-10 offset-1 gap-5 d-flex justify-content-around">
                        <button class="btn bg-info-subtle btn-outline-primary w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#registerBrandModel">Add Brand</button>
                        <button class="btn bg-info-subtle btn-outline-primary w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#registerCategoryModel">Add Category</button>
                        <button class="btn bg-info-subtle btn-outline-primary w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#registerColorModel">Add Color</button>
                        <button class="btn bg-info-subtle btn-outline-primary w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#registerSizeModel">Add Size</button>

                    </div>


                    <div class="mt-4 table-responsive" id="content">


                    </div>

                    <!-- Brand Registration Modal -->
                    <div class="modal fade" id="registerBrandModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Register Brand</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerBrandForm">
                                        <div class="mb-3">
                                            <label for="brandName" class="form-label">Brand Name</label>
                                            <input class="form-control" id="brandName" type="text" placeholder="Enter brand name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="registerBrand();">Save Brand</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Category Registration Modal -->
                    <div class="modal fade" id="registerCategoryModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Register Category</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerCategoryForm">
                                        <div class="mb-3">
                                            <label for="catName" class="form-label">Category Name</label>
                                            <input class="form-control" id="catName" type="text" placeholder="Enter category name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="registerCategory();">Save Category</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Color Registration Modal -->
                    <div class="modal fade" id="registerColorModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Register Color</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerColorForm">
                                        <div class="mb-3">
                                            <label for="colorName" class="form-label">Color Name</label>
                                            <input class="form-control" id="colorName" type="text" placeholder="Enter color name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="registerColor();">Save Color</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Size Registration Modal -->
                    <div class="modal fade" id="registerSizeModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Register Size</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerSizeForm">
                                        <div class="mb-3">
                                            <label for="sizeName" class="form-label">Size Name</label>
                                            <input class="form-control" id="sizeName" type="text" placeholder="Enter size name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="registerSize();">Save Size</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Register Product Modal -->
                    <div class="modal fade" id="registerProductModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h1 class="modal-title fs-5">Register Product</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="registerProductForm">
                                        <div class="row g-4">
                                            <div class="col-sm-12">
                                                <label for="prodName" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="prodName" placeholder="Enter product name" required>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="prodCategory" class="form-label">Category</label>
                                                <select id="prodCategory" class="form-select">
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `category`");
                                                    $num = $rs->num_rows;
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                        echo "<option value='{$d['cat_id']}'>{$d['cat_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="prodBrand" class="form-label">Brand</label>
                                                <select id="prodBrand" class="form-select">
                                                    <option value="0">Select Brand</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `brand`");
                                                    $num = $rs->num_rows;
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                        echo "<option value='{$d['brand_id']}'>{$d['brand_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="prodDesc" class="form-label">Product Description</label>
                                                <textarea id="prodDesc" class="form-control" rows="3" placeholder="Describe the product"></textarea>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="prodColor" class="form-label">Color</label>
                                                <select id="prodColor" class="form-select">
                                                    <option value="0">Select Color</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `color`");
                                                    $num = $rs->num_rows;
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                        echo "<option value='{$d['color_id']}'>{$d['color_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="prodSize" class="form-label">Size</label>
                                                <select id="prodSize" class="form-select">
                                                    <option value="0">Select Size</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `size`");
                                                    $num = $rs->num_rows;
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $d = $rs->fetch_assoc();
                                                        echo "<option value='{$d['size_id']}'>{$d['size_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="prodImage" class="form-label">Product Image</label>
                                                <input id="prodImage" class="form-control" type="file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="registerProduct();" class="btn btn-primary">Save Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- register -->

                    <!-- Update Product Modal -->
                    <div class="modal fade" id="updateProductModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h1 class="modal-title fs-5">Update Product</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateProductForm">
                                        <div class="mb-3">
                                            <label class="form-label" for="uProdId">Product ID</label>
                                            <input class="form-control" id="uProdId" type="text" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdName">Product Name</label>
                                            <input class="form-control" id="uProdName" type="text" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdDesc">Description</label>
                                            <textarea id="uProdDesc" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdCategory">Category</label>
                                            <select class="form-select" id="uProdCategory">
                                                <option value="0">Select Category</option>
                                                <?php
                                                $rs = Database::search("SELECT * FROM `category`");
                                                $num = $rs->num_rows;

                                                for ($x = 0; $x < $num; $x++) {
                                                    $d = $rs->fetch_assoc();
                                                    echo "<option value='{$d["cat_id"]}'>{$d["cat_name"]}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdBrand">Brand</label>
                                            <select class="form-select" id="uProdBrand">
                                                <option value="0">Select Brand</option>
                                                <?php
                                                $rs = Database::search("SELECT * FROM `brand`");
                                                $num = $rs->num_rows;

                                                for ($x = 0; $x < $num; $x++) {
                                                    $d = $rs->fetch_assoc();
                                                    echo "<option value='{$d["brand_id"]}'>{$d["brand_name"]}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdColor">Color</label>
                                            <select class="form-select" id="uProdColor">
                                                <option value="0">Select Color</option>
                                                <?php
                                                $rs = Database::search("SELECT * FROM `color`");
                                                $num = $rs->num_rows;

                                                for ($x = 0; $x < $num; $x++) {
                                                    $d = $rs->fetch_assoc();
                                                    echo "<option value='{$d["color_id"]}'>{$d["color_name"]}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdSize">Size</label>
                                            <select class="form-select" id="uProdSize">
                                                <option value="0">Select Size</option>
                                                <?php
                                                $rs = Database::search("SELECT * FROM `size`");
                                                $num = $rs->num_rows;

                                                for ($x = 0; $x < $num; $x++) {
                                                    $d = $rs->fetch_assoc();
                                                    echo "<option value='{$d["size_id"]}'>{$d["size_name"]}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Product Image Preview</label>
                                            <img id="uProdImgTag" src="" alt="Product Image" class="img-fluid mb-2" height="200">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="uProdImage">Product Image</label>
                                            <input id="uProdImage" class="form-control" type="file" onchange="updateProdImage();">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                                    <button type="button" class="btn btn-success" onclick="updateProduct();">UPDATE</button>
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
