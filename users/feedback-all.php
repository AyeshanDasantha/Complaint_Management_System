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
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><?php echo $language["feedback"]; ?></h2>

						<!-- Zero Configuration Table -->
						<div class="panel-default">
							<a href="dashboard.php"><p><< back to Dashboard</p></a>
							<div class="panel-heading"><?php echo $language["feedback_list"]; ?></div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
										<tr>
											<th>#</th>
											<th><?php echo $language["Complaint_Number"]; ?></th>
											<th><?php echo $language["com"]; ?></th>
											<th><?php echo $language["datetime"]; ?></th>
											<th><?php echo $language["rate"]; ?></th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Complainant No</th>
											<th>Comment</th>
											<th>Date/Time</th>
											<th>Feedback</th>
										</tr>
										</tr>
									</tfoot>
<tbody>
<?php 
$query=mysqli_query($con,"select * from feedback where userEmail='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>	
										<tr>
											<td align="center"><?php echo htmlentities($cnt);?></td>
											<td align="center"><?php echo htmlentities($row['cmpNo']);?></td>
											<td align="center"><?php echo htmlentities($row['comment']);?></td>
											<td align="center"><?php echo htmlentities($row['DateTime']);?></td>
											<?php 
												$feedbackValue	= $row['feedbackValue'];

												$Excellent = 'Excellent';
												$Good = 'Good';
												$Neutral = 'Neutral';
												$Poor = 'Poor';
												
												if($feedbackValue==$Excellent)
													{
														?><td style="color: blue; text-align: center;text-shadow: 0 0 3px #FF0000;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><br />
														<?php } 
												elseif($feedbackValue==$Good) {
													?>
													<td style="color: blue; text-align: center;text-shadow: 0 0 3px #FF0000;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><br />
														<?php } 
												elseif($feedbackValue==$Neutral) {
													?>
													<td style="color: blue; text-align: center;text-shadow: 0 0 3px #FF0000;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><br />
														<?php } 
												elseif($feedbackValue==$Poor) {
													?>
													<td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i><br />
														<?php }	
												else {?>
													<td style="color: blue; text-align: center;text-shadow: 0 0 3px #FF0000;">
														<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i></i>

													</td>


												<?php } ?>
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
