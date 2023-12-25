<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $s_id = $_POST['s_id'];
    $s_cateimg = "upload/subcate/" . $_POST['s_cateimg'];

    
    // Delete the category from the database    
    $delete_sub_cate = "DELETE FROM subcate_db WHERE id='$s_id'";
    $delete_subcate_result = mysqli_query($conn, $delete_sub_cate);
    
    if ($delete_subcate_result) {
        // Delete the associated image file
        unlink($s_cateimg);
        $_SESSION['message'] = "Sub Category deleted successfully";
        header('location:../view_subcategory.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete Sub category";
        header('location:../view_subcategory.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid category ID";
    header('location:../view_subcategory.php?msg=5');
    exit();
}
