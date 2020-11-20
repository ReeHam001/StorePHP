<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char

$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
echo "<script>alert('Order updated sucessfully...');</script>";
//}
}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Compliant</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <style>
        *{
            background-color: white;
        }
        footer{
            padding-top: 10px;
            width: auto;
            height: 60px;
            margin-top: 2.4%;
        }
        body table{
            padding: 10px;
            border-radius: 1px;
        }
        body table textarea{
            border-radius: 1px;
            background-color: whitesmoke;
        }
        #border101{
            border: 1px;
            border-radius: 1px;
            width: 600px;
            margin-left: 400px;
            margin-top: 100px;
            padding-left: 50px;
        }
        #updateticket{
            width: 500px;
        }
        .fontkink{
            border-radius: 1px;
        }
    </style>
</head>
<body style="background-color: whitesmoke">


<div class="content">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner" style="background-color: #12cca7;">
        <div class="container" style="background-color: #12cca7;">

        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->


<div id="border101">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0" >

    <thead>
    <tr height="50">
      <td colspan="4" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b style="margin-left: 0px;"> Update Order !</b></div></td>
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php
        $ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
             while($row=mysqli_fetch_array($ret))
              {
    ?>

      <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
      </tr>
      <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
      </tr>
      <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
      </tr>

    <tr>
      <td colspan="2"><hr /></td>
    </tr>

   <?php } ?>
    <?php
        $st='Delivered';
           $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
             while($num=mysqli_fetch_array($rt))
             {
             $currrentSt=$num['orderStatus'];
           }
             if($st==$currrentSt)
             { ?>
           <tr><td colspan="2"><b>
              Product Delivered </b></td>
           <?php }else  {
              ?>
   
    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Select Status</option>
                 <option value="in Process">In Process</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>

     <tr style=''>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark"  required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>

      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"
                                    size="50"
                                    style="
                                      border: none;
                                      padding: 10px 20px;
                                      border-radius:4px;
                                      color:white;
                                      background: orangered;
                                      margin-top:20px;"/>
          &nbsp;&nbsp;

      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();"
             style="  border: none;
                      padding: 10px 20px;
                      border-radius:4px;
                      color:white;
                      background: darkgrey;
                      margin-top:20px;"  /></td>
    </tr>
<?php } ?>
</table>
     <br>
 </form>

</div>

    <br><br><br><br><br><br><br><br><br>
<footer style="background-color: #1f2228;">
    <b  class="copyright" style="color: darkgrey;margin-left: 600px;">SVU-GROUP 2020 &copy;</b> All Rights Reserved.<br>
</footer>

 </div>

</body>
</html>
<?php } ?>

     