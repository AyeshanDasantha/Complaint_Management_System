<?php
error_reporting(0);
session_start();
include('../config/config.php');
$query=mysqli_query($con,"SELECT status FROM sitemaintenance where id=1");
while($row=mysqli_fetch_array($query)) 
{
    $maintincestatus = $row['status'];
    if($maintincestatus==1)
    {
        header('location:../Maintenance/index.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#1a1a1a">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/faveicon.ico"/>

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
     <link rel="shortcut icon" type="image/x-icon" href="images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>

    <?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>  
    <title><?php echo htmlentities($row['setting_description']);?></title><?php }?>

  <!-- Demo scripts -->
  <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet" type="text/css" />

  <style type="text/css">
    html {
      box-sizing: border-box;
    }
    *, *:before, *:after {
      box-sizing: inherit;
    }

    body {
      font-family: 'Droid Sans', sans-serif;
      background:#f2f2f2;
      font-size:14px;
      line-height:21px;
    }

    .container {
      width: 960px;
      margin:20px auto;
    }

    @media only screen and (min-width: 768px) and (max-width: 1000px) {
      .container {
        width: 768px;
      }
    }
    @media only screen and (max-width: 767px) {
      .container {
        width: 420px;
      }
    }
    @media only screen and (max-width: 480px) {
      .container {
        width: 300px;
      }
    }

    a img {
      border:none;
    }

    h1, h2, h3, h4, h5, h6{ 
      font-weight:normal; 
    }
    h1{ 
      font-size:26px; 
      line-height:32px; 
    }
    p, ul{
      margin-bottom:10px;
    }

  </style>
  <!-- End Demo scripts -->

  <!-- Jquery is required, embed on your page if not already - don't embed 2 versions -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <!-- End Jquery -->

  <!-- Map scripts - add the below to your page -->
  <!-- jsmaps-panzoom.js is optional if you are using enablePanZoom -->
  <link href="jsmaps/jsmaps.css" rel="stylesheet" type="text/css" />
  <script src="jsmaps/jsmaps-libs.js" type="text/javascript"></script>
  <script src="jsmaps/jsmaps-panzoom.js"></script>
  <script src="jsmaps/jsmaps.min.js" type="text/javascript"></script>
<!--   <script src="maps/sriLanka.js" type="text/javascript"></script> -->

  <?php include('maps/sriLanka.php');?>
  <!-- End Map scripts -->
 
</head>

<body>
<h1 align=" center" style="color: green;"><b>DISTRICT WISE COMPLAINT COUNT</b></h1>
<p><a href="../index.php"><< back to Home</a></p>
  <div class="container">


    <!-- Map html - add the below to your page -->
    <div class="jsmaps-wrapper" id="sriLanka-map"></div>
    <!-- End Map html -->
  </div>

  <script type="text/javascript">

    $(function() {
      
      $('#sriLanka-map').JSMaps({
        map: 'sriLanka'
      });

    });
    
  </script>
  
</body>

</html>