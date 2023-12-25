<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    require_once("config.php");
    $logoid = mysqli_real_escape_string($conn, $_POST['logoid']);
    $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
    $logo_status = mysqli_real_escape_string($conn, isset($_POST['logo_status']) ? '1' : '0');


    // Check if the file input is set
    $filename = $_FILES['logo_img']['name'];
    $tmp_name = $_FILES['logo_img']['tmp_name'];
    $size = $_FILES['logo_img']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/logo/" . $filename;


    if (!empty($filename)) {

        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Remove the old image if it exists
                $unlink = "upload/logo/" . $_GET['logo_img'];
                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the brand in the database
                move_uploaded_file($tmp_name, $destination);
                $update_logo = "UPDATE logo_db SET 
                    logo_wname='$website_name', 
                    logo_status='$logo_status', 
                    logo_img= '$filename'                
                    WHERE logo_id='$logoid'";

                $updateResult = mysqli_query($conn, $update_logo);

                if ($updateResult) {
                    // Redirect to viewcategory.php with a success message
                    $_SESSION['message'] = "Slider updated successfully";
                    header('location:../view_logo.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewbrand.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update brand";
                    header('location:../view_logo.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../view_logo.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../view_logo.php");
            exit();
        }
    } else {
        $update_logo1 = "UPDATE logo_db SET 
                                                  logo_wname='$website_name', 
                    logo_status='$logo_status'                
                    WHERE logo_id='$logoid'";


        $updateResult = mysqli_query($conn, $update_logo1);

        if ($updateResult) {
            // Redirect to viewbrand.php with a success message
            $_SESSION['message'] = "slider updated successfully";
            header('location:../view_logo.php?msg=2');
            exit();
        } else {
            // Redirect to view_logo.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update slider";
            header('location:../view_logo.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to view_logo.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../view_logo.php');
    exit();
}
