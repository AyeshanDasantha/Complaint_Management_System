<?php
session_start();
error_reporting(0);
include('../../config/config.php');
if(strlen($_SESSION['plogin'])==0)
	{	
header('location:index.php');
}
else{

$genderwise=mysqli_query($con,"SELECT gender,COUNT(gender) from users WHERE usertype is null and status=1 and province ='".$_SESSION['province']."' GROUP BY gender");

$categorywise=mysqli_query($con,"SELECT COUNT(tblcomplaints.complaintNumber),category.categoryName from tblcomplaints INNER JOIN category ON category.id=tblcomplaints.category where tblcomplaints.province= '".$_SESSION['province']."'  GROUP BY category.categoryName");

$subcategorywise=mysqli_query($con,"SELECT COUNT(tblcomplaints.complaintNumber),subcategory.subcategory from tblcomplaints INNER JOIN subcategory ON subcategory.subcategory=tblcomplaints.subcategory WHERE tblcomplaints.province='".$_SESSION['province']."' GROUP BY subcategory.subcategory");

$cmptypewise=mysqli_query($con,"SELECT COUNT(tblcomplaints.complaintNumber),complaintstype.complaintType from tblcomplaints INNER JOIN complaintstype ON complaintstype.id=tblcomplaints.complaintType WHERE tblcomplaints.province='".$_SESSION['province']."' GROUP BY complaintstype.complaintType");

$appeal=mysqli_query($con,"SELECT status,COUNT(status) FROM appealcomplaint where province ='".$_SESSION['province']."' GROUP BY status ");

$feedback=mysqli_query($con,"SELECT feedbackValue,COUNT(feedbackValue) FROM feedback where province ='".$_SESSION['province']."' GROUP BY feedbackValue");

$cmpmonthwise = mysqli_query($con,"SELECT MONTHNAME(regDate),YEAR(regDate),COUNT(complaintNumber) FROM `tblcomplaints` WHERE YEAR(regDate)= YEAR(CURDATE()) and province ='".$_SESSION['province']."' GROUP BY MONTHNAME(regDate) ORDER BY Month(regDate)");

$usermonthwise = mysqli_query($con,"SELECT MONTHNAME(regDate),YEAR(regDate),COUNT(id) FROM `users` WHERE YEAR(regDate)= YEAR(CURDATE()) and province ='".$_SESSION['province']."' GROUP BY MONTHNAME(regDate) ORDER BY Month(regDate)");
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
     <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>
	
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

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gnder', 'Count' ],
          <?php 
          while($row=mysqli_fetch_array($genderwise))
          {
            echo "['".$row['gender']."',".$row['COUNT(gender)']."],";

          }

          ?>
        ]);

        var options = {
          title: 'Gender Wise Active Users',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Complaint Type', 'Complaint Count'],
          <?php 
          while($row=mysqli_fetch_array($cmptypewise)) 
          {
            echo "['".$row['complaintType']."',".$row['COUNT(tblcomplaints.complaintNumber)']."],";
          }

          ?>
         
        ]);

        var options = {
           title: 'Complaints Type Wise Complaints', 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Sub Category Name', 'Complaint Count' ],
          <?php 
          while($row=mysqli_fetch_array($subcategorywise))
          {
            echo "['".$row['subcategory']."',".$row['COUNT(tblcomplaints.complaintNumber)']."],";

          }

          ?>
        ]);

        var options = {
          title: 'Sub Category Wise Complaints',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category Name', 'Complaint Count'],
          <?php 
          while($row=mysqli_fetch_array($categorywise)) 
          {
            echo "['".$row['categoryName']."',".$row['COUNT(tblcomplaints.complaintNumber)']."],";
          }

          ?>
         
        ]);

        var options = {
           title: 'Category Wise Complaints',
           is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Complaint Type', 'Complaint Count'],
          <?php 
          while($row=mysqli_fetch_array($cmptypewise)) 
          {
            echo "['".$row['complaintType']."',".$row['COUNT(tblcomplaints.complaintNumber)']."],";
          }

          ?>
         
        ]);

        var options = {
           title: 'Complaints Type Wise Complaints', 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart123'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Appeal Status', 'Count' ],
          <?php 
          while($row=mysqli_fetch_array($appeal))
          {
            echo "['".$row['status']."',".$row['COUNT(status)']."],";

          }

          ?>
        ]);

        var options = {
          title: 'Appeal Status Count',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('appeal'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Feedback', 'Count' ],
          <?php 
          while($row=mysqli_fetch_array($feedback))
          {
            echo "['".$row['feedbackValue']."',".$row['COUNT(feedbackValue)']."],";

          }

          ?>
        ]);

        var options = {
          title: 'Feedback Count',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('feedback'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month Name', 'Complaint Count'],
          <?php 
          while($row=mysqli_fetch_array($cmpmonthwise))
          {
            echo "['".$row['MONTHNAME(regDate)']."',".$row['COUNT(complaintNumber)']."],";
          }

          ?>
        ]);

        var options = {
          chart: {
            title: 'Month Wise Complaint Count',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_materialcmp'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month Name', 'User Count' ],
          <?php 
          while($row=mysqli_fetch_array($usermonthwise))
          {
            echo "['".$row['MONTHNAME(regDate)']."',".$row['COUNT(id)']."],";
          }

          ?>
        ]);

        var options = {
          chart: {
            title: 'Month Wise Users Count',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_materialuser'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
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

						<h2 class="page-title">Dashboard</h2>
						<?php
	                    $query=mysqli_query($con,"SELECT * FROM announcement where id=1");
	                    while($row=mysqli_fetch_array($query)) 
	                    {
	                        $row = $row['status'];
	                        if ($row == 1)
	                        { 
	                            $query=mysqli_query($con,"SELECT * FROM announcement where id=1");
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
			                                        $query=mysqli_query($con,"SELECT * FROM announcement where id=1");
			                                        while($row3=mysqli_fetch_array($query))
			                                        {
			                                            $row3 = $row3['startdate'];
			                                            if ($row3 <= $currentdate) 
			                                            {
			                                                 include('admin-announcement.php');
			                                            }
			                                        }
			                                    }
			                        }   }
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
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null and province ='".$_SESSION['province']."'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase">Complaints not Process</div>
												</div>
											</div>
											<a href="notprocess-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status' and province ='".$_SESSION['province']."'");
