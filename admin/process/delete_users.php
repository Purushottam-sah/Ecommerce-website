<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    $Users_id = $_POST['uid'];

  
    $delete_users_sql = "DELETE FROM registeruser_db WHERE uid='$Users_id'";
    $deleteCategoryResult = mysqli_query($conn, $delete_users_sql);

    if ($deleteCategoryResult) {

        $_SESSION['message'] = "Users deleted successfully";
        header('location:../manage_users.php?msg=4');
        exit();
    } else {
        $_SESSION['message'] = "Sorry, Failed to delete Users";
        header('location:../manage_users.php?msg=5');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid usersID";
    header('location:../manage_users.php?msg=5');
    exit();
}
