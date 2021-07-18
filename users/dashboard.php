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
	<style >
		.alert-annosment {
	    background-color: #c54b5d;
	    border-color: transparent;
	    color: #ffffff;
}


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

						<h2 class="page-title"><?php echo $language["Dashboard"]; ?></h2>
						<?php
	                    $query=mysqli_query($con,"SELECT * FROM announcement where id=2");
	                    while($row=mysqli_fetch_array($query)) 
	                    {
	                        $row = $row['status'];
	                        if ($row == 1)
	                        { 
	                            $query=mysqli_query($con,"SELECT * FROM announcement where id=2");
	                            while($row2=mysqli_fetch_array($query)) 
	                                {
	                                       $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
								           while($row=mysqli_fetch_array($query)) 
								           {
												date_default_timezone_set($row['setting_description']);
				                                    $currentdate = date('Y-m-d');
				                                    $row2 = $row2['expire'];
				                                    
				                                    if ($row2 >= $currentdate) 
				                                    {
				                                        $query=mysqli_query($con,"SELECT * FROM announcement where id=2");
				                                        while($row3=mysqli_fetch_array($query))
				                                        {
				                                            $row3 = $row3['startdate'];
				                                            if ($row3 <= $currentdate) 
				                                            {
				                                                 include('user-announcement.php');
				                                            }
				                                        }
				                                    }
				                                 }
				                            }
	                        	}
	                    ?>  
	                    <?php }?>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
                              <?php 
                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><?php echo $language["CMP_Not_pro"]; ?></div>
												</div>
											</div>
											<a href="notprocess-complaint.php" class="block-anchor panel-footer text-center"><?php echo $language["Full_detail"]; ?> &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
                    <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
$num1 = mysqli_num_rows($rt);
{?>				<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<div class="stat-panel-title text-uppercase"><?php echo $language["CMP_In_Pro"]; ?></div>
													  <?php }?>
												</div>
											</div>
											<a href="inprocess-complaint.php" class="block-anchor panel-footer text-center"><?php echo $language["Full_detail"]; ?> &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>




									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												      <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><?php echo $language["CMP_CLosed"]; ?></div>
												</div>
											</div>
											<a href="closed-complaint.php" class="block-anchor panel-footer text-center"><?php echo $language["Full_detail"]; ?> &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
                    <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM feedback where userEmail='".$_SESSION['login']."'");
$num1 = mysqli_num_rows($rt);
{?>				<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<div class="stat-panel-title text-uppercase"><?php echo $language["feedback"]; ?></div>
													  <?php }?>
												</div>
											</div>
											<a href="feedback-all.php" class="block-anchor panel-footer text-center"><?php echo $language["Full_detail"]; ?> &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
							
								</div>
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>