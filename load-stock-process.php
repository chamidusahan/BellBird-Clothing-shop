<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
           
        </tr>

    </thead>
    <tbody>


        <?php
        include "connection.php";

        $page = 1;
        if (isset($_GET["page"]) && $_GET["page"] > 1) {
            $page = $_GET["page"];
        }

        $rs = Database::search("SELECT * FROM `stock_view`");
        $num = $rs->num_rows;

        $resultsPerPage = 5;
        $noOfPages = ceil($num / $resultsPerPage);
        $pageResults = ($page - 1) * $resultsPerPage;

        $rs2 = Database::search("SELECT * FROM `stock_view` LIMIT $resultsPerPage OFFSET $pageResults");
        $num2 = $rs2->num_rows;

        for ($x = 0; $x < $num2; $x++) {
            $row = $rs2->fetch_assoc();
        ?>
            <tr>
                <td><?php echo ($row["stock_id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["cat_name"]); ?></td>
                <td><?php echo ($row["brand_name"]); ?></td>
                <td><?php echo ($row["color_name"]); ?></td>
                <td><?php echo ($row["size_name"]); ?></td>
                <td><?php echo ($row["price"]); ?></td>
                <td><?php echo ($row["qty"]); ?></td>

                <td>
                    <?php
                    if ($row["status"] == '1') {
                    ?>
                        <button class="btn btn-sm btn-success fw-bold rounded-circle" onclick="changeStockStatus(<?php echo ($row['stock_id']); ?>);">Active</button>
                    <?php

                    } else {
                    ?>
                        <button class="btn btn-sm btn-danger fw-bold rounded-circle" onclick="changeStockStatus(<?php echo ($row['stock_id']); ?>);">Deactive</button>
                    <?php
                    }

                    ?>

                </td>

                
            </tr>


        <?php


        }

        ?>
    </tbody>
</table>
<nav class="mt-3">
    <ul class="pagination justify-content-center">

        <li class="page-item">
            <a class="page-link" aria-label="Previous" <?php if ($page > 1) { ?> onclick="loadStock(<?php echo ($page - 1); ?>);" <?php } ?>>
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php
        for ($i = 1; $i <= $noOfPages; $i++) {
            if ($i == $page) {
        ?>
                <li class="page-item active"><a class="page-link" onclick="loadStock(<?php echo ($i); ?>)"><?php echo ($i); ?></a></li>
            <?php

            } else {
            ?>
                <li class="page-item "><a class="page-link" onclick="loadStock(<?php echo ($i); ?>)"><?php echo ($i); ?></a></li>
        <?php

            }
        }
        ?>



        <li class="page-item">
            <a class="page-link" aria-label="Next" <?php if ($page < $noOfPages) { ?> onclick="loadStock(<?php echo ($page + 1); ?>);" <?php } ?>>
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    </ul>
</nav>