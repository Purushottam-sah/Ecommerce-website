<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $cate_id = $_POST['cat_id'];
    $cate_img = "upload/" . $_POST['cat_img'];

    // Delete the category from the database    
    $deleteCategorySql = "DELETE FROM categories_db WHERE id='$cate_id'";
    $deleteCategoryResult = mysqli_query($conn, $deleteCategorySql);

    if ($deleteCategoryResult) {
        // Delete the associated image file
        unlink($cate_img);
        $_SESSION['message'] = "Category deleted successfully";
        header('location:../viewcategory.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete category";
        header('location:../viewcategory.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid category ID";
    header('location:../viewcategory.php?msg=5');
    exit();
}
