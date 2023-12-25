<?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");
        $brand_name = mysqli_real_escape_string($conn, $_POST['b_name']);
        $brand_desc = mysqli_real_escape_string($conn, $_POST['b_metadesc']);
        $brand_status= mysqli_real_escape_string($conn, isset($_POST['b_status']) ? '1' : '0');

        $filename = $_FILES['b_image']['name'];
        $tmp_name = $_FILES['b_image']['tmp_name'];
        $size = $_FILES['b_image']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/brand/" . $filename;

       // Additional check for valid image type
       if (in_array($img_ext, $allow_type)) {
        // Additional check for image size
        if ($size <= 2000000) {
            // Create the destination folder if it doesn't exist
            $destinationFolder = "upload/brand/";
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            move_uploaded_file($tmp_name, $destination);

            $addbrandsql = "INSERT INTO brand_db(b_id, b_name, b_image, b_metadesc, b_status) 
            VALUES(null, '$brand_name', '$filename', '$brand_desc', '$brand_status')";
            $addquery = $conn->query($addbrandsql);

            // echo $addquery;

            if ($addquery) {
                $_SESSION['message'] = 'Brand added Successfull';
                header("location:../addbrand.php?msg=2");
            } else {
                $_SESSION['message'] = 'Sorry, Category failed to add..';
                header("location:../addbrand.php?msg=3");
            }
        } else {
            $_SESSION['message'] = 'Image size is not greater than 2mb';
            header("location:../addbrand.php");
        }
    } else {
        $_SESSION['message'] = 'File type is not allowed';
        header("location:../addbrand.php");
    }
} else {
    header("location:../addbrand.php?msg=1");
}

?>
