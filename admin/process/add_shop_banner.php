<?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");
        $Banner_name = mysqli_real_escape_string($conn, $_POST['Banner_name']);
        $shop_status = isset($_POST['shop_status']) ? 1 : 0;
 


        $filename = $_FILES['shop_banner']['name'];
        $tmp_name = $_FILES['shop_banner']['tmp_name'];
        $size = $_FILES['shop_banner']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/shop_banner/" . $filename;

        // Additional check for valid image type
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Create the destination folder if it doesn't exist
                $destinationFolder = "upload/shop_banner/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }
                move_uploaded_file($tmp_name, $destination);

                $addoffersql = "INSERT INTO offer_banner_db (o_id, o_title, 
                o_image, o_status)
                VALUES (null, '$Banner_name', '$filename', '$shop_status')";

                $addquery = mysqli_query($conn, $addoffersql);

                // echo $addquery;

                if ($addquery) {
                    $_SESSION['message'] = 'Offer Banner added Successfull';
                    header("location:../shop_banner.php?msg=2");
                } else {
                    $_SESSION['message'] = 'Sorry, Offer Banner failed to add..';
                    header("location:../shop_banner.php?msg=3");
                }
            } else {
                $_SESSION['message'] = 'Image size is not greater than 2mb';
                header("location:../shop_banner.php");
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../shop_banner.php");
        }
    } else {
        header("location:../shop_banner.php?msg=1");
    }

    ?>
