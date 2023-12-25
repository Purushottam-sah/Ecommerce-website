<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $logo_id = $_POST['logo_id'];
    $logo_img = "upload/logo/" . $_POST['logo_img'];

    // Delete the category from the database    
    $deletelogosql = "DELETE FROM logo_db WHERE logo_id='$logo_id'";
    $deleteCategoryResult = mysqli_query($conn, $deletelogosql);

    if ($deleteCategoryResult) {
        // Delete the associated image file
        unlink($logo_img);
        $_SESSION['message'] = "Logo deleted successfully";
        header('location:../view_logo.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete category";
        header('location:../view_logo.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid category ID";
    header('location:../view_logo.php?msg=5');
    exit();
}
