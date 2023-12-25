<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $p_id = $_POST['p_id'];
    $p_image = "upload/product/" . $_POST['p_image'];

    // Delete the category from the database    
    $deleteproductsql = "DELETE FROM product_db WHERE p_id='$p_id'";
    $deleteproductsqlResult = mysqli_query($conn, $deleteproductsql);

    if ($deleteproductsqlResult) {
        // Delete the associated image file
        unlink($p_image);
        $_SESSION['message'] = "Product deleted successfully";
        header('location:../viewproduct.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete product";
        header('location:../viewproduct.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid product ID";
    header('location:../viewproduct.php?msg=5');
    exit();
}
?>
