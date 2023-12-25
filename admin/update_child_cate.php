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
            <span>Update Child Category:</span>
            <a href="view_child_category.php"><span><button class="btn btn-info">view Child Category</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/update_child_category.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="cId" class="form-label">ID:</label>
                    <input type="text" class="form-control" name="child_id" value="<?= $_GET['id'] ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="cName" class="form-label">Child Sub-Category Name:</label>
                    <input type="text" class="form-control" name="csubcate_name" value="<?= $_GET['csubcate_name_'] ?>" placeholder="Enter child category name here....">
                </div>
                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="c_catepopular" <?= ($_GET['c_catepopular'] == '1' ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="gridCheck">
                            Popular Child Category (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="c_catestatus" <?= ($_GET['c_catestatus'] == '1' ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="gridCheck">
                            Child Category Status (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="Descriptions" class="form-label">Descriptions:</label>
                    <input type="text" class="form-control" name="c_catedesc" value="<?= $_GET['c_catedesc'] ?>" placeholder="Enter short description here....">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Upload Image:</label>
                    <input type="file" class="form-control" name="c_cateimage">
                    <!-- Display the existing image with its URL -->
                    <img src="process/upload/childcategory/<?= $_GET['c_cateimage_'] ?>" alt="cate_img" height="70" width="100">
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Child Sub-category</button>
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