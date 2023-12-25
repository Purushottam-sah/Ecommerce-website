<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    require_once("config.php");
    $slider_id = mysqli_real_escape_string($conn, $_POST['slider_id']);
    $img_status = mysqli_real_escape_string($conn, isset($_POST['img_status']) ? '1' : '0');


    // Check if the file input is set
    $filename = $_FILES['slider_img']['name'];
    $tmp_name = $_FILES['slider_img']['tmp_name'];
    $size = $_FILES['slider_img']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/imageslider/" . $filename;


    if (!empty($filename)) {

        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Remove the old image if it exists
                $unlink = "upload/imageslider/" . $_GET['slider_img'];
                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the brand in the database
                move_uploaded_file($tmp_name, $destination);
                $updatebrand_sql = "UPDATE imageslider_db SET 
                    slider_1='$filename', 
                    s_status='$img_status'                   
                    WHERE s_id='$slider_id'";

                $updateResult = mysqli_query($conn, $updatebrand_sql);

                if ($updateResult) {
                    // Redirect to viewcategory.php with a success message
                    $_SESSION['message'] = "Slider updated successfully";
                    header('location:../viewslider.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewbrand.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update brand";
                    header('location:../viewslider.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../viewslider.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../viewslider.php");
            exit();
        }
    } else {
        $updatebrand_sql1 = "UPDATE imageslider_db SET 
                                                    s_status='$img_status'                   
                                                    WHERE s_id='$slider_id'";


        $updateResult = mysqli_query($conn, $updatebrand_sql1);

        if ($updateResult) {
            // Redirect to viewbrand.php with a success message
            $_SESSION['message'] = "slider updated successfully";
            header('location:../viewslider.php?msg=2');
            exit();
        } else {
            // Redirect to viewslider.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update slider";
            header('location:../viewslider.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to viewslider.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../viewslider.php');
    exit();
}
