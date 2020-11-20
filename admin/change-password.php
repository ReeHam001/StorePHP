
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Change Password</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

    <style>
        .span9{
            margin-left: 80px;
        }
        .info-box{
            margin: -60px auto;
            background: whitesmoke;
            border-radius: 5px;
            box-shadow:
                    0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                    0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                    0 12.5px 10px rgba(0, 0, 0, 0.06),
                    0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                    0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                    0 100px 80px rgba(0, 0, 0, 0.12)
        ;
        }

        .chart {
            --scale: 100;

            /* Setup the grid */
            display: grid;
            grid-auto-columns: 1fr;
            grid-template-rows: repeat(var(--scale), minmax(0, 1fr)) 1.4rem;
            grid-column-gap: 5px;

            /* Generate background guides */
            /* (sub-pixel rounding errors make this imperfect) */
            --line-every: 10;
            background-image: linear-gradient(to bottom, #ccc 1px, transparent 1px);
            background-size: 100% calc((100% - 1.4rem) / var(--scale) * var(--line-every));

            /* other styles� */
            margin: 15em auto 1em;
            padding: 0 1em;
            position: relative;
            max-width: 70vw;
            height: calc(50vh - 3em);
        }

        .chart::after {
            background: #fff;
            bottom: 0;
            content: ' ';
            height: 1.4rem;
            left: 0;
            position: absolute;
            right: 0;
        }


        /* Dates� */
        /* ------ */

        .date {
            align-items: center;
            display: flex;
            font-weight: bold;
            grid-row-start: -2;
            justify-content: center;
            text-align: center;
            z-index: 2;
        }


        /* Each bar on the graph� */
        /* ---------------------- */

        .bar {
            grid-row: var(--start) / -2;

            /* Background-Color */
            background-image: linear-gradient(to right, #12cca7, rebeccapurple, orange, firebrick);
            background-size: 1600% 100%;
            background-position: calc(var(--start) * 1%) 0;

            /* Other styles� */
            border-radius: 5px 5px 0 0;
            color: #000;
            list-style: none;
            position: relative;
        }

        .value {
            background: #fff;
            bottom: 100%;
            display: inline-block;
            left: 50%;
            padding: 0 0.4em;
            position: absolute;
            transform: translate(-50%, -1px);
        }


        /* Global helpers� */
        /* --------------- */

        :root {
            font-size: 80%;
            font-family: sans-serif;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper" style=" background-color:whitesmoke;">
        <?php include('include/sidebar.php');?>
		<div class="container">
			<div class="row">

			<div class="span9">

                <!-- *************************************** -->

                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <i class="icon fa fa-dollar"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <br>
                                            <h4 class="info-box-heading green">Sales Today</h4>
                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "shop";
                                            
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sql = "SELECT SUM(productPrice)  FROM products";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<h5> Sales Today: ". $row["SUM(productPrice)"]." $". "</h5>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div><!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <i class="icon fa fa-truck"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <br>
                                            <h4 class="info-box-heading orange">Products Exist</h4>
                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "shop";
                                            
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sql = "SELECT COUNT(id)  FROM products";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<h5> Number of Products: ". $row["COUNT(id)"]. "</h5>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                  

                                </div>
                            </div><!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <i class="icon fa fa-user"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <br>
                                            <h4 class="info-box-heading red">Number of Users</h4>
                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "shop";
                                            
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            $sql = "SELECT COUNT(id)  FROM users";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<h5> Number of users: ". $row["COUNT(id)"]. "</h5>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><!-- .col -->
                        </div><!-- /.row -->
                    </div><!-- /.info-boxes-inner -->
                </div><!-- /.info-boxes -->

                <dl class="chart" style="--scale: 100;">

                    <dt class="date">2010</dt>
                    <dd class="bar" style="--start: 56;">
                        <span class="value">45%</span>
                    </dd>

                    <dt class="date">2011</dt>
                    <dd class="bar" style="--start: 1;">
                        <span class="value">100%</span>
                    </dd>

                    <dt class="date">2012</dt>
                    <dd class="bar" style="--start: 38;">
                        <span class="value">63%</span>
                    </dd>

                    <dt class="date">2013</dt>
                    <dd class="bar" style="--start: 90;">
                        <span class="value">11%</span>
                    </dd>

                    <dt class="date">2014</dt>
                    <dd class="bar" style="--start: 55;">
                        <span class="value">46%</span>
                    </dd>

                    <dt class="date">2015</dt>
                    <dd class="bar" style="--start: 13;">
                        <span class="value">88%</span>
                    </dd>

                    <dt class="date">2016</dt>
                    <dd class="bar" style="--start: 66;">
                        <span class="value">35%</span>
                    </dd>

                    <dt class="date">2017</dt>
                    <dd class="bar" style="--start: 96;">
                        <span class="value">5%</span>
                    </dd>

                    <dt class="date">2018</dt>
                    <dd class="bar" style="--start: 23;">
                        <span class="value">78%</span>
                    </dd>

                    <dt class="date">2019</dt>
                    <dd class="bar" style="--start: 10;">
                        <span class="value">91%</span>
                    </dd>

                    <dt class="date">2020</dt>
                    <dd class="bar" style="--start: 46;">
                        <span class="value">55%</span>
                    </dd>

                </dl>

                <!-- *************************************** -->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>

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

</body>
<?php } ?>

</head></html>