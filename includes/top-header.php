

<?php

//session_start();



?>

<style>

    @keyframes ticker {

        0% { transform: translate3d(0, 0, 0); }

        100% { transform: translate3d(-90%, 0, 0); }

    }

    .tcontainer{

        width: 100%;

        overflow: hidden;

    }

    .ticker-wrap {

        width: 100%;

        padding-left: 100%;

        background-image: linear-gradient(

                to right,

                hsl(312, 40%, 44%),

                hsl(179, 90%, 30%)

        );

    }

    .ticker-move {

        display: inline-block;

        white-space: nowrap;

        padding-right: 100%;

        animation-iteration-count: infinite;

        animation-timing-function: linear;

        animation-name: ticker;

        animation-duration: 30s;

    }

    .ticker-move:hover{

        animation-play-state: paused;

    }

    .ticker-item{

        color:white;

        display: inline-block;

        padding:0 2rem;

        font-size: 18px;

    }

    .fb-messengermessageus a {

        color:red;

    }

</style>



<br>

<div class="container">

    <div class="row">



        <div class="col-xs-12 col-sm-6 col-md-4">

	<a target=_blank href="http://www.mediafire.com/file/mnadduq2oncmg12/Aya_Store.rar/file"> 
        	<img src="./img/google_play.png" style="width: 120px; height: 40px;"></img>
	</a>

        

        </div>

        <p>

            Download Our Android App and Get 10% additional Off on all Products

        </p>

    </div>

</div>





<br>

<div class="tcontainer">

    <div class="ticker-wrap">

        <div class="ticker-move">

            <div class="ticker-item"> See all new! See all new! Occasion</div>

            <div class="ticker-item">Up to 20% discount on Clothes </div>

            <div class="ticker-item">Hurry before the discounts end </div>

            <div class="ticker-item">Up to 30% discount on SmartPhone </div>

            <div class="ticker-item">Up to 40% discount on BabyClothes </div>

            <div class="ticker-item"> See all new! See all new! Occasion</div>



        </div>

    </div>

</div>



<div class="top-bar animate-dropdown">

	<div class="container">

		<div class="header-top-inner">

			<div class="cnt-account">

				<ul class="list-unstyled">



<?php if(strlen($_SESSION['login']))

    {   ?>

				<li><a href="#"><i class="icon fa fa-user"></i>Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>

				<?php } ?>



					<li><a href="my-account.php"><i class="icon fa fa-user"></i>My Account</a></li>

					<li><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>

					<li><a href="my-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>

					<li><a href="#"><i class="icon fa fa-key"></i>Checkout</a></li>

					<?php if(strlen($_SESSION['login'])==0)

    {   ?>

                    <li><a href="login.php"><i class="icon fa fa-sign-in"></i>Login</a></li>



<?php }

else{ ?>

	

				<li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>

				<?php } ?>	

				</ul>

			</div><!-- /.cnt-account -->



<div class="cnt-block">

				<ul class="list-unstyled list-inline">



					<li class="dropdown dropdown-small">

                        <a href="track-orders.php" class="dropdown-toggle" ><span class="key">Track Order</span>></a>

					</li>

                    <li><a href="Register.php"><i class="icon fa fa-sign-out"></i>Register New Account</a></li>

				

				</ul>

			</div>

			

			<div class="clearfix"></div>

		</div><!-- /.header-top-inner -->

	</div><!-- /.container -->

</div><!-- /.header-top -->

 </script>

        <script>

        function logadmin() {

            var ident="admin101404";

            var person = prompt("Please enter your identity:");

            if (person == ident ) {

                window.location.href="./admin/index.php";

            } 

            else 

            {

                alert("You are not admin !");

            }

        }

    </script>