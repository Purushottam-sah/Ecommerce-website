<?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");

        $csubcate_name = mysqli_real_escape_string($conn, $_POST['csubcate_name']);
        $c_catedesc = mysqli_real_escape_string($conn, $_POST['c_catedesc']);
        $c_catestatus= mysqli_real_escape_string($conn, isset($_POST['c_catestatus']) ? '1' : '0');
        $c_catepopular= mysqli_real_escape_string($conn, isset($_POST['c_catepopular']) ? '1' : '0');

        // Check if the category name already exists
        $check_query = "SELECT * FROM child_cate_db WHERE csubcate_name = '$csubcate_name'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $_SESSION['message'] = 'Category with the same name already exists.';
            header("location:../add_child_subcate.php");
            exit(); // Stop further execution
        }

        $filename = $_FILES['c_cateimg']['name'];
        $tmp_name = $_FILES['c_cateimg']['tmp_name'];
        $size = $_FILES['c_cateimg']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/childcategory/" . $filename;

        // Additional check for valid image type
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 2000000) {
                // Create the destination folder if it doesn't exist
                $destinationFolder = "upload/childcategory/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }

                move_uploaded_file($tmp_name, $destination);

                $add_child_subcate_sql = "INSERT INTO child_cate_db(child_id, csubcate_name, c_catedesc, c_cateimg, c_catestatus, c_catepopular) 
                VALUES(null, '$csubcate_name', '$c_catedesc', '$filename', '$c_catestatus', '$c_catepopular')";
                $addquery = $conn->query($add_child_subcate_sql);

                if ($addquery) {
                    $_SESSION['message'] = 'Child Sub-category added successfully';
                    header("location:../add_child_subcate.php?msg=2");
                } else {
                    $_SESSION['message'] = 'Sorry, Child Sub-Category failed to add..';
                    header("location:../add_child_subcate.php?msg=3");
                }
            } else {
                $_SESSION['message'] = 'Image size is not greater than 2mb';
                header("location:../add_child_subcate.php");
            }
        } else {
            $_SESSION['message'] = 'Child Category File type is not allowed';
            header("location:../add_child_subcate.php");
        }
    } else {
        header("location:../add_child_subcate.php?msg=1");
    }
?>
