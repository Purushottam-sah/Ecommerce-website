<?php
session_start();

include "config.php";

if (isset($_POST['submit'])) {

    $image_status = isset($_POST['img_status']) ? 1 : 0;

    $uploadedFiles = $_FILES['slider'];

    foreach ($uploadedFiles['name'] as $key => $filename) {
        $tmp_name = $uploadedFiles['tmp_name'][$key];
        $size = $uploadedFiles['size'][$key];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $allow_type = ['jpg', 'jprg', 'png', 'pdf', 'gif', 'jfif', 'AVI', 'mp4', 'WebM', 'MKV'];
        $destination = "upload/imageslider/" . $filename;

        if (in_array($img_ext, $allow_type)) {
            if ($size < 8000000) {
                $destinationFolder = "upload/imageslider/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }
                move_uploaded_file($tmp_name, $destination);

                $addslidersql = "INSERT INTO imageslider_db(s_id, slider_1, s_status) VALUES(null, '$filename', '$image_status')";
                $addslidersql_query = mysqli_query($conn, $addslidersql);

                if ($addslidersql_query) {
                    $_SESSION['message'] = 'Slider added Successfull';
                    header("location:../imageslider.php?");
                } else {
                    $_SESSION['message'] = 'Sorry, Slider failed to add..';
                    header("location:../imageslider.php?");
                }
            }
        }
    }
} else {
    $_SESSION['message'] = 'Connection Error..';
    header("location:../imageslider.php");
}
