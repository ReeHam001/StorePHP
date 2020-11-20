<?php

session_start();

error_reporting(0);

include('includes/config.php');



// Code user Registration



if(isset($_POST['submit']))

{

    $name=$_POST['fullname'];

    $email=$_POST['emailid'];

    $contactno=$_POST['contactno'];

    $password=md5($_POST['password']);

    $baddress=$_POST['billingaddress'];

    $bstate=$_POST['bilingstate'];

    $bcity=$_POST['billingcity'];

    $bpincode=$_POST['billingpincode'];

    $saddress=$_POST['shippingaddress'];

    $sstate=$_POST['shippingstate'];

    $scity=$_POST['shippingcity'];

    $spincode=$_POST['shippingpincode'];

    $query=mysqli_query($con,"insert into users(name,email,contactno,password,billingAddress,billingstate,billingcity,billingpincode,shippingaddress,shippingstate,shippingcity,shippingpincode) values('$name','$email','$contactno','$password','$baddress','$bstate','$bcity','$bpincode','$saddress','$sstate','$scity','$spincode')");

    if($query)

    {

        echo "<script>alert('You are successfully register');</script>";

    }

    else

    {

        echo "<script>alert('Not register something went worng');</script>";

    }



}



//**************************************



// Code for User login



if(isset($_POST['login']))

{

    $email=$_POST['email'];

    $password=md5($_POST['password']);

    $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");

    $num=mysqli_fetch_array($query);

    if($num>0)

    {

        $extra="my-cart.php";

        $_SESSION['login']=$_POST['email'];

        $_SESSION['id']=$num['id'];

        $_SESSION['username']=$num['name'];

        $uip=$_SERVER['REMOTE_ADDR'];

        $status=1;

        $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");

        $host=$_SERVER['HTTP_HOST'];

        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

        header("location:http://$host$uri/$extra");

        exit();

    }

    else

    {

        $extra="login.php";

        $email=$_POST['email'];

        $uip=$_SERVER['REMOTE_ADDR'];

        $status=0;

        $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");

        $host  = $_SERVER['HTTP_HOST'];

        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

        header("location:http://$host$uri/$extra");

        $_SESSION['errmsg']="Invalid email id or Password";

        exit();

    }

}

//**********************************************



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



    <title>Privacy Police</title>



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

                <main class="char" >

                    <h3 style="color: #12cca7">Privacy & Police</h3>

                    <P>

                        <p>This privacy notice discloses the privacy practices for Aya Store. This privacy notice applies solely to information collected by this website. It will notify you of the following:<p>

                        <ol>

                            <li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>

                            <li>What choices are available to you regarding the use of your data.</li>

                            <li>The security procedures in place to protect the misuse of your information.</li>

                            <li>How you can correct any inaccuracies in the information.</li>

                            <li>Information Collection, Use, and Sharing</li>

                        </ol>

                        We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.<br>



                        We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.<br>



                        Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.<br>



                        Your Access to and Control Over Information

                        You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:

                        <ol>

                            <li>See what data we have about you, if any.</li>

                            <li>Change/correct any data we have about you.</li>

                            <li>Have us delete any data we have about you.</li>

                            <li>Express any concern you have about our use of your data.</li>

                        </ol>

                        Security

                        We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.<br>



                        Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.<br>



                        While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.<br>



                    If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at <i style="font-size: 12px;color: black">+963930731881</i> or via Email <i style="font-size: 12px;color: black">svugroup@gmail.com.</i>

                    </P>



                </main>

            </div>

        </div><!-- /.row -->

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