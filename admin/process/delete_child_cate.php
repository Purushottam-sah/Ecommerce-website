<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $c_id = $_POST['c_id'];
    $c_cateimage = "upload/childcategory/" . $_POST['c_cateimage'];

    
    // Delete the category from the database    
    $delete_child_cate = "DELETE FROM child_cate_db WHERE child_id='$c_id'";
    $delete_child_result = mysqli_query($conn, $delete_child_cate);
    
    if ($delete_child_result) {
        // Delete the associated image file
        unlink($c_cateimage);
        $_SESSION['message'] = "Child Category deleted successfully";
        header('location:../view_child_category.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete Child category";
        header('location:../view_child_category.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid category ID";
    header('location:../view_child_category.php?msg=5');
    exit();
}
