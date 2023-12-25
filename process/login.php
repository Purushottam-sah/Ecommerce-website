<?php
session_start();
// Check if the form is submitted
if (isset($_GET['submit'])) {
    // Define an array to store validation errors
    require_once("../admin/process/config.php");
    $uemail = mysqli_real_escape_string($conn, $_GET['email']);
    $upass = mysqli_real_escape_string($conn, $_GET['pass']);


    if (empty($uemail)) {
        header("location:../login.php?msg=2");
    } else {
        if (empty($upass)) {
            header("location:../login.php?msg=3");
        } else {
            // disply register user sql entry
            $loginsql = "SELECT * FROM registeruser_db WHERE uemail='$uemail'";
            $loginres = mysqli_query($conn, $loginsql);

            $loginresquery = mysqli_num_rows($loginres);

            if ($loginresquery > 0) {
                $row = mysqli_fetch_assoc($loginres);
                $passwo = $row['upass'];
                $uname = $row['uname'];
                $role_as = $row['role_as'];
                // echo $passwo;
                if ($upass == $passwo) {
                    $_SESSION['uemail'] = $uemail;
                    $_SESSION['uname'] = $uname;
                    $_SESSION['$role_as'] = $role_as;

                    if (  $_SESSION['$role_as'] == 1) {
                        $_SESSION['message'] = "You have logged in successfully!!";
                        header('location:../admin/admin.php');
                    } else {
                        header('location:../customer/customer_homepage.php?msg=1');
                    }
                    // echo $_SESSION['uname'];
                } else {
                    header("location:../login.php?msg=4");
                }
            }
            else{
                header("location:../login.php");
                $_SESSION['message']= "Email not found, Please register your account";
            }
        }
    }
} else {
    header("location:../login.php?msg=1");
}
