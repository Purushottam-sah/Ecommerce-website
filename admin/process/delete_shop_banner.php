<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $o_id = $_POST['o_id'];
    $o_image = "upload/shop_banner/" . $_POST['o_image'];

    // Delete the category from the database    
    $delete_banner_sql = "DELETE FROM offer_banner_db WHERE o_id='$o_id'";
    $delete_banner_sqlResult = mysqli_query($conn, $delete_banner_sql);

    if ($delete_banner_sqlResult) {
        // Delete the associated image file
        unlink($o_image);
        $_SESSION['message'] = "Shop Banner deleted successfully";
        header('location:../view_shop_banner.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete Shop Banner";
        header('location:../view_shop_banner.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid Shop Banner ID";
    header('location:../view_shop_banner.php?msg=5');
    exit();
}
?>