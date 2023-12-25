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
            <span>Update Subcategory:</span>
            <a href="view_subcategory.php"><span><button class="btn btn-info text-white">View Sub-category</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/update_subcate.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="cName" class="form-label">Id:</label>
                    <input type="text" class="form-control" name="ids" value="<?= $_GET['id']?>" placeholder="Enter category name here...." readonly>
                </div>
                <div class="col-md-6">
                    <label for="cName" class="form-label">Sub-Category Name:</label>
                    <input type="text" class="form-control" name="scate_names" value="<?= $_GET['scatename_']?>" placeholder="Enter category name here...." reqired>
                </div>
                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="s_catepopulars" <?= ($_GET['scatepopular'] == '1' ? 'checked' : '')?>>
                        <label class="form-check-label" for="gridCheck">
                            Popular Category (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="s_catestatuss" <?= ($_GET['s_catestatus'] == '1' ? 'checked' : '')?>>
                        <label class="form-check-label" for="gridCheck">
                            Category Status (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="Descriptions" class="form-label">Descriptions:</label>
                    <input type="text" class="form-control" name="c_catedescs" value="<?= $_GET['ccatedesc_']?>" placeholder="Enter short description here....">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Upload Image:</label>
                    <input type="file" class="form-control" name="s_cateimgs">
                    <img src="process/upload/subcate/<?= $_GET['subcate_image']?>" alt="subcateImg" width="120" height="80" class="mt-3">
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Sub-category</button>
                </div>
            </form>

        <?php

        } else {
            echo "Subcate Id is missing from URL, Please try to logged in";
            // header("location:../login.php");
        }


        ?>
    </div>

</section>



<?php include "includes/footer.php" ?>