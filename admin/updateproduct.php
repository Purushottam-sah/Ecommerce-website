<?php include "includes/header.php";
require_once("process/config.php");

?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>

<?php require_once('process/config.php') ?>
<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! </strong><?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<section id="mainContent">
    <div class="category-content">
        <div class="categories-Title my-4">
            <span>Update Product:</span>
            <a href="viewproduct.php"><span><button class="btn btn-info">View Products</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/updateproduct.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="pId" class="form-label">Product Id:</label>
                    <input type="text" class="form-control" name="p_id" value="<?= $_GET['id'] ?>" placeholder="12" required>
                </div>
                <div class="col-md-6">
                    <label for="pName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="p_name" value="<?= $_GET['p_name'] ?>" placeholder="Enter product name here...." required>
                </div>
                <div class="col-md-6">
                    <label for="cName" class="form-label">Category Name:</label>
                    <select class="form-select" aria-label="Default select example" name="category">


                        <!-- Display Category from database -->
                        <?php
                        require_once("process/config.php");

                        $displaycate = "SELECT * FROM categories_db";
                        $displaycate_query = mysqli_query($conn, $displaycate);

                        if ($displaycate_query->num_rows > 0) {
                            while ($row = $displaycate_query->fetch_assoc()) {
                                // Use the selected attribute to display the selected category
                                $selected = ($row['id'] == $_GET['categories_d']) ? 'selected' : '';
                        ?>
                                <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['cate_name'] ?></option>
                        <?php
                            }
                        } else {
                            $_SESSION['message'] = "Error executing query:";
                        }
                        ?>
                        <!-- Display Category from database -->
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="inputSlug" class="form-label">Product Brand:</label>
                    <select class="form-select" aria-label="Default select example" name="productBrand">
                        <?php
                        require_once("process/config.php");

                        $displaybrand = "SELECT * FROM brand_db";
                        $displaybrand_query = mysqli_query($conn, $displaybrand);

                        if ($displaybrand_query->num_rows > 0) {
                            while ($row = $displaybrand_query->fetch_assoc()) {
                                // Use the selected attribute to display the selected category
                                $selected = ($row['b_id'] == $_GET['p_brand_name']) ? 'selected' : '';
                        ?>
                                <option value="<?= $row['b_id'] ?>" <?= $selected ?>><?= $row['b_name'] ?></option>
                        <?php
                            }
                        } else {
                            $_SESSION['message'] = "Error executing query:";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputSlug" class="form-label">Product Sales Price:</label>
                    <input type="text" class="form-control" name="p_price" value="<?= $_GET['p_price'] ?>" placeholder="Enter Product sales price here...." required>
                </div>
                <div class="col-md-6">
                    <label for="metaTitle" class="form-label">Product Discount:</label>
                    <input type="text" class="form-control" name="p_saleprice" value="<?= $_GET['p_saleprice'] ?>" placeholder="Enter meta title here...." required>
                </div>

                <div class="col-6">
                    <label for="Descriptions" class="form-label">Product Short Description:</label>
                    <input type="text" class="form-control" name="p_smalldesc" value="<?= $_GET['p_smalldesc'] ?>" placeholder="Enter short description here...." required>
                </div>
                <div class="col-md-6">
                    <label for="desc" class="form-label">Product Description:</label>
                    <input type="text" class="form-control" name="p_desc" value="<?= $_GET['p_desc'] ?>" placeholder="Enter Product description here...." required>
                </div>
                <div class="col-2 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="p_trending" <?= ($_GET['p_trending'] == '1') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Trending Product
                        </label>
                    </div>
                </div>
                <div class="col-2 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="p_status" <?= ($_GET['p_status']) == '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Product Status
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Upload Product Image:</label>
                    <input type="file" class="form-control" name="p_image">
                    <img src="process/upload/<?= $_GET['p_image'] ?>" alt="productImage" width="100" height="120">
                </div>
                <div class="col-md-6">
                    <label for="metaQty" class="form-label">Product Quantity:</label>
                    <input type="text" class="form-control" name="p_qty" placeholder="Enter Product quantity...." value="<?= $_GET['quantity'] ?>" min="1" step="1" required>
                </div>
                <div class="col-md-6">
                    <label for="metaTitle" class="form-label">Product Meta Title:</label>
                    <input type="text" class="form-control" name="p_metatitle" value="<?= $_GET['p_metatitle'] ?>" placeholder="Enter Product meta title here...." required>
                </div>
                <div class="col-md-6">
                    <label for="metaKeywords" class="form-label">Product Meta Keywords:</label>
                    <input type="text" class="form-control" name="p_metakyword" value="<?= $_GET['p_metakeyword'] ?>" placeholder="Enter Product keywords here...." required>
                </div>

                <div class="col-md-12">
                    <label for="blogBody" class="form-label">Product Body/Descriptions:</label>
                    <textarea class="form-control" id="catbodydesc" name="p_metadesc" cols="30" rows="10" placeholder="Enter Product description here..." required><?= $_GET['p_metadesc'] ?></textarea>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>

        <?php

        } else {
            echo "Id is missing from URL, Please try to logged in";
            // header("location:../login.php");
        }


        ?>
    </div>

</section>



<?php include "includes/footer.php" ?>