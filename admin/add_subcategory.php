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
    <div class="category-content sub_category_content">
        <div class="categories-Title sub_category_title my-4">
            <span>Add Sub-category:</span>
            <a href="view_subcategory.php"><span><button class="btn btn-info">View Subcategory</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <form class="row g-3 category-form" action="process/add_sub_categories.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == '1') {
                    echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
                }
                if ($_GET['msg'] == '2') {
                    echo '<h5 class="successMsg">Sub-category added successfully..</h5>';
                }
                if ($_GET['msg'] == '3') {
                    echo '<h5 class="errorMsg">Sub-category failed to add..</h5>';
                }
            }
            ?>
            <div class="col-md-6">
                <label for="cName" class="form-label">Sub-Category Name:</label>
                <input type="text" class="form-control" name="scate_name" placeholder="Enter category name here...." reqired>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="s_catepopular">
                    <label class="form-check-label" for="gridCheck">
                        Popular Category (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="s_catestatus">
                    <label class="form-check-label" for="gridCheck">
                        Category Status (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-12">
                <label for="Descriptions" class="form-label">Descriptions:</label>
                <input type="text" class="form-control" name="c_catedesc" placeholder="Enter short description here....">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Upload Image:</label>
                <input type="file" class="form-control" name="s_cateimg">
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Sub-category</button>
            </div>
        </form>
    </div>

</section>



<?php include "includes/footer.php" ?>