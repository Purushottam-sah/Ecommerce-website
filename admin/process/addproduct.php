 <?php
    session_start();
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation errors
        require_once("config.php");
        $productName = mysqli_real_escape_string($conn, $_POST['p_name']);
        $categoryId = mysqli_real_escape_string($conn, $_POST['category']);
        $productBrand = mysqli_real_escape_string($conn, $_POST['p_slug']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['p_price']);
        $productSmallDesc = mysqli_real_escape_string($conn, $_POST['p_smalldesc']);
        $productSalePrice = mysqli_real_escape_string($conn, $_POST['p_saleprice']);
        $isTrending = isset($_POST['p_trending']) ? 1 : 0;
        $productStatus = isset($_POST['p_status']) ? 1 : 0;
        $productQuantity = mysqli_real_escape_string($conn, $_POST['p_qty']);
        $productMetaTitle = mysqli_real_escape_string($conn, $_POST['p_metatitle']);
        $productMetaKeywords = mysqli_real_escape_string($conn, $_POST['p_metakyword']);
        $productDescription = mysqli_real_escape_string($conn, $_POST['p_desc']);
        $productmetadesc = mysqli_real_escape_string($conn, $_POST['p_metadesc']);


        $filename = $_FILES['p_image']['name'];
        $tmp_name = $_FILES['p_image']['tmp_name'];
        $size = $_FILES['p_image']['size'];
        $img_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg', 'jfif'];
        $destination = "upload/product/" . $filename;

        // Additional check for valid image type
        if (in_array($img_ext, $allow_type)) {
            // Additional check for image size
            if ($size <= 8000000) {
                // Create the destination folder if it doesn't exist
                $destinationFolder = "upload/product/";
                if (!file_exists($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }
                move_uploaded_file($tmp_name, $destination);

                $addproductsql = "INSERT INTO product_db (p_name, categories_id, 
                p_brand_id, p_price, p_smalldesc, p_saleprice, p_trending, p_status, 
                p_qty, p_metatitle, p_metakeyword, p_desc, p_image, p_metadesc)
                VALUES ('$productName', '$categoryId', '$productBrand', '$productPrice', '$productSmallDesc', 
                '$productSalePrice', '$isTrending', '$productStatus', '$productQuantity', '$productMetaTitle', 
                '$productMetaKeywords', '$productDescription', '$filename', '$productmetadesc')";

                $addquery = mysqli_query($conn, $addproductsql);

                // echo $addquery;

                if ($addquery) {
                    $_SESSION['message'] = 'Product added Successfull';
                    header("location:../addproduct.php?msg=2");
                } else {
                    $_SESSION['message'] = 'Sorry, Product failed to add..';
                    header("location:../addproduct.php?msg=3");
                }
            } else {
                $_SESSION['message'] = 'Image size is not greater than 2mb';
                header("location:../addproduct.php");
            }
        } else {
            $_SESSION['message'] = 'File type is not allowed';
            header("location:../addproduct.php");
        }
    } else {
        header("location:../addproduct.php?msg=1");
    }

    ?>
