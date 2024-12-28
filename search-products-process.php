<?php require "connection.php"; ?>

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12 col-md-4">
            <?php require "filter-form.php"; ?>
        </div>


        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                $search = $_GET['search'];

                $page = 1;
                if (isset($_GET['page']) && $_GET['page'] > 1) {
                    $page = $_GET['page'];
                }
                $rs = Database::search(" SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' AND `status`='1' ");
                $num = $rs->num_rows;

                $resultPerPage = 6;
                $noOfPages = ceil($num / $resultPerPage);
                $pageResults = ($page - 1) * $resultPerPage;

                $rs2 = Database::search(" SELECT * FROM `stock_view` WHERE `name` LIKE '%$search%' AND `status`='1' LIMIT $resultPerPage OFFSET $pageResults ");
                $num2 = $rs2->num_rows;

                if ($num2 > 0) {
                    for ($x = 0; $x < $num2; $x++) {
                        $row = $rs2->fetch_assoc();
                ?>
                        <div class="col">
                            <div class="card card-custom h-100">
                                <a href="single-product-view.php?product=<?php echo $row['stock_id']; ?>" class="text-decoration-none">
                                    <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="Product Image">
                                    <div class="card-body text-center">
                                        <h5><?php echo $row['name']; ?></h5>
                                        <p class="fs-4 fw-bold">Rs.<?php echo $row['price']; ?>.00</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 text-center mt-5">
                        <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 150px;"></i>
                        <h2>No Products Found!</h2>
                        <span>No matching products are found for the search text you have entered.</span>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Pagination -->
            <?php
            if ($num2 > 0) {


            ?>

                <div class="col-12  d-flex justify-content-center mt-3 mb-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                            <span class="page-link cursor-pointer" <?php if ($page > 1) { ?> onclick="search(<?php echo ($page - 1); ?>);" <?php } ?> >&laquo;</span>
                               
                            </li>
                            <?php
                            for ($x = 1; $x <= $noOfPages; $x++) {
                                if ($x == $page) {
                            ?>
                                    <li class="page-item active"><span class="page-link" onclick="search(<?php echo ($x); ?>);"><?php echo ($x); ?></span></li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item"><span class="page-link" onclick="search(<?php echo ($x); ?>);"><?php echo ($x); ?></span></li>
                            <?php
                                }
                            }


                            ?>

                            <li class="page-item">
                            <span class="page-link cursor-pointer" <?php if ($page < $noOfPages) { ?> onclick="search(<?php echo ($page + 1); ?>);" <?php } ?>>&raquo;</span>
                            </li>
                        </ul>
                    </nav>
                </div>

            <?php
            }

            ?>
            <!-- Pagination -->

        </div>

    </div>
</div>