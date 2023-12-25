<?php

if (isset($_SESSION['uemail'])) {
    if ($_SESSION['$role_as'] != 1) {
        $_SESSION['message'] = "You are not authorized to access this page..";
        header("location:../admin.php");
    }
} else {
    $_SESSION['message'] = "Login to continue..";
    header("location:../../login.php");
}
