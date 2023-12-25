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
    <div class="category-content brand_content">
        <div class="categories-Title my-4">
            <span>Add Brands:</span>
            <a href="viewbrand.php"><span><button class="btn btn-info text-white">View Brands</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <form class="row g-3 category-form" action="process/addbrand.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == '1') {
                    echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
                }
                if ($_GET['msg'] == '2') {
                    echo '<h5 class="successMsg">Brand added successfully..</h5>';
                }
                if ($_GET['msg'] == '3') {
                    echo '<h5 class="errorMsg">Brand failed to add..</h5>';
                }
            }
            ?>
            <div class="col-md-6">
                <label for="BName" class="form-label">Brand Name:</label>
                <input type="text" class="form-control" name="b_name" placeholder="Enter Brand name here...." reqired>
            </div>
            <div class="col-8">
                <label for="inputAddress2" class="form-label">Upload Product Image:</label>
                <input type="file" class="form-control" name="b_image" reqired>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="b_status">
                    <label class="form-check-label" for="gridCheck">
                        Category Status (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <label for="blogBody" class="form-label">Product Body/Descriptions:</label>
                <textarea class="form-control" id="catbodydesc" name="b_metadesc" cols="30" rows="10" placeholder="Enter Product description here..." reqired></textarea>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Brand</button>
            </div>
        </form>
    </div>

</section>



<?php include "includes/footer.php" ?>