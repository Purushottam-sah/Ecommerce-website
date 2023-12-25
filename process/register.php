<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define an array to store validation errors
    require_once("../admin/process/config.php");
    $uname = mysqli_real_escape_string($conn, $_POST['fullName']);
    $uemail = mysqli_real_escape_string($conn, $_POST['email']);
    $uphone = mysqli_real_escape_string($conn, $_POST['phone']);
    $upass = mysqli_real_escape_string($conn, $_POST['pass']);
    $ucpass = mysqli_real_escape_string($conn, $_POST['cpass']);
    $ucheck = mysqli_real_escape_string($conn, $_POST['ucheck']);

    if (empty($uname)) {
        header("location:../register.php?msg=2");
    } else {
        if (empty($uemail)) {
            header("location:../register.php?msg=3");
        } else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                header("location:../register.php?msg=4");
            } else {
                if (empty($uphone)) {
                    header("location:../register.php?msg=5");
                } else {
                    if (empty($upass)) {
                        header("location:../register.php?msg=7");
                    } else {
                        if ((strlen($_POST["pass"]) < 6 || !preg_match("/[A-Za-z]/", $_POST["pass"]) || !preg_match("/[0-9]/", $_POST["pass"]))) {
                            header("location:../register.php?msg=8");
                        } else {
                            if (empty($ucpass)) {
                                header("location:../register.php?msg=9");
                            } else {
                                if (empty($ucheck)) {
                                    header("location:../register.php?msg=10");
                                } else {
                                    if ($upass != $ucpass) {
                                        header("location:../register.php?msg=11");
                                    } else {
                                        $checkemail = "SELECT uemail FROM registeruser_db WHERE uemail='$uemail'";
                                        $checkemail_res = mysqli_query($conn, $checkemail);
                                        if (mysqli_num_rows($checkemail_res) > 0) {
                                            header("location:../register.php?msg=13");
                                        } else {
                                            // Add user sql entry
                                            $addusersql = "INSERT INTO registeruser_db(uid, uname, uemail, uphone, upass) VALUES(null, '$uname', '$uemail', '$uphone', '$upass')";
                                            $adduserres = mysqli_query($conn, $addusersql);
                                            if ($adduserres) {
                                                $_SESSION['message'] = "Your account is created successfully!!";
                                                header("location:../login.php");
                                            } else {
                                                header("location:../register.php?msg=12");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location:../register.php?msg=1");
}

?>
// Add user sql entry
$addusersql = "INSERT INTO registeruser_db(uid, uname, uemail, uphone, upass) VALUES(null, '$uname', '$uemail', '$uphone', '$upass')";
$adduserres = mysqli_query($conn, $addusersql);
if($adduserres){
header("location:../login.php");
}
else{
header("location:../register.php?msg=12");
}