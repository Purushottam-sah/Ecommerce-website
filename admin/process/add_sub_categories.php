<?php
    session_start();
    require_once("config.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $scate_name = mysqli_real_escape_string($conn, $_POST['scate_name']);
        $c_catedesc = mysqli_real_escape_string($conn, $_POST['c_catedesc']);
        $s_catestatus = mysqli_real_escape_string($conn, isset($_POST['s_catestatus']) ? '1' : '0');
        $s_catepopular = mysqli_real_escape_string($conn, isset($_POST['s_catepopular']) ? '1' : '0');

        // Check if the category name already exists
        $check_query = "SELECT * FROM subcate_db WHERE scate_name = '$scate_name'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            // Category name already exists
            $_SESSION['message'] = 'Category with the same name already exists.';
            header("location:../add_subcategory.php?msg=4");
            exit();
        }

        $filename = $_FILES['s_cateimg']['name'];
        $tmp_name = $_FILES['s_cateimg']['tmp_name'];
        $size = $_FILES['s_cateimg']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/subcate/" . $filename;

        // Additional check for valid image type
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 2000000) {
                // Create the destination folder if it doesn't exist
                $destinationFolder = "upload/subcate/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }

                move_uploaded_file($tmp_name, $destination);

                $add_subcate_sql = "INSERT INTO subcate_db(sub_id, scate_name, c_catedesc, s_cateimg, s_catestatus, s_catepopular) 
                VALUES(null, '$scate_name', '$c_catedesc', '$filename', '$s_catestatus', '$s_catepopular')";
                $addquery = $conn->query($add_subcate_sql);

                if ($addquery) {
                    $_SESSION['message'] = 'Sub-category added successfully';
                    header("location:../add_subcategory.php?msg=2");
                } else {
                    $_SESSION['message'] = 'Sorry, Category failed to add..';
                    header("location:../add_subcategory.php?msg=3");
                }
            } else {
                $_SESSION['message'] = 'Image size is not greater than 2mb';
                header("location:../add_subcategory.php");
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../add_subcategory.php");
        }
    } else {
        header("location:../add_subcategory.php?msg=1");
    }
?>
