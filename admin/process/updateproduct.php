<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    // (Assuming $p_id is fetched from the form or database)
    $p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
    $productName = mysqli_real_escape_string($conn, $_POST['p_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $productBrand = mysqli_real_escape_string($conn, $_POST['productBrand']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['p_price']);
    $productSmallDesc = mysqli_real_escape_string($conn, $_POST['p_smalldesc']);
    $productSalePrice = mysqli_real_escape_string($conn, $_POST['p_saleprice']);
    $isTrending = isset($_POST['p_trending']) ? 1 : 0;
    $productStatus = isset($_POST['p_status']) ? 1 : 0;
    $productQuantity = mysqli_real_escape_string($conn, $_POST['p_qty']);
    $productMetaTitle = mysqli_real_escape_string($conn, $_POST['p_metatitle']);
    $productMetaKeywords = mysqli_real_escape_string($conn, $_POST['p_metakyword']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['p_desc']);
    $productmetadesc = mysqli_real_escape_string($conn, $_POST['p_metadesc']);

    // Check if the file input is set
    $filename = $_FILES['p_image']['name'];
    $tmp_name = $_FILES['p_image']['tmp_name'];
    $size = $_FILES['p_image']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/product/" . $filename;

    if (!empty($filename)) {
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 2000000) {
                // Remove the old image if it exists
                $unlink = "upload/product/" . $_GET['p_image'];

                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the product in the database
                move_uploaded_file($tmp_name, $destination);
                $updateproductsql1 = "UPDATE product_db SET 
               categories_id = '$category',
                p_name = '$productName',
                p_smalldesc = '$productSmallDesc',
                p_brand_id = '$productBrand',
                p_desc = '$productDescription',
                p_price = '$productPrice',
                p_saleprice = '$productSalePrice',
                p_qty = '$productQuantity',
                p_status = '$productStatus',
                p_trending = '$isTrending',
                p_metatitle = '$productMetaTitle',
                p_metakeyword = '$productMetaKeywords',
                p_metadesc = '$productmetadesc',
                p_image = '$filename'
                WHERE p_id='$p_id'";


                $updateResult = mysqli_query($conn, $updateproductsql1);

                if ($updateResult) {
                    // Redirect to viewproduct.php with a success message
                    $_SESSION['message'] = "Product updated successfully";
                    header('location:../viewproduct.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewproduct.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update product";
                    header('location:../viewproduct.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../addcategories.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../addcategories.php");
            exit();
        }
    } else {
        // If no new image is uploaded, update product without changing the image
        $updateproductsql = "UPDATE product_db SET 
    categories_id = '$category',
    p_name = '$productName',
    p_smalldesc = '$productSmallDesc',
    p_brand_id = '$productBrand',
    p_desc = '$productDescription',
    p_price = '$productPrice',
    p_saleprice = '$productSalePrice',
    p_qty = '$productQuantity',
    p_status = '$productStatus',
    p_trending = '$isTrending',
    p_metatitle = '$productMetaTitle',
    p_metakeyword = '$productMetaKeywords',
    p_metadesc = '$productmetadesc'
    WHERE p_id='$p_id'";


        $updateResult = mysqli_query($conn, $updateproductsql);

        if ($updateResult) {
            // Redirect to viewproduct.php with a success message
            $_SESSION['message'] = "Product updated successfully";
            header('location:../viewproduct.php?msg=2');
            exit();
        } else {
            // Redirect to viewproduct.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update product";
            header('location:../viewproduct.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to viewproduct.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../viewproduct.php');
    exit();
}
