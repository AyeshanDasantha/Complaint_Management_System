<?php 
session_start();
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


		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><?php echo $language["appealhstory"]; ?></h2>

						<!-- Zero Configuration Table -->
						<div class="panel-default">
							<div class="panel-heading"><?php echo $language["appeallist"]; ?></div>
							<div class="panel-body">
							<!--  -->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
                              <tr>
                              	  <th>#</th>
                              	  <th><?php echo $language["appealno"]; ?></th>
                                  <th><?php echo $language["Complaint_Number"]; ?></th>
                                  <th><?php echo $language["appealdetails"]; ?></th>
                                  <th><?php echo $language["appealdate"]; ?></th>
                                  <th ><?php echo $language["file"]; ?></th>
                                  <th><?php echo $language["status"]; ?></th>
                                  <th><?php echo $language["paymentstatus"]; ?></th>
                                  <th><?php echo $language["Action"]; ?></th>

                              </tr>
                              </thead>
                              <tbody>
  <?php 

  $query=mysqli_query($con,"select *from appealcomplaint where userId='".$_SESSION['id']."' ORDER BY complaintNo DESC");
  $cnt=1;
  while($row=mysqli_fetch_array($query))
  {
  ?>
                              <tr>
                              	<td><?php echo htmlentities($cnt);?></td>
                              	<td align="center"><?php echo htmlentities($row['id']);?></td>
                                  <td align="center"><?php echo htmlentities($row['complaintNo']);?></td>
                                  <td align="center"><?php echo htmlentities($row['appeal_description']);?></td>
                                  <td align="center"><?php echo  htmlentities($row['DateTime']);?></td>
                                  <td > <?php $cfile=$row['appealFile'];
											if($cfile=="" || $cfile=="NULL")
											{
											  echo "File NA";
											}
											else{?>
											<a href="appealdocs/<?php echo htmlentities($row['appealFile']);?>" target="_blank"/> View File</a>
										<?php } ?>
								   </td>
                                  <?php
												$stat = $row['status'];

												$notprocess='Not Process Yet';
												$inprocess='In Process';													
												if($stat==$notprocess)
												{ ?>
													<td style="color: red" align="center"><b><?php echo $language["Not_pro"]; ?></b></td>
												<?php }
												else if($stat==$inprocess)
												{ ?>
													<td style="color: blue"  align="center"><b><?php echo $language["In_Pro"]; ?></b></td>
												<?php }
												else
												{?>
												<td style="color: green"  align="center"><b><?php echo $language["CLosed"]; ?></b></td>
								<?php } ?>
								<td > <?php $paystat=$row['paymentStatus'];
											if($paystat == 0)
											{?>
											  <p align="center"><a href="appeal-pay.php?id=<?php echo htmlentities($row['id']);?>"> <?php echo $language["pendingpayment"]; ?></a></p>
											
											<?php }
											else
											{?>
												<p align="center"><b><?php echo $language["paymentdone"]; ?></b></p>
											
										 <?php } ?>
								   </td>
								<td align="center">
									                                   <a href="appeal-details.php?id=<?php echo htmlentities($row['id']);?>">
									<button type="button" class="btn btn-primary"><?php echo $language["View_Details"]; ?></button></a>
                                   </td>
                                  
                                </tr>
                 				<?php $cnt=$cnt+1; } ?>
                              </tbody>
                          </table>

						

							</div>
						</div>

					

					</div>
				</div>

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
