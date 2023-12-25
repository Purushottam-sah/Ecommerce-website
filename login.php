<?php
session_start();
require_once("admin/process/config.php");
if (isset($_SESSION['uemail'])) {
    header("location:admin/admin.php");
    exit();
}
?>


<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>
<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! </strong><?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>

<div class="login-form">
    <div class="form-top">
        <span>Welcome to ABPHEcom! Please login.</span>
        <span class="alreadyMember">New member? <a href="register.php">Register here</a></span>
    </div>
    <form class="row g-3 login-user" action="process/login.php" method="get" autocomplete="off">

        <?php
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == '1') {
                echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
            } else if ($_GET['msg'] == '2') {
                echo "<h5 class='errorMsg'>You can't leave email field empty</h5>";
            } else if ($_GET['msg'] == '3') {
                echo "<h5 class='errorMsg'>You can't leave password field empty</h5>";
            } else if ($_GET['msg'] == '4') {
                echo "<h5 class='errorMsg'>Invald email or password</h5>";
            }
        }
        ?>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email:</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter your email">
        </div>
        <div class="col-md-6">
            <button type="submit" name="submit" class="btn btn-primary register-sign-btn">Sign in</button>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password:</label>
            <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Minimum 6 characters with a letter and number">
            <span class="form-reset-password float-right"><a href="reset.php">Reset Your Password</a></span>
        </div>
        <div class="col-md-6">
            <div class="form-footer-option-login d-flex">
                <span class="optionLogin mb-4">Or, Login with</span>
                <span class="otherloginoption d-flex">
                    <button class="btn btn-primary facebookLogin"><i class='bx bxl-facebook'></i><span>Facebook</span></button>
                    <button class="btn btn-danger googleLogin"><i class='bx bxl-google-plus'></i><span>Google</span></button>
                </span>
            </div>
        </div>
    </form>
</div>
