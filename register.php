<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>
<div class="register-form">
    <div class="form-top">
        <span>Create your ABPHEcom Account</span>
        <span class="alreadyMember">Already member? <a href="login.php">Login here</a></span>
    </div>
    <form class="row g-3 registration-user" action="process/register.php" method="post" autocomplete="off">
        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']=='1'){
                echo '<h5 class="errorMsg">Please fill all the reqired field..</h5>';
            }
            else if($_GET['msg']=='2'){
                echo '<h5 class="errorMsg">Please fill your full name..</h5>';
            }
            else if($_GET['msg']=='3'){
                echo '<h5 class="errorMsg">Please fill your email address..</h5>';
            }
            else if($_GET['msg']=='4'){
                echo '<h5 class="errorMsg">Invalid email format..</h5>';
            }
            else if($_GET['msg']=='5'){
                echo '<h5 class="errorMsg">Please fill mobile number..</h5>';
            }
            else if($_GET['msg']=='6'){
                echo '<h5 class="errorMsg">Invalid phone number..</h5>';
            }
            else if($_GET['msg']=='7'){
                echo '<h5 class="errorMsg">Please enter your password..</h5>';
            }
            else if($_GET['msg']=='8'){
                echo '<h5 class="errorMsg">Password must be at least 6 characters and contain both letters and numbers..</h5>';
            }
            else if($_GET['msg']=='9'){
                echo '<h5 class="errorMsg">Conirm your password..</h5>';
            }
            else if($_GET['msg']=='10'){
                echo '<h5 class="errorMsg">Please agree to receive exclusive offers and promotions..</h5>';
            }
            else if($_GET['msg']=='11'){
                echo '<h5 class="errorMsg">Password doesnot match..</h5>';
            }
            else if($_GET['msg']=='12'){
                echo '<h5 class="errorMsg">Register failed..</h5>';
            }
            else if($_GET['msg']=='13'){
                echo '<h5 class="errorMsg">Email already exist..</h5>';
            }
        }
        
        ?>
        <div class="col-md-6">
            <label for="fullName" class="form-label">Full Name:</label>
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your first and last name">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email:</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter your email">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="9876543210" maxlength="10">
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="ucheck">
                <label class="form-check-label checkSlogan" for="gridCheck">
                    I'd like to receive exclusive offers and promotions via SMS
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password:</label>
            <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Minimum 6 characters with a letter and number">
        </div>
        <div class="col-md-6">
            <button type="submit" name="submit" class="btn btn-primary register-submit-btn">Sign Up</button>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Enter Confirm Password">
        </div>
        <div class="col-md-6 readpolicy">
            <span class="policyRegister">By clicking “SIGN UP”, I agree to ABPHEcomm's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></span>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6 googleLoginbtn">
            <div class="form-footer-option d-flex">
                <span class="optionLogin mb-4">Or, sign up with</span>
                <span class="otherloginoption d-flex">
                    <button class="btn btn-primary facebookLogin"><i class='bx bxl-facebook'></i><span>Facebook</span></button>
                    <button class="btn btn-danger googleLogin"><i class='bx bxl-google-plus'></i><span>Google</span></button>
                </span>
            </div>
        </div>


    </form>
</div>