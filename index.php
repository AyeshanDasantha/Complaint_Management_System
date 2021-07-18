<?php
error_reporting(0);
session_start();
include('config/config.php');

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
$query=mysqli_query($con,"SELECT status FROM sitemaintenance where id=1");
while($row=mysqli_fetch_array($query)) 
{
$maintincestatus = $row['status'];
if($maintincestatus==1)
{
    header('location:Maintenance/index.php');
}
}
?>
<!DOCTYPE html>
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/style_backtotop.css" rel="stylesheet" type="text/css">
    <link href="css/stackbar.css" rel="stylesheet" type="text/css">
    <!-- footer style -->
    <link href="css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>
   
   <!--  header Style -->
     <link href="css/header_bootstrap.css" rel='stylesheet' type='text/css' /> 
    <link href="css/header_style.css" rel="stylesheet" type="text/css" media="all" />
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> 
    <script src="js/header.jquery.min.js"></script>
   <!--  / Header Style -->

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>
   <a id="button"></a>
    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4"><?php echo $language["welcome"]; ?></h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header"><?php echo $language["tips_one_headr"]; ?></h4>
                   
                        <p class="card-text" style="padding-left:2%"><?php echo $language["tips_one_details"]; ?> </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header"><?php echo $language["tips_two_headr"]; ?></h4>
                   
                        <p class="card-text" style="padding-left:2%"><?php echo $language["tips_two_details"]; ?></p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header"><?php echo $language["tips_third_headr"]; ?></h4>
                   
                        <p class="card-text" style="padding-left:2%"><?php echo $language["tips_third_details"]; ?></p>
                </div>
            </div>
        </div>
       <?php 
                    $stat = 1;
                    $id=1;
                    $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                    while($row=mysqli_fetch_array($query)) 
                    {
                        
                        $row = $row['status'];
                        if ($row == 1)
                        { 
                            $id=1;
                            $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                            while($row2=mysqli_fetch_array($query)) 
                                {
                                     $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                                     while($row=mysqli_fetch_array($query)) 
                                     {
                                            date_default_timezone_set($row['setting_description']);
                                            $currentdate = date('Y-m-d');
                                            $aw = $row2['expire'];
                                    }
                                 }
                        }
                    ?>  
                    <?php }?>
        <!-- /.row -->
<!-- Service Section -->
<?php 
$stat = 1;
$sec="service";
$query=mysqli_query($con,"SELECT * FROM settinghome WHERE section_name='$sec' AND status ='$stat'");
while($row=mysqli_fetch_array($query)) 
{

    $row = $row['status'];

    if ($row == 1) {
         include('includes/service.php');
    }
?>  
<?php }?>





<!-- Stack Bar -->
<?php 
$stat = 1;
$sec="stackbar";
$query=mysqli_query($con,"SELECT * FROM settinghome WHERE section_name='$sec' AND status ='$stat'");
while($row=mysqli_fetch_array($query)) 
{

    $row = $row['status'];

    if ($row == 1) {
         include('includes/stackbar.php');
    }
?>  
<?php }?>
<br>

<!-- Cards -->
<?php 
$stat = 1;
$sec="card";
$query=mysqli_query($con,"SELECT * FROM settinghome WHERE section_name='$sec' AND status ='$stat'");
while($row=mysqli_fetch_array($query)) 
{

    $row = $row['status'];

    if ($row == 1) {
         include('includes/card.php');
    }
?>  
<?php }?>
    
    

        <!-- Features Section -->
        <br>
        <div class="row">
            <div class="col-lg-6">
                <h2><?php echo $language["cmp_type"]; ?></h2>
                <br>
          <p><?php echo $language["cmp_type_details"]; ?></p>
                <ol style="list-style-type:square;">
                    <?php 
                    $query=mysqli_query($con,"SELECT complaintType from complaintstype limit 5");
                     while($row=mysqli_fetch_array($query)) 
                     {
                     ?> 

                    <li class="a"><?php echo htmlentities($row['complaintType']);?></li>
                    <?php } ?>
                </ol>
                <p><?php echo $language["cmp_type_long"]; ?></p>
            </div>
            <div class="col-lg-6">
                <?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=7");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>  
                <?php $btmbanner=$row['setting_description'];
                if($btmbanner==""):
                ?>
                <img src="images/buttom/noimage.jpg" class="img-fluid rounded" >
                <?php else:?>
                <img src="images/buttom/<?php echo htmlentities($btmbanner);?>"class="img-fluid rounded" >
                    <?php endif;?><?php } ?>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4><?php echo $language["trackcmpheader"]; ?></h4>
                <p><?php echo $language["trackcmpdetails"]; ?></p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="track-complaint.php"><?php echo $language["trackcmpbutton"]; ?></a>
            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- /.container -->



    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="js/script.js"></script>

</body>

</html>
