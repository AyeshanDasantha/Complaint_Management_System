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
		</style>
</head>

<body>
	<?php include('includes/header-cmp-details.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"><?php echo $language["Complaint_Detail"]; ?></h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["Basic_info"]; ?></div>

									<div class="panel-body">
<section id="main-content">
          <section class="wrapper site-min-height">

 <?php $query=mysqli_query($con,"SELECT tblcomplaints.*, province.provinceName,state.stateName,city.cityName,complaintstype.complaintType, category.categoryName  FROM tblcomplaints INNER JOIN province ON tblcomplaints.province=province.id INNER JOIN state ON tblcomplaints.state = state.id INNER JOIN city ON tblcomplaints.city = city.id INNER JOIN complaintstype ON tblcomplaints.complaintType=complaintstype.id INNER JOIN category ON tblcomplaints.category=category.id where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");

while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Complaint_Number"]; ?> : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['complaintNumber']);?></p>
          		</div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Reg_Date"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['regDate']);?></p>
              </div>
          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Category"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['categoryName']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Sub_Category"]; ?> :</b> </label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['subcategory']);?></p>
              </div>
            </div>



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Complaint_Type"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['complaintType']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Province"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['provinceName']);?></p>
              </div>
            </div>  

             <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["District"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['stateName']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["City"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['cityName']);?></p>
              </div>
            </div>  



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Nature_of_Complaint"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['noc']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["ComplaintDocs"]; ?> :</b></label>
              <div class="col-sm-4">
              <p><?php $cfile=$row['complaintFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo htmlentities("File NA");
}
else{ ?>
<a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target='_blank'> View File</a>
<?php } ?>

              </p>
              </div>
            </div> 
 <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["Complaint_Detail"]; ?> </label>
              <div class="col-sm-10">
              <p><?php echo htmlentities($row['complaintDetails']);?></p>
              </div>

            </div> 



<?php 
$ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["remark"]; ?>:</b></label>
              <div class="col-sm-10">
   <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp; <?php echo $language["remarkdate"]; ?>: <?php echo  htmlentities($rw['rdate']); ?>
              </div>
            </div> 
 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><?php echo $language["Status"]; ?>:</label>
              <div class="col-sm-10">
 <?php echo  htmlentities($rw['sstatus']); ?>
              </div>
            </div>

<?php } ?>

 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b><?php echo $language["finalstatus"]; ?> :</b></label>
              <div class="col-sm-4">
              <p style="color:red"><?php 

if($row['status']=="NULL" || $row['status']=="" )
{
echo "Not Process yet";
} else{
              echo htmlentities($row['status']);
}
              ?></p>
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