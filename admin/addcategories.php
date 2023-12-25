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
            <span>Add Categories:</span>
            <a href="viewcategory.php"><span><button class="btn btn-info">View Categories</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <form class="row g-3 category-form" action="process/addcategories.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == '1') {
                    echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
                }
                if ($_GET['msg'] == '2') {
                    echo '<h5 class="successMsg">Category added successfully..</h5>';
                }
                if ($_GET['msg'] == '3') {
                    echo '<h5 class="errorMsg">Category failed to add..</h5>';
                }
            }
            ?>
            <div class="col-md-6">
                <label for="cName" class="form-label">Sub Category Name:</label>                
                <select class="form-select" aria-label="Default select example" name="catename" reqired>
                    <option selected>--Select Category--</option>

                    <!-- Display Category from database -->
                    <?php
                    require_once("process/config.php");

                    $display_subcate = "SELECT * FROM subcate_db";
                    $display_subcate_query = mysqli_query($conn, $display_subcate);
                    if ($display_subcate_query->num_rows > 0) {
                        while ($row = $display_subcate_query->fetch_assoc()) {
                    ?>
                            <option value="<?= $row['sub_id'] ?>"><?= $row['scate_name'] ?></option>
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
                <label for="sName" class="form-label">Sub-Category Name 1:</label>
                <select class="form-select" aria-label="Default select example" name="scatename" reqired>
                    <option selected>--Select child-Category--</option>

                    <!-- Display Category from database -->
                    <?php
                    require_once("process/config.php");

                    $display_child_category = "SELECT * FROM child_cate_db";
                    $display_child_category_query = mysqli_query($conn, $display_child_category);
                    if ($display_child_category_query->num_rows > 0) {
                        while ($row = $display_child_category_query->fetch_assoc()) {
                    ?>
                            <option value="<?= $row['child_id'] ?>"><?= $row['csubcate_name'] ?></option>
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
                <label for="sName" class="form-label">Sub-Category Name 2: <span class="optionalchoice">(Optional)</span></label>
                <input type="text" class="form-control" name="scatename2" placeholder="Enter sub-category name here....">
            </div>
            <div class="col-md-6">
                <label for="sName" class="form-label">Sub-Category Name 3: <span class="optionalchoice">(Optional)</span></label>
                <input type="text" class="form-control" name="scatename3" placeholder="Enter sub-category name here....">
            </div>
            <div class="col-md-6">
                <label for="inputSlug" class="form-label">Brand:</label>
                <select class="form-select" aria-label="Default select example" name="cateslug">
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
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="catepopular">
                    <label class="form-check-label" for="gridCheck">
                        Popular Category (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="catestatus">
                    <label class="form-check-label" for="gridCheck">
                        Category Status (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-12">
                <label for="Descriptions" class="form-label">Descriptions:</label>
                <input type="text" class="form-control" name="catedesc" placeholder="Enter short description here....">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Upload Image:</label>
                <input type="file" class="form-control" name="cateimg">
            </div>
            <div class="col-md-6">
                <label for="metaTitle" class="form-label">Meta Title:</label>
                <input type="text" class="form-control" name="catemetatitle" placeholder="Enter meta title here...." reqired>
            </div>
            <div class="col-md-4">
                <label for="metaKeywords" class="form-label">Meta Keywords:</label>
                <input type="text" class="form-control" name="catekeywords" placeholder="Enter category keywords here...." reqired>
            </div>
            <div class="col-md-12">
                <label for="blogBody" class="form-label">Blog Body/Descriptions:</label>
                <textarea class="form-control" id="catbodydesc" name="catebody" cols="30" rows="10" placeholder="Enter blog description..."></textarea>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    </div>

</section>



<?php include "includes/footer.php" ?>