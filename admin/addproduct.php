<?php include "includes/header.php";
require_once("process/config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:../home.php");
    exit();
}
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
            <span>Add Products:</span>
            <a href="viewproduct.php"><span><button class="btn btn-info text-white">View Product</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <form class="row g-3 category-form" action="process/addproduct.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == '1') {
                    echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
                }
                if ($_GET['msg'] == '2') {
                    echo '<h5 class="successMsg">Product added successfully..</h5>';
                }
                if ($_GET['msg'] == '3') {
                    echo '<h5 class="errorMsg">Product failed to add..</h5>';
                }
            }
            ?>
            <div class="col-md-6">
                <label for="pName" class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="p_name" placeholder="Enter product name here...." reqired>
            </div>
            <div class="col-md-6">
                <label for="cName" class="form-label">Category Name:</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected>--Select Category--</option>

                    <!-- Display Category from database -->
                    <?php
                    require_once("process/config.php");

                    $displaycate = "SELECT * FROM categories_db";
                    $displaycate_query = mysqli_query($conn, $displaycate);
                    if ($displaycate_query->num_rows > 0) {
                        while ($row = $displaycate_query->fetch_assoc()) {
                    ?>
                            <option value="<?= $row['id'] ?>"><?= $row['cate_name'] ?></option>
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
                <select class="form-select" aria-label="Default select example" name="p_slug">
                    <option selected>--Select Brand--</option>

                    <!-- Display Category from database -->
                    <?php
                    require_once("process/config.php");

                    $displaybrand = "SELECT * FROM brand_db";
                    $displaybrand_query = mysqli_query($conn, $displaybrand);
                    if ($displaybrand_query->num_rows > 0) {
                        while ($row = $displaybrand_query->fetch_assoc()) {
                    ?>
                            <option value="<?= $row['b_id'] ?>"><?= $row['b_name'] ?></option>
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
                <label for="inputSlug" class="form-label">Product Sales Price:</label>
                <input type="text" class="form-control" name="p_price" placeholder="Enter Product sales price here...." reqired>
            </div>
            <div class="col-md-6">
                <label for="metaTitle" class="form-label">Product Discount:</label>
                <input type="text" class="form-control" name="p_saleprice" placeholder="Enter meta title here...." reqired>
            </div>
            <div class="col-md-6">
                <label for="desc" class="form-label">Product Description:</label>
                <input type="text" class="form-control" name="p_desc" placeholder="Enter Product description here...." reqired>
            </div>
            <div class="col-6">
                <label for="Descriptions" class="form-label">Product Short Description:</label>
                <input type="text" class="form-control" name="p_smalldesc" placeholder="Enter short description here...." reqired>
            </div>
            
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="p_trending">
                    <label class="form-check-label" for="gridCheck">
                        Trending Product(Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="p_status">
                    <label class="form-check-label" for="gridCheck">
                        Product Status(Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Upload Product Image:</label>
                <input type="file" class="form-control" name="p_image" reqired>
            </div>
            <div class="col-md-6">
                <label for="metaTitle" class="form-label">Product Quantity:</label>
                <input type="text" class="form-control" name="p_qty" placeholder="Enter Product meta title here...." min="1" step="1" reqired>
            </div>
            <div class="col-md-6">
                <label for="metaTitle" class="form-label">Product Meta Title:</label>
                <input type="text" class="form-control" name="p_metatitle" placeholder="Enter Product meta title here...." reqired>
            </div>
            <div class="col-md-6">
                <label for="metaKeywords" class="form-label">Product Meta Keywords:</label>
                <input type="text" class="form-control" name="p_metakyword" placeholder="Enter Product keywords here...." reqired>
            </div>

            <div class="col-md-12">
                <label for="blogBody" class="form-label">Product Body/Descriptions:</label>
                <textarea class="form-control" id="catbodydesc" name="p_metadesc" cols="30" rows="10" placeholder="Enter Product description here..." reqired></textarea>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>
    </div>

</section>



<?php include "includes/footer.php" ?>