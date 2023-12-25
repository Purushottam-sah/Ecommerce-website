<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include config.php to establish a database connection
    require_once("config.php");

    // Fetch and sanitize input data
    require_once("config.php");
    $child_id = mysqli_real_escape_string($conn, $_POST['ids']);
    $csubcate_name = mysqli_real_escape_string($conn, $_POST['scate_names']);
    $c_catedesc = mysqli_real_escape_string($conn, $_POST['c_catedescs']);
    $c_catepopular = mysqli_real_escape_string($conn, isset($_POST['s_catepopulars']) ? '1' : '0');
    $c_catestatus = mysqli_real_escape_string($conn, isset($_POST['s_catestatuss']) ? '1' : '0');


    // Check if the file input is set
    $filename = $_FILES['s_cateimgs']['name'];
    $tmp_name = $_FILES['s_cateimgs']['tmp_name'];
    $size = $_FILES['s_cateimgs']['size'];
    $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
    $destination = "upload/subcate/" . $filename;


    if (!empty($filename)) {

        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Remove the old image if it exists
                $unlink = "upload/subcate/" . $_POST['s_cateimgs'];
                if (file_exists($unlink)) {
                    unlink($unlink);
                }
                // Move the new uploaded image to the destination
                // Update the brand in the database
                move_uploaded_file($tmp_name, $destination);
                $update_child = "UPDATE subcate_db SET 
                    scate_name='$csubcate_name', 
                    c_catedesc = '$c_catedesc',
                    s_catestatus='$c_catestatus', 
                    s_catestatus='$c_catepopular', 
                    s_cateimg= '$filename'                
                    WHERE sub_id='$child_id'";

                $updateResult = mysqli_query($conn, $update_child);

                if ($updateResult) {
                    // Redirect to viewcategory.php with a success message
                    $_SESSION['message'] = "Sub Category updated successfully";
                    header('location:../view_subcategory.php?msg=2');
                    exit();
                } else {
                    // Redirect to viewbrand.php with an error message
                    $_SESSION['message'] = "Sorry, Failed to update Sub category";
                    header('location:../view_subcategory.php?msg=3');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'File size is too large';
                header("location:../view_subcategory.php");
                exit();
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../view_subcategory.php");
            exit();
        }
    } else {
        $update_logo1 = "UPDATE subcate_db SET 
                  scate_name='$csubcate_name', 
                    c_catedesc = '$c_catedesc',
                    s_catestatus='$c_catestatus', 
                    s_catestatus='$c_catepopular'          
                    WHERE sub_id='$child_id'";


        $updateResult = mysqli_query($conn, $update_logo1);

        if ($updateResult) {
            // Redirect to viewbrand.php with a success message
            $_SESSION['message'] = "Sub-Category updated successfully";
            header('location:../view_subcategory.php?msg=2');
            exit();
        } else {
            // Redirect to view_subcategory.php with an error message
            $_SESSION['message'] = "Sorry, Failed to update Sub-Category";
            header('location:../view_subcategory.php?msg=3');
            exit();
        }
    }
} else {
    // Redirect to view_subcategory.php if the form is not submitted
    $_SESSION['message'] = "Database Error failed to update....";
    header('location:../view_subcategory.php');
    exit();
}
