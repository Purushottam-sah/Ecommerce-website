<?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");
        $id = 'Prod';
        $catename = mysqli_real_escape_string($conn, $_POST['catename']);
        $cateslug = mysqli_real_escape_string($conn, $_POST['cateslug']);
        $catedesc = mysqli_real_escape_string($conn, $_POST['catedesc']);
        $catemetatitle = mysqli_real_escape_string($conn, $_POST['catemetatitle']);
        $catekeywords = mysqli_real_escape_string($conn, $_POST['catekeywords']);
        $catebody = mysqli_real_escape_string($conn, $_POST['catebody']);
        $scatename = mysqli_real_escape_string($conn, $_POST['scatename']);
        $scatename2 = mysqli_real_escape_string($conn, $_POST['scatename2']);
        $scatename3 = mysqli_real_escape_string($conn, $_POST['scatename3']);
        $catepopular = mysqli_real_escape_string($conn, isset($_POST['catepopular']) ? '1' : '0');
        $catestatus = mysqli_real_escape_string($conn, isset($_POST['catestatus']) ? '1' : '0');

        $filename = $_FILES['cateimg']['name'];
        $tmp_name = $_FILES['cateimg']['tmp_name'];
        $size = $_FILES['cateimg']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/" . $filename;

       // Additional check for valid image type
       if (in_array($img_ext, $allow_type)) {
        // Additional check for image size
        if ($size <= 2000000) {
            // Create the destination folder if it doesn't exist
            $destinationFolder = "upload/";
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            move_uploaded_file($tmp_name, $destination);



            $addcatesql = "INSERT INTO categories_db(id, cate_name, cate_slug_id, cate_desc, cate_status, cate_popular, cate_img, cate_metatitle, cate_metadesc, cate_metakeyword, cate_subcate, cate_subcate1, cate_subcate2) 
            VALUES('$id', '$catename', '$cateslug', '$catedesc', '$catestatus', ' $catepopular', '$filename', '$catemetatitle', '$catebody', ' $catekeywords', '$scatename', '$scatename2', '$scatename3')";
            $addquery = $conn->query($addcatesql);

            // echo $addquery;

            if ($addquery) {
                $_SESSION['message'] = 'Categories added Successfull';
                header("location:../addcategories.php?msg=2");
            } else {
                $_SESSION['message'] = 'Sorry, Category failed to add..';
                header("location:../addcategories.php?msg=3");
            }
        } else {
            $_SESSION['message'] = 'Image size is not greater than 2mb';
            header("location:../addcategories.php");
        }
    } else {
        $_SESSION['message'] = 'File type is not allowed';
        header("location:../addcategories.php");
    }
} else {
    header("location:../addcategories.php?msg=1");
}

?>
