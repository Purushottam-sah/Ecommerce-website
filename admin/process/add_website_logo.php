<?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");
        $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
        $logo_status = isset($_POST['logo_status']) ? 1 : 0;
 


        $filename = $_FILES['logo_img']['name'];
        $tmp_name = $_FILES['logo_img']['tmp_name'];
        $size = $_FILES['logo_img']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/logo/" . $filename;

        // Additional check for valid image type
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Create the destination folder if it doesn't exist
                $destinationFolder = "upload/logo/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }
                move_uploaded_file($tmp_name, $destination);

                $addlogosql = "INSERT INTO logo_db (logo_id, logo_wname, 
                logo_status, logo_img)
                VALUES (null, '$website_name', '$logo_status', '$filename')";

                $addquery = mysqli_query($conn, $addlogosql);

                // echo $addquery;

                if ($addquery) {
                    $_SESSION['message'] = 'Website Logo added Successfull';
                    header("location:../add_logo.php?msg=2");
                } else {
                    $_SESSION['message'] = 'Sorry, Website Logo failed to add..';
                    header("location:../add_logo.php?msg=3");
                }
            } else {
                $_SESSION['message'] = 'Image size is not greater than 2mb';
                header("location:../add_logo.php");
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../add_logo.php");
        }
    } else {
        header("location:../add_logo.php?msg=1");
    }

    ?>
