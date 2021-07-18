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
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

.downbtn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 16px;
}

/* Darker background on mouse-over */
.downbtn:hover {
  background-color: RoyalBlue;
}
</style>
</head>

<body>
	<?php include('includes/header-appeal-details.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"><?php echo $language["appealdetails"]; ?></h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["Basic_info"]; ?></div>

									<div class="panel-body">
<section id="main-content">
          <section class="wrapper site-min-height">

 <?php 
$aid =$_GET['id'];
 $query=mysqli_query($con,"SELECT * FROM appealcomplaint WHERE appealcomplaint.id='".$_GET['id']."'");

while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealno"]; ?>: </b></label>
          		<div class="col-sm-4">
          		<p><?php echo $aid;?></p>
          		</div>
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Complaint_Number"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['complaintNo']);?></p>
              </div>
          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealdetails"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['appeal_description']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["appealdate"]; ?>:</b> </label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['DateTime']);?></p>
              </div>
            </div>



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["file"]; ?>:</b></label>
              <div class="col-sm-4">
              <p><?php $cfile=$row['appealFile'];
                      if($cfile=="" || $cfile=="NULL")
                      {
                        echo "File NA";
                      }
                      else{?>
                      <a href="appealdocs/<?php echo htmlentities($row['appealFile']);?>" target="_blank"/> View File</a>
                    <?php } ?></p>
              </div>
              <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["status"]; ?> :</b></label>
              <div class="col-sm-4">
                <?php
                        $stat = $row['status'];

                        $notprocess='Not Process Yet';
                        $inprocess='In Process';                          
                        if($stat==$notprocess)
                        { ?>
                          <p style="color: red"><b><?php echo $language["Not_pro"]; ?></b><p>
                        <?php }
                        else if($stat==$inprocess)
                        { ?>
                          <p style="color: blue"><b><?php echo $language["In_Pro"]; ?></b><p>
                        <?php }
                        else
                        {?>
                        <p style="color: green"><b><?php echo $language["CLosed"]; ?></b><p>
                <?php } ?>
              </div>

              <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["paymentstatus"]; ?> :</b></label>
              <div class="col-sm-4">
                <?php
                        $stat = $row['paymentStatus'];                       
                        if($stat==0)
                        { ?>
                          <p style="color: red"><b><?php echo $language["pendingpayment"]; ?></b><p>
                        <?php }
                        else
                        {?>
                        <p style="color: green"><b><?php echo $language["paymentdone"]; ?></b><p>
                <?php } ?>
              </div>
                <?php
                        $stat = $row['paymentStatus'];
                          
                        if($stat==0)
                        { ?>
                          <p style="color: red"><b></b><p>
                        <?php }
                        else
                        {?>
                          <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["PaymentDate"]; ?> :</b></label>
                          <div class="col-sm-4">
                        <p ><?php echo htmlentities($row['paymentDateTime']);?><p>
                <?php } ?>
              </div>

              <?php
                        $stat = $row['paymentStatus'];
                          
                        if($stat==0)
                        { ?>
                          <p style="color: red"><b></b><p>
                        <?php }
                        else
                        {?>
                          <a href="../pay-recipt/pdf/index.php?id=<?php echo htmlentities($row['id']);?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<button class="downbtn"><i class="fa fa-download"></i>  <?php echo $language["recipt"]; ?></button></a>
                <?php } ?>
              
            </div>  



<?php 
$ret=mysqli_query($con,"SELECT appealcomplaint.*,appealremark.* FROM appealcomplaint JOIN appealremark ON appealcomplaint.id=appealremark.appealid WHERE appealcomplaint.id='".$_GET['id']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["remark"]; ?>:</b></label>
              <div class="col-sm-10">
   <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $language["remarkdate"]; ?>: <?php echo  htmlentities($rw['remarkDate']); ?></b>
              </div>
            </div> 

<?php } ?>

              </div>
            </div> 
            




<?php } ?>
		</section>
			

			</div>
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