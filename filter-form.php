<div class="bg-dark-subtle p-4 rounded mt-2 shadow-sm">
    <h2 class="mb-3">Filter Options</h2>
    <div class="mb-3">
        <label class="form-label" for="category"><i class="bi bi-list-task"></i> Category</label>
        <select class="form-select" id="category">
            <option value="0">Select Category</option>
            <?php
            $rs = Database::search(" SELECT * FROM `category` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['cat_id']); ?>"><?php echo ($d['cat_name']); ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="brand"><i class="bi bi-tags-fill"></i> Brand</label>
        <select class="form-select" id="brand">
            <option value="0">Select Brand</option>
            <?php
            $rs = Database::search(" SELECT * FROM `brand` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['brand_id']); ?>"><?php echo ($d['brand_name']); ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="color"><i class="bi bi-palette-fill"></i> Color</label>
        <select class="form-select" id="color">
            <option value="0">Select Color</option>
            <?php
            $rs = Database::search(" SELECT * FROM `color` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['color_id']); ?>"><?php echo ($d['color_name']); ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="size"><i class="bi bi-rulers"></i> Size</label>
        <select class="form-select" id="size">
            <option value="0">Select Size</option>
            <?php
            $rs = Database::search(" SELECT * FROM `size` ");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d['size_id']); ?>"><?php echo ($d['size_name']); ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="row g-2">
        <div class="col">
            <label class="form-label" for="priceFrom"><i class="bi bi-cash"></i> Price From</label>
            <input id="priceFrom" class="form-control" type="text" placeholder="Min">
        </div>
        <div class="col">
            <label class="form-label" for="priceTo"><i class="bi bi-cash-stack"></i> Price To</label>
            <input id="priceTo" class="form-control" type="text" placeholder="Max">
        </div>
    </div>
    <div class="d-grid mt-4">
        <button onclick="filter(1);" class="btn btn-primary btn-lg"><i class="bi bi-funnel-fill"></i> Apply Filters</button>
    </div>
</div>