$num1 = mysqli_num_rows($rt);
{?>									<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<div class="stat-panel-title text-uppercase">Complaints in process</div>
													  <?php }?>
												</div>
											</div>
											<a href="inprocess-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>




									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												     <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'and province ='".$_SESSION['province']."'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase">Closed Complaint</div>
												</div>
											</div>
											<a href="closed-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
                   <?php 
  $status=1;                 
$rt = mysqli_query($con,"SELECT * FROM users where status='$status' and province ='".$_SESSION['province']."' and usertype is null");
$num1 = mysqli_num_rows($rt);
{?>									<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<div class="stat-panel-title text-uppercase">Total Varifyed users</div>
													  <?php }?>
												</div>
											</div>
											<a href="manage-varified-users.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>		

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
							<div class="panel-heading">Users Statics</div>
							<div class="panel-body">
							<!--  -->
								<table  cellspacing="0" width="100%">
									<thead>
										<th>
											<div id="donutchart" style="width: 400px; height: 300px;"></div>
										</th>
										<th>
											<div id="piechart" style="width: 400px; height: 300px;"></div>
										</th>
									</thead>
								</table>
							</div>
						</div>
						
               <div class="panel panel-default">
              <div class="panel-heading">Month Wise Complaint & User Static</div>
              <div class="panel-body">
              <!--  -->
                <table  cellspacing="0" width="100%">
                  <thead>
                    <th>
                      <div id="barchart_materialcmp" style="width: 500px; height: 390px;"></div>
                    </th>
                    <th>
                     <div id="barchart_materialuser" style="width: 500px; height: 390px;"></div>
                    </th>
                  </thead>
                </table>
              </div>
            </div>


						<div class="panel panel-default">
							<div class="panel-heading">Users Statics</div>
							<div class="panel-body">
							<!--  -->
								<table  cellspacing="0" width="100%">
									<thead>
										<th>
											<div id="donutchart1" style="width: 400px; height: 300px;"></div>
										</th>
										<th>
											<div id="piechart1" style="width: 400px; height: 300px;"></div>
										</th>
									</thead>
								</table>
							</div>
						</div>
							
						

							<div class="panel panel-default">
							<div class="panel-heading">Latest Users</div>
							<div class="panel-body">
							<!--  -->
								<table  cellspacing="0" width="100%">
									<thead>
										<tr>
											
                      <th >User Id</th>
                      <th>Full Name</th>
                      <th>Ip Address </th>
                      <th>Province</th>
                      <th>Login Time</th>
										</tr>
									</thead>
 <tbody>

                    <?php
                    $query=mysqli_query($con,"SELECT users.fullName,users.id, userlog.userip,MAX(userlog.loginTime), province.provinceName FROM users INNER JOIN userlog ON users.id=userlog.uid INNER JOIN province ON users.province=province.id WHERE userlog.status=1 and users.province ='".$_SESSION['province']."' and usertype is null GROUP BY users.id order by MAX(userlog.loginTime) DESC LIMIT 5");

                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>                  
                    <tr>
                      
                      <td><?php echo htmlentities($row['id']);?></a></td>
                      <td><?php echo htmlentities($row['fullName']);?></a></td>
                      <td><?php echo htmlentities($row['userip']);?></td>
                      <td> <?php echo htmlentities($row['provinceName']);?></td>
                      <td> <?php echo htmlentities($row['MAX(userlog.loginTime)']);?></td>
                    <?php $cnt=$cnt+1; } ?>
                </table>



			</div>
		</div>

 

		 <div class="panel panel-default">
             <div class="panel-heading">Appeal & Feedback Statics</div>
              <div class="panel-body">
              <!--  -->
                <table  cellspacing="0" width="100%">
                  <thead>
                    <th>
                      <div id="appeal" style="width: 400px; height: 300px;"></div>
                    </th>
                    <th>
                      <div id="feedback" style="width: 400px; height: 300px;"></div>
                    </th>
                  </thead>
                </table>
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