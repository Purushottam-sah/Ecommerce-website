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
            <span>Add Website Logo:</span>
            <a href="view_logo.php">
                <span><button class="btn btn-info text-white">View Logo</button></span>
            </a>
        </div>
        <form class="row g-3 category-form" action="process/add_website_logo.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="col-4">
                <label for="inputAddress2" class="form-label">Website Name:</label>
                <input type="text" class="form-control" name="website_name" placeholder="Add Website New Name....">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Website Logo:</label>
                <input type="file" class="form-control" name="logo_img">
            </div>
            <div class="col-3 mt-4">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="logo_status">
                    <label class="form-check-label" for="gridCheck">
                        Category Status (Tick to Active)
                    </label>
                </div>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Logo</button>
            </div>
        </form>
    </div>
</section>

<?php include "includes/footer.php"; ?>