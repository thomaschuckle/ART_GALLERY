<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

// User Registration
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $billingaddress = $_POST['billingaddress'];
    $shippingaddress = $_POST['shippingaddress'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password !== $confirmpassword) {
        $error_msg = "Password and Confirm Password do not match!";
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $error_msg = "Email already exists!";
        } else {
            // Insert new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, contactNo, billingAddress, shippingAddress, password) VALUES (:name, :email, :contactno, :billingaddress, :shippingaddress, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contactno', $contactno);
            $stmt->bindParam(':billingAddress', $billingaddress);
            $stmt->bindParam(':shippingAddress', $shippingaddress);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();
            $success_msg = "Registration successful! You can now log in.";
        }
    }
}

// User Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header('Location: my-cart.php');
        exit;
    } else {
        $error_msg = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Paintings Portal | Sign-in | Signup</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/config.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts --> 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script type="text/javascript">
        function valid() {
            if (document.register.password.value != document.register.confirmpassword.value) {
                alert("Password and Confirm Password do not match!");
                document.register.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {}
            });
        }
    </script>
</head>
<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/top-header.php');?>
        <!-- ============================================== TOP MENU : END ============================================== -->
        <?php include('includes/main-header.php');?>
        <!-- ============================================== NAVBAR ============================================== -->
        <?php include('includes/menu-bar.php');?>
        <!-- ============================================== NAVBAR : END ============================================== -->
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Authentication</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign In</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <form class="register-form outer-top-xs" method="post">
                            <span style="color:red;">
                                <?php if (isset($error_msg)) echo $error_msg; ?>
                                <?php if (isset($success_msg)) echo $success_msg; ?>
                            </span>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required>
                            </div>
                            <div class="radio outer-xs">
                                <a href="forgot-password.php" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- Create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a New Account</h4>
                        <p class="text title-tag-line">Create your own Shopping account.</p>
                        <form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
                            <div class="form-group">
                                <label class="info-title" for="name">Full Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required>
                                <span id="user-availability-status1" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="contactno">Contact No. <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="billingaddress">Billing Address <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingaddress" name="billingaddress" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="shippingaddress">Shipping Address <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="shippingaddress" name="shippingaddress" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="confirmpassword">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required>
                            </div>
                            <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Sign Up</button>
                        </form>
                        <span class="checkout-subtitle outer-top-xs">Sign Up Today And You'll Be Able To:</span>
                        <div class="checkbox">
                            <label class="checkbox">
                                Speed your way through the checkout.
                            </label>
                            <label class="checkbox">
                                Keep a record of all your purchases.
                            </label>
                        </div>
                    </div>
                    <!-- Create a new account -->
                </div><!-- /.row -->
            </div>
        </div>
    </div>
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="switchstylesheet/switchstylesheet.js"></script>
    <script>
        $(document).ready(function() { 
            $(".changecolor").switchstylesheet({ seperator: "color" });
            $('.show-theme-options').click(function() {
                $(this).parent().toggleClass('open');
                return false;
            });
        });
        $(window).bind("load", function() {
            $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
</body>
</html>