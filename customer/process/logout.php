<?php
require_once("../../admin/process/config.php");
session_start();
$_SESSION['uemail'] = "";
$_SESSION['uname'] = "";
header("location:../../home.php?msg=1");
session_destroy();
// exit();
?>
