<?php
include "includes/header.php";
require_once "process/config.php";

if (!isset($_SESSION['uemail'])) {
    header("location:../home.php");
    exit();
}

include "includes/sidebar.php";
include "includes/navbar.php";

require_once 'process/config.php';

if (isset($_SESSION['message'])) :
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! </strong><?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<section id="mainContent">
    <div class="category-content">
        <div class="categories-Title my-4">
            <span>Add Slider:</span>
            <a href="viewslider.php">
                <span><button class="btn btn-info text-white">View Slider</button></span>
            </a>
        </div>
        <form class="row g-3 category-form" action="process/imageslider.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Banner Slider:</label>
                <input type="file" class="form-control" name="slider[]" multiple>
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="img_status">
                    <label class="form-check-label" for="gridCheck">
                        Category Status (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Slider</button>
            </div>
        </form>
    </div>
</section>

<?php include "includes/footer.php"; ?>