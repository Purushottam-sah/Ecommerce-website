<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    require_once("config.php");
    $banner_id = mysqli_real_escape_string($conn, $_POST['banner_id']);
    $Banner_name = mysqli_real_escape_string($conn, $_POST['Banner_name']);
    $shop_status = mysqli_real_escape_string($conn, isset($_POST['shop_status']) ? '1' : '0');


    // Check if the file input is set
    $filename = $_FILES['shop_banner']['name'];
    $tmp_name = $_FILES['shop_banner']['tmp_name'];
    $size = $_FILES['shop_banner']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/shop_banner/" . $filename;


    if (!empty($filename)) {

        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Remove the old image if it exists
                $unlink = "upload/logo/" . $_GET['shop_banner'];
                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the brand in the database
                move_uploaded_file($tmp_name, $destination);
                $update_banner = "UPDATE offer_banner_db SET 
                   o_title='$Banner_name', 
                   o_status='$shop_status', 
                    o_image= '$filename'                
                    WHERE o_id='$banner_id'";

                $updateResult = mysqli_query($conn, $update_banner);

                if ($updateResult) {
                    // Redirect to viewcategory.php with a success message
                    $_SESSION['message'] = "Banner updated successfully";
                    header('location:../view_shop_banner.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewbrand.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update Banner";
                    header('location:../view_shop_banner.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../view_shop_banner.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../view_shop_banner.php");
            exit();
        }
    } else {
        $update_banner1= "UPDATE offer_banner_db SET 
        o_title='$Banner_name', 
        o_status='$shop_status'              
         WHERE o_id='$banner_id'";


        $updateResult = mysqli_query($conn, $update_banner1);

        if ($updateResult) {
            // Redirect to viewbrand.php with a success message
            $_SESSION['message'] = "Banner updated successfully";
            header('location:../view_shop_banner.php?msg=2');
            exit();
        } else {
            // Redirect to view_shop_banner.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update Banner";
            header('location:../view_shop_banner.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to view_shop_banner.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../view_shop_banner.php');
    exit();
}
