 <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include config.php to establish a database connection
        require_once("config.php");

        // Fetch and sanitize input data
        $cate_id = mysqli_real_escape_string($conn, $_POST['cate_id']);
        $cate_name = mysqli_real_escape_string($conn, $_POST['cate_name']);
        $cate_brand = mysqli_real_escape_string($conn, $_POST['cate_brand']);
        $cate_desc = mysqli_real_escape_string($conn, $_POST['cate_desc']);
        $cate_subcate = mysqli_real_escape_string($conn, $_POST['cate_subcate']);
        $cate_subcate1 = mysqli_real_escape_string($conn, $_POST['cate_subcate2']);
        $cate_subcate2 = mysqli_real_escape_string($conn, $_POST['cate_subcate3']);
        $cate_metatitle = mysqli_real_escape_string($conn, $_POST['cate_metatitle']);
        $cate_metakeyword = mysqli_real_escape_string($conn, $_POST['cate_metakeyword']);
        $cate_body = mysqli_real_escape_string($conn, $_POST['cate_body']);
        $cate_popular = isset($_POST['cate_popular']) ? 1 : 0;
        $cate_status = isset($_POST['cate_status']) ? 1 : 0;

        // Check if the file input is set
        $filename = $_FILES['cate_img']['name'];
        $tmp_name = $_FILES['cate_img']['tmp_name'];
        $size = $_FILES['cate_img']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/" . $filename;

        if (!empty($filename)) {

            if (in_array($img_ext, $allow_type)) {
                // Additional check for image size
                if ($size <= 2000000) {
                    // Remove the old image if it exists
                    $unlink = "upload/" . $_POST['old_cate_img'];
                    if (file_exists($unlink)) {
                        unlink($unlink);
                    }
                    // Move the new uploaded image to the destination
                    // Update the category in the database
                    move_uploaded_file($tmp_name, $destination);
                    $updatecatesql = "UPDATE categories_db SET 
                    cate_name='$cate_name', 
                    cate_slug_id='$cate_brand', 
                    cate_desc='$cate_desc', 
                    cate_status='$cate_status', 
                    cate_popular='$cate_popular', 
                    cate_metatitle='$cate_metatitle', 
                    cate_metadesc='$cate_body', 
                    cate_subcate='$cate_subcate', 
                    cate_subcate1='$cate_subcate1', 
                    cate_subcate2='$cate_subcate2', 
                    cate_img='$filename',
                    cate_metakeyword='$cate_metakeyword'
                    WHERE id='$cate_id'";

                    $updateResult = mysqli_query($conn, $updatecatesql);

                    if ($updateResult) {
                        // Redirect to viewcategory.php with a success message
                        $_SESSION['message'] = "Category updated successfully";
                        header('location:../viewcategory.php?msg=2');
                        exit();
                    } else {
                        // Redirect to viewcategory.php with an error message
                        $_SESSION['message'] = "Sorry, Failed to update category";
                        header('location:../viewcategory.php?msg=3');
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
            $updatecatesql = "UPDATE categories_db SET 
            cate_name='$cate_name', 
            cate_slug_id='$cate_brand', 
            cate_desc='$cate_desc', 
            cate_status='$cate_status', 
            cate_popular='$cate_popular', 
            cate_metatitle='$cate_metatitle', 
            cate_metadesc='$cate_body', 
            cate_subcate='$cate_subcate', 
            cate_subcate1='$cate_subcate1', 
            cate_subcate2='$cate_subcate2', 
            cate_metakeyword='$cate_metakeyword'
            WHERE id='$cate_id'";

            $updateResult = mysqli_query($conn, $updatecatesql);

            if ($updateResult) {
                // Redirect to viewcategory.php with a success message
                $_SESSION['message'] = "Category updated successfully";
                header('location:../viewcategory.php?msg=2');
                exit();
            } else {
                // Redirect to viewcategory.php with an error message
                $_SESSION['message'] = "Sorry, Failed to update category";
                header('location:../viewcategory.php?msg=3');
                exit();
            }
        }
    } else {
        // Redirect to viewcategory.php if the form is not submitted
        $_SESSION['message'] = "Database Error failed to update....";
        header('location:../viewcategory.php');
        exit();
    }
    ?>
