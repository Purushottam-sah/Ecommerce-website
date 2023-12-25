<?php include "includes/header.php";
require_once("process/config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
            <span>Update Categories:</span>
            <a href="viewcategory.php"><span><button class="btn btn-info">View Categories</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/updatecate.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="cid" class="form-label">Category Id:</label>
                    <input type="text" class="form-control" name="cate_id" value="<?php echo $_GET['id'] ?>" placeholder="" readonly>
                </div>
                <div class="col-md-6">
                    <label for="cName" class="form-label">Sub Category Name:</label>
                    <select class="form-select" aria-label="Default select example" name="cate_name" reqired>
                        <?php
                        require_once("process/config.php");
                        $display_subcate = "SELECT * FROM subcate_db";
                        $display_subcate_query = mysqli_query($conn, $display_subcate);
                        if ($display_subcate_query->num_rows > 0) {
                            while ($row = $display_subcate_query->fetch_assoc()) {
                                $selected = ($row['sub_id'] == $_GET['scatename_']) ? 'selected' : '';
                        ?>
                                <option value="<?= $row['sub_id'] ?>" <?= $selected ?>><?= $row['scate_name'] ?></option>
                        <?php
                            }
                        } else {
                            $_SESSION['message'] = "Error executing query:";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="sName" class="form-label">Child Category Name</label>
                    <select class="form-select" aria-label="Default select example" name="cate_subcate" reqired>
                        <?php
                        require_once("process/config.php");
                        $display_subcate = "SELECT * FROM child_cate_db";
                        $display_subcate_query = mysqli_query($conn, $display_subcate);
                        if ($display_subcate_query->num_rows > 0) {
                            while ($row = $display_subcate_query->fetch_assoc()) {
                                $selected = ($row['child_id'] == $_GET['csubcatename_']) ? 'selected' : '';
                        ?>
                                <option value="<?= $row['child_id'] ?>" <?= $selected ?>><?= $row['csubcate_name'] ?></option>
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
                    <input type="text" class="form-control" name="cate_subcate2" value="<?php echo $_GET['cate_subcate1'] ?>" placeholder="Enter sub-category name here....">
                </div>
                <div class="col-md-6">
                    <label for="sName" class="form-label">Sub-Category Name 3: <span class="optionalchoice">(Optional)</span></label>
                    <input type="text" class="form-control" name="cate_subcate3" value="<?php echo $_GET['cate_subcate2'] ?>" placeholder="Enter sub-category name here....">
                </div>
                <div class="col-md-6">

                    <label for="inputSlug" class="form-label">Brand:</label>
                    <select class="form-select" aria-label="Default select example" name="cate_brand">
                        <!-- Display Category from database -->
                        <?php
                        require_once("process/config.php");

                        $displaybrand = "SELECT * FROM brand_db";
                        $displaybrand_query = mysqli_query($conn, $displaybrand);

                        if ($displaybrand_query->num_rows > 0) {
                            while ($row = $displaybrand_query->fetch_assoc()) {
                                // Use the selected attribute to display the selected category
                                $selected = ($row['b_id'] == $_GET['cate_slug']) ? 'selected' : '';
                        ?>
                                <option value="<?= $row['b_id'] ?>" <?= $selected ?>><?= $row['b_name'] ?></option>
                        <?php
                            }
                        } else {
                            $_SESSION['message'] = "Error executing query:";
                        }
                        ?>
                        <!-- Display Category from database -->
                    </select>
                </div>

                <div class="col-12">
                    <label for="Descriptions" class="form-label">Descriptions:</label>
                    <input type="text" class="form-control" name="cate_desc" value="<?php echo $_GET['cate_desc'] ?>" placeholder="Enter short description here....">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Upload Image:</label>
                    <input type="file" class="form-control" name="cate_img">
                    <img src="process/upload/<?php echo ($_GET['cate_img']) ?>" alt="updateImg" height="100" width="160" class="my-3">
                </div>

                <div class="col-md-6">
                    <label for="metaTitle" class="form-label">Meta Title:</label>
                    <input type="text" class="form-control" name="cate_metatitle" value="<?php echo $_GET['cate_metatitle'] ?>" placeholder="Enter meta title here....">
                </div>
                <div class="col-md-4">
                    <label for="metaKeywords" class="form-label">Meta Keywords:</label>
                    <input type="text" class="form-control" name="cate_metakeyword" value="<?php echo $_GET['cate_metakeyword'] ?>" placeholder="Enter category keywords here....">
                </div>
                <div class="col-md-12">
                    <label for="blogBody" class="form-label">Blog Body/Descriptions:</label>
                    <textarea class="form-control" id="catbodydesc" name="cate_body" cols="30" rows="10" placeholder="Enter blog description..."><?php echo $_GET['cate_metadesc'] ?></textarea>
                </div>

                <div class="col-2 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="cate_popular" <?php echo ($_GET['cate_popular'] == '1') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Popular
                        </label>
                    </div>
                </div>
                <div class="col-2 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="cate_status" <?php echo ($_GET['cate_status'] == '1') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Status
                        </label>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
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