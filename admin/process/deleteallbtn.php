<?php
require_once("config.php");
session_start();

if (isset($_POST['delete_multiple_btn'])) {
    $delete_ids = $_POST['delete_id'];

    if (!empty($delete_ids)) {
        // Sanitize and validate the IDs before using them in the query
        $sanitized_ids = array_map('intval', $delete_ids);
        $id_list = implode(',', $sanitized_ids);

        // Perform the deletion
        $delete_query = "DELETE FROM product_db WHERE p_id IN ($id_list)";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            $_SESSION['message'] = "Selected products deleted successfully.";
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['message'] = "Please select at least one product to delete.";
    }

    // Redirect back to the page after the deletion operation
    header("Location: ../viewproduct.php");
    exit();
} else {
    // Handle any other cases or redirects if needed
    header("Location: ../viewproduct.php");
    exit();
}
?>
