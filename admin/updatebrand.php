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
            <span>Update Brands:</span>
            <a href="viewbrand.php"><span><button class="btn btn-info text-white">View Brands</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/updatebrand.php" method="post" autocomplete="off" enctype="multipart/form-data">
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
                    <label for="bId" class="form-label">Brand Id:</label>
                    <input type="text" class="form-control" name="b_id" value="<?= $_GET['id']?>" placeholder="Enter Brand name here...." readonly reqired>
                </div>
                <div class="col-md-6">
                    <label for="BName" class="form-label">Brand Name:</label>
                    <input type="text" class="form-control" name="b_name" value="<?= $_GET['b_name']?>" placeholder="Enter Brand name here...." reqired>
                </div>
                <div class="col-8">
                    <label for="inputAddress2" class="form-label">Upload Product Image:</label>
                    <input type="file" class="form-control mb-3" name="b_image" reqired>
                    <img src="process/upload/brand/<?= $_GET['b_image']?>" alt="brand_mg" width="140" height="100">
                </div>
                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="b_status" <?= $_GET['b_status'] == '1' ? 'checked': '';?>>
                        <label class="form-check-label" for="gridCheck">
                            Category Status (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="blogBody" class="form-label">Product Body/Descriptions:</label>
                    <textarea class="form-control" id="catbodydesc" name="b_metadesc" cols="30" rows="10" placeholder="Enter Product description here..." reqired><?= $_GET['b_metadesc']?></textarea>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Brand</button>
                </div>
            </form>
        <?php

        } else {
            echo "Brand Id is missing from URL, Please try to logged in";
            // header("location:../login.php");
        }


        ?>
    </div>

</section>



<?php include "includes/footer.php" ?>