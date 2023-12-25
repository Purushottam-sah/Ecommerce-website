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
            <span>Update Logo:</span>
            <a href="view_logo.php"><span><button class="btn btn-info">View logo</button></span></a>
            <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
            <form class="row g-3 category-form" action="process/update_logo.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="col-6">
                    <label for="logoId" class="form-label">Logo ID::</label>
                    <input type="text" class="form-control" name="logoid" value="<?= $_GET['id'] ?>" placeholder="Add Website New Name...." readonly>
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Website Name:</label>
                    <input type="text" class="form-control" name="website_name" value="<?= $_GET['w_name_'] ?>" placeholder="Add Website New Name....">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Website Logo:</label>
                    <input type="file" class="form-control" name="logo_img">
                    <img src="process/upload/logo/<?= $_GET['logo_image'] ?>" alt="updatelogo_img" width="180" height="70" class="mt-4 border px-2 py-2">
                </div>

                <div class="col-3 mt-4">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="logo_status" <?= $_GET['logo_status'] == '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Category Status (Tick to Active)
                        </label>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Logo</button>
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