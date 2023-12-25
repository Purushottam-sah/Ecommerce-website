<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    require_once("config.php");
    $child_id = mysqli_real_escape_string($conn, $_POST['child_id']);
    $csubcate_name = mysqli_real_escape_string($conn, $_POST['csubcate_name']);
    $c_catedesc = mysqli_real_escape_string($conn, $_POST['c_catedesc']);
    $c_catepopular = mysqli_real_escape_string($conn, isset($_POST['c_catepopular']) ? '1' : '0');
    $c_catestatus = mysqli_real_escape_string($conn, isset($_POST['c_catestatus']) ? '1' : '0');


    // Check if the file input is set
    $filename = $_FILES['c_cateimage']['name'];
    $tmp_name = $_FILES['c_cateimage']['tmp_name'];
    $size = $_FILES['c_cateimage']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/childcategory/" . $filename;


    if (!empty($filename)) {

        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Remove the old image if it exists
                $unlink = "upload/childcategory/" . $_GET['c_cateimage'];
                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the brand in the database
                move_uploaded_file($tmp_name, $destination);
                $update_child = "UPDATE child_cate_db SET 
                    csubcate_name='$csubcate_name', 
                    c_catedesc = '$c_catedesc',
                    c_catestatus='$c_catestatus', 
                    c_catestatus='$c_catepopular', 
                    c_cateimg= '$filename'                
                    WHERE child_id='$child_id'";

                $updateResult = mysqli_query($conn, $update_child);

                if ($updateResult) {
                    // Redirect to viewcategory.php with a success message
                    $_SESSION['message'] = "Child Category updated successfully";
                    header('location:../view_child_category.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewbrand.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update brand";
                    header('location:../view_child_category.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../view_child_category.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../view_child_category.php");
            exit();
        }
    } else {
        $update_logo1 = "UPDATE child_cate_db SET 
                    csubcate_name='$csubcate_name', 
                    c_catedesc = '$c_catedesc',
                    c_catestatus='$c_catestatus', 
                    c_catestatus='$c_catepopular'              
                    WHERE child_id='$child_id'";


        $updateResult = mysqli_query($conn, $update_logo1);

        if ($updateResult) {
            // Redirect to viewbrand.php with a success message
            $_SESSION['message'] = "Child Category updated successfully";
            header('location:../view_child_category.php?msg=2');
            exit();
        } else {
            // Redirect to view_child_category.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update Child Category";
            header('location:../view_child_category.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to view_child_category.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../view_child_category.php');
    exit();
}
