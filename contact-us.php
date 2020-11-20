<?php

session_start();

error_reporting(0);

include('includes/config.php');



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



    <title>Aya Store | Contact Us</title>



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






</head>

<body>



<header class="header-style-1">



    <!-- ============================================== TOP MENU ============================================== -->

    <?php include('includes/top-header.php');?>

    <!-- ============================================== TOP MENU : END ============================================== -->

    <?php include('includes/main-header.php');?>

    <!-- ============================================== NAVBAR ============================================== -->

    <?php include('includes/menu-bar.php');?>

    <!-- ============================================== NAVBAR : END ============================================== -->



</header>

<div class="container" style="margin-top:50px;">

    <div class="row justify-content-center">

        <div class="col-md-6 col-md-offset-3" align="center">

            <label style="color: black;font-size:20px">

                Location: 29-May ST, Damascus, Syria<br>

                Tel: (+963) 930731881<br>

                Fax: (+963) 958250671<br>

                Email: svugroup42@gmail.com<br>

            </label>

            <br>

            <!--

            <input id="name" placeholder="Name" class="form-control">

            <input id="email" placeholder="Email" class="form-control">

            <input id="subject" placeholder="Subject" class="form-control">

            <textarea class="form-control" id="body" placeholder="Email Body"></textarea><br>

            <input type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary">-->

            <a href="mailto:svugroup42@gmail.com@bot.snatchbot.me"

            style="background:#12cca7;border-radius:4px;color:white;padding:6px 10px;

            text-decoration: none; display: inline-block; margin: 10px 5px; text-align: center; align-items: center; word-wrap: break-word;

            max-width: 100%;">

            Send me an Email</a>

        </div>

    </div>

</div>



<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">

    function sendEmail() {

        var name = $("#name");

        var email = $("#email");

        var subject = $("#subject");

        var body = $("#body");



        if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {

            $.ajax({

                url: 'sendEmail.php',

                method: 'POST',

                dataType: 'json',

                data: {

                    name: name.val(),

                    email: email.val(),

                    subject: subject.val(),

                    body: body.val()

                }, success: function (response) {

                    if (response.status == "success")

                        alert('Email Has Been Sent!');

                    else {

                        alert('Please Try Again!');

                        console.log(response);

                    }

                }

            });

        }

    }



    function isNotEmpty(caller) {

        if (caller.val() == "") {

            caller.css('border', '1px solid red');

            return false;

        } else

            caller.css('border', '');



        return true;

    }

</script>







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













</body>

</html>