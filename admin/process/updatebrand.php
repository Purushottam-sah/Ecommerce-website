<?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include config.php to establish a database connection
        require_once("config.php");

        // Fetch and sanitize input data
        require_once("config.php");
        $brand_id = mysqli_real_escape_string($conn, $_POST['b_id']);
        $brand_name = mysqli_real_escape_string($conn, $_POST['b_name']);
        $brand_desc = mysqli_real_escape_string($conn, $_POST['b_metadesc']);
        $brand_status= mysqli_real_escape_string($conn, isset($_POST['b_status']) ? '1' : '0');


        // Check if the file input is set
        $filename = $_FILES['b_image']['name'];
        $tmp_name = $_FILES['b_image']['tmp_name'];
        $size = $_FILES['b_image']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/brand/" . $filename;


        if (!empty($filename)) {

            if (in_array($img_ext, $allow_type)) {
                // Additional check for image size
                if ($size <= 8000000) {
                    // Remove the old image if it exists
                    $unlink = "upload/brand/" . $_GET['b_image'];
                    if (file_exists($unlink)) {
                        unlink($unlink);
                    }
                    // Move the new uploaded image to the destination
                    // Update the brand in the database
                    move_uploaded_file($tmp_name, $destination);
                    $updatebrand_sql = "UPDATE brand_db SET 
                    b_name='$brand_name', 
                    b_image='$filename', 
                    b_metadesc='$brand_desc', 
                    b_status='$brand_status'                   
                    WHERE b_id='$brand_id'";

                    $updateResult = mysqli_query($conn, $updatebrand_sql);

                    if ($updateResult) {
                        // Redirect to viewcategory.php with a success message
                        $_SESSION['message'] = "Brand updated successfully";
                        header('location:../viewbrand.php?msg=2');
                        exit();
                    } else {
                        // Redirect to viewbrand.php with an error message
                        $_SESSION['message'] = "Sorry, Failed to update brand";
                        header('location:../viewbrand.php?msg=3');
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
            $updatebrand_sql1 = "UPDATE brand_db SET 
            b_name='$brand_name',  
            b_metadesc='$brand_desc', 
            b_status='$brand_status'                   
            WHERE b_id='$brand_id'";

            $updateResult = mysqli_query($conn, $updatebrand_sql1);

            if ($updateResult) {
                // Redirect to viewbrand.php with a success message
                $_SESSION['message'] = "brand updated successfully";
                header('location:../viewbrand.php?msg=2');
                exit();
            } else {
                // Redirect to viewbrand.php with an error message
                $_SESSION['message'] = "Sorry, Failed to update brand";
                header('location:../viewbrand.php?msg=3');
                exit();
            }
        }
    } else {
        // Redirect to viewbrand.php if the form is not submitted
        $_SESSION['message'] = "Database Error failed to update....";
        header('location:../viewbrand.php');
        exit();
    }
    ?>
