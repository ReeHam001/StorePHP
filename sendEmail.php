<?php
if (isset($_POST['submit'])) {

    require "PHPMailer/OAuth.php"
    $mail=new PHPMailer;
    $mail->Host="smtp.gmail.com";
    $mail->port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure="tls";
    $mail->Username="svugroup42@gmail.com";
    $mail->Password="014041011";

    $mail->setFrom($_POST["email"],$_POST["name"]);
    $mail->addAddress("svugroup42@gmail.com");
    $mail->addReplyTo($_POST["email"].$_POST["name"]);

    $mail->isHTML(true);
    $mail->Subject="From Submission: ".$_POST["subject"];
    $mail->Body="<h1 alighn=center>Name :"$_POST["name"]."<br> Email:"$_POST["email"]."<br> Message:"$_POST["msg"]."</h1>"
    if($mail->send()){
        $result="Somthing went wrong, Please try agsin"
    }
    else{
        $result="Thanks".$_POST["name"]."for emaling";
    }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="AYA Store">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>AYA Store</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Contact Us</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
            </div>
            <textarea name="msg" id="msg" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>