<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Code user Registration
include ("securimage/securimage.php");
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == true) {
    if (isset($_POST['submit'])) {
        $name = $_POST['fullname'];
        $email = $_POST['emailid'];
        $contactno = $_POST['contactno'];
        $password = md5($_POST['password']);
        $confpassword = md5($_POST['confirmpassword']);
        $baddress = $_POST['billingaddress'];
        $bstate = $_POST['bilingstate'];
        $bcity = $_POST['billingcity'];
        $bpincode = $_POST['billingpincode'];
        $saddress = $_POST['shippingaddress'];
        $sstate = $_POST['shippingstate'];
        $scity = $_POST['shippingcity'];
        $spincode = $_POST['shippingpincode'];
        $query = mysqli_query($con, "insert into users(name,email,contactno,password,billingAddress,billingstate,billingcity,billingpincode,shippingaddress,shippingstate,shippingcity,shippingpincode) values('$name','$email','$contactno','$password','$baddress','$bstate','$bcity','$bpincode','$saddress','$sstate','$scity','$spincode')");
        if ($query) {
            if ($confpassword != $password)
                echo "<script>alert('Password Not Matches!');</script>";

            else
                echo "<script>alert('You are successfully register go to login');</script>";
        } else {
            echo "<script>alert('Not register something went wrong');</script>";
        }

    }
}
else{
    echo "error";
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

    <title>Aya Store | Signup</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--<link rel="stylesheet" href="assets/css/green.css">-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">


    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- : END -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script type="text/javascript">
        function valid()
        {
            if(document.register.password.value!= document.register.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
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
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>


    <style>
        .char{
            animation: an 1s ease-out 1 both;

        }
        @keyframes an{
            from{
                opacity: 0;
                transform: perspective(500px) translate3d(-35px, -40px, -150px) rotate3d(1, -1, 0, 35deg);
            }
            to{
                opacity: 1;
                transform: perspective(500px) translate3d(0, 0, 0);
            }
        }
    </style>
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


<div class="body-content outer-top-bd">
    <div class="container">
        <div class="sign-in-page inner-bottom-sm">
            <div class="row">

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                  <!--  <button style="cursor: pointer;border: none;background-color: #ABD07E;padding: 14px 28px;" onclick="showing()"><h4 class="checkout-subtitle">create a new account</h4></button> -->
                    <h4 class="checkout-subtitle" style="cursor: pointer;border: none;background-color: #12CCA7;padding: 14px 28px;">create a new account</h4>
                    <p class="text title-tag-line" style="color:#bc1b3c;">Create your own Shopping account.</p>
                    <form id="Hide/Show"  class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
                    <div class="form-group">
                            <label class="info-title" for="fullname">Full Name <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
                        </div>


                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
                            <span id="user-availability-status1" style="font-size:12px;"></span>
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="contactno">Contact No. <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">Password. <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
                        </div>
                        


                            <div class="form-group">
                                <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
                                <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"></textarea>

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate"  required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing City">Billing City <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required"  >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required"  >
                            </div>



                            <div class="form-group">
                                <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                                <textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"></textarea>
                            </div>



                            <div class="form-group">
                                <label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate"  required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing City">Shipping City <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required"  >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required"  >
                            
                        <br>
                        
                        
                        <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
                        <input type="text" name="captcha_code" size="10" maxlength="6" />
                        <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                        
                        <br><br>
                        <input type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" value="Submit"><br>
                        <button  type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Sign Up</button>
                        <br><br><br><br><br>
                        <span class="checkout-subtitle outer-top-xs" style="color: red"><h3>Sign Up Today And You'll Be Able To :</h3></span>
                        <div class="checkbox">
                            <p class="char1">
                                <ol class="char">
                                <li> <label class="checkbox" style="color: #0F1923">
                                        Speed your way through the checkout.
                                    </label></li>
                               <li> <label class="checkbox" style="color: #0F1923">
                                       Track your orders easily.
                                   </label></li>
                               <li><label class="checkbox" style="color: #0F1923">
                                       Keep a record of all your purchases.
                                   </label></li>
                            </ol>
                            </p>
                        </div>
                </div>
                <!-- Complete Information -->

                </form>

                <br><br>

            </div>
            <!-- create a new account -->			</div><!-- /.row -->
    </div>
    <?php include('includes/brands-slider.php');?>
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
    $(document).ready(function(){
        $(".changecolor").switchstylesheet( { seperator:"color"} );
        $('.show-theme-options').click(function(){
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
</script>


<script>
    function showing() {
        var sh = document.getElementById("Hide/Show");
        if(sh.style.display === "none"){
            sh.style.display = "block";
        }
        else{
            sh.style.display = "none";
        }
    }
</script>

<script>
    function showing1() {
        var sh = document.getElementById("Hide/Show1");
        if(sh.style.display === "none"){
            sh.style.display = "block";
        }
        else{
            sh.style.display = "none";
        }
    }
</script>

</body>
</html>