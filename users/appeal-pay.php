<?php session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 
$_SESSION['lang'] = $_SESSION['lang'];
if(isset($_GET['lang'])){
if($_GET['lang']=='en'){
$_SESSION['lang'] = 0;

}else if($_GET['lang']=='si'){
$_SESSION['lang'] = 1;
}
else if($_GET['lang']=='ta'){
$_SESSION['lang'] = 2;
}
}
?>

<?php

switch($_SESSION['lang']){

case 0:
include("lang.en.php");
break;
case 1:
include("lang.si.php");
break;
case 2:
include("lang.ta.php");
break;
default:
include("lang.en.php");
break;
}

  ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="theme-color" content="#3e454c">

  <?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=9");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
  <meta name="description" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>
  <?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=10");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
    <meta name="keywords" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>

    <?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=11");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
     <link rel="shortcut icon" type="image/x-icon" href="../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>
	
	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>  
    <title><?php echo htmlentities($row['setting_description']);?></title><?php }?>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <script>
function mgs() {
  if(confirm("<?php echo $language["alert"]; ?>")) {
    window.location.href = "appeal-history.php"
}
}
</script>
</head>

<body>
	<?php include('includes/header-appeal-payment.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"><?php echo $language["appealpay"]; ?></h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["appealpaydetails"]; ?></div>

									<div class="panel-body">
<section id="main-content">
          <section class="wrapper site-min-height">


<form method="post" action="https://sandbox.payhere.lk/pay/checkout"> 

    <?php $query=mysqli_query($con,"SELECT * FROM paymentsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
    ?>

  <input type="hidden" name="merchant_id" value="<?php echo htmlentities($row['site_key']);?>"><?php }?>    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="https://www.ndp.dos.lk/confirm.php">
    <input type="hidden" name="cancel_url" value="https://www.ndp.dos.lk/cancel.php">
    <input type="hidden" name="notify_url" value="https://www.ndp.dos.lk/notify.php">  
     <?php $query=mysqli_query($con,"SELECT appealcomplaint.* ,tblcomplaints.complaintNumber,tblcomplaints.noc,users.fullName,users.userEmail,users.contactNo,users.address,users.city,city.cityName FROM appealcomplaint INNER JOIN tblcomplaints on appealcomplaint.complaintNo=tblcomplaints.complaintNumber INNER JOIN users on appealcomplaint.UserID=users.id INNER JOIN city on users.city = city.id WHERE appealcomplaint.id='".$_GET['id']."'");

while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealno"]; ?> : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['id']);?></p>
              <input type="hidden" name="order_id" value="<?php echo htmlentities($row['id']);?>">
          		</div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Complaint_Number"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['complaintNo']);?></p>
              <input type="hidden" name="items" value="<?php echo htmlentities($row['noc']);?>">
              </div>
          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealdate"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['DateTime']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealdetails"]; ?> :</b> </label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['appeal_description']);?></p>
              </div>
            </div>

<?php $query=mysqli_query($con,"SELECT * from genaralsetting where id=8");
while($row=mysqli_fetch_array($query))
{
  $currency=$row['setting_description'];
?>
<?php $query=mysqli_query($con,"SELECT * from charges where id=1");
while($row=mysqli_fetch_array($query))
{
  $appealcharge=$row['ChargeAmount'];
  ?>
  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["apealcharge"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo $currency;?> <b><?php echo htmlentities($row['ChargeAmount']);?>.00</b></p>
              </div>
<?php } ?>
<?php $query=mysqli_query($con,"SELECT * from charges where id=2");
while($row=mysqli_fetch_array($query))
{
  $servicecharge=$row['ChargeAmount'];
  ?>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["servicecharge"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo $currency;?> <b><?php echo htmlentities($row['ChargeAmount']);?>.00</b> </p>
              </div>
            </div> 
<?php } ?>
<?php
  $total = $appealcharge + $servicecharge;
?>
             <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["total"]; ?> :</b></label>
            <input type="hidden" name="currency" value="LKR">
            <input type="hidden" name="amount" value="<?php echo $total  ;?>">
              <div class="col-sm-4">
              <p><b><?php echo $currency;?> <?php echo $total  ;?>.00 /=</b></p>
              </div>
            </div>  <?php } ?>
    <input type="hidden" name="first_name" value="<?php echo htmlentities($row['fullName']);?>">
    <input type="hidden" name="last_name" value="">
    <input type="hidden" name="email" value="<?php echo htmlentities($row['userEmail']);?>">
    <input type="hidden" name="phone" value="<?php echo htmlentities($row['contactNo']);?>">
    <input type="hidden" name="address" value="<?php echo htmlentities($row['address']);?>">
    <input type="hidden" name="city" value="<?php echo htmlentities($row['cityName']);?>">
    <input type="hidden" name="country" value="Srilanka">

</section>
          <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b></b></label>
              <div class="col-sm-4">
              <p><button  class="btn btn-info" style="background-color: #6939B8"><i class="fa fa-credit-card" style="font-size:24px"> <?php echo $language["paynow"]; ?></i></button>
              
              <img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="250"/>
              </p>
              <?php } ?>
    
      </form> 
              <p><button  class="btn btn-info" onclick="mgs()" style="background-color: #FFC051"><i class="fa fa-clock-o" style="font-size:24px">  <?php echo $language["paylater"]; ?></i></button></p>
              </div>
            </div> 


	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>