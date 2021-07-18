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

if(isset($_POST['submit']))
{
    $query=mysqli_query($con,"SELECT * FROM googlerecapcha");
                               while($row=mysqli_fetch_array($query)) 
                               {
   $secretKey = $row['secret_key'];?>  <?php } ?>
   <?php
   $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$_POST['g-recaptcha-response']);
   $response = json_decode($response,true);
   if($response["success"] == true)
   {
        $cmpno=$_POST['cmpno'];
        $query=mysqli_query($con,"SELECT tblcomplaints.*,city.cityName, state.stateName,category.categoryName FROM tblcomplaints INNER JOIN city ON tblcomplaints.city=city.id INNER JOIN state ON tblcomplaints.state=state.id INNER JOIN category ON tblcomplaints.category=category.id where  tblcomplaints.complaintNumber='$cmpno' ");
                             while($row=mysqli_fetch_array($query)) 
                             {

                                $cmpn=$row['complaintNumber'];
                                $noc=$row['noc'];
                                
                             }
                             if(!empty($cmpn) && !empty($noc))
                             {
                                
                             }
                             else
                             {
                                $emptymsg =" No Record Found";
                             }
                         }
    else
    {
        $message = "Error..!!! Please Check the google recaptcha";
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
    <!--  header Style -->
    <link href="css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/header_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
   <!--  / Header Style -->
   <!-- Timeline Style -->
   <link rel="stylesheet" href="css/style_timeline.css">
   <!-- /Timeline Style -->
   <!-- footer style -->
    <link href="css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
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

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><small><?php echo $language["track"]; ?></small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><?php echo $language["home"]; ?></a>
            </li>
            <li class="breadcrumb-item active"><?php echo $language["trackcmp"]; ?></li>
        </ol>
            <?php if($emptymsg){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($emptymsg); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">



<div class="col-lg-4 mb-4">
<div class="font-italic"><?php echo $language["entercmpno"]; ?><span style="color:red">*</span> </div>
<div>
<input type="text" name="cmpno" class="form-control" required="required">
</div>
</div>

</div>
<div class="row">
<div class="col-lg-4 mb-4">
<?php $query=mysqli_query($con,"SELECT * FROM googlerecapcha");
                               while($row=mysqli_fetch_array($query)) 
                               {
                               ?> 
 <div class="g-recaptcha" data-sitekey="<?php echo htmlentities($row['site_key']);?>" data-callback="enableBtn"></div> <?php } ?>
</div>
</div>
<?php if($message)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
                                          <b>Oh snap!</b> </b> <?php echo htmlentities($message);?></div>
                                          <?php }?>
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="<?php echo $language["submit"]; ?>" style="cursor:pointer"></div>
</div>

</div>
       <!-- /.row -->
</form>   
 

        <div class="row">     
</p>
</div>
</div>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['submit']))
{
$query=mysqli_query($con,"SELECT * FROM tblcomplaints WHERE complaintNumber='$cmpno' ");
while($row=mysqli_fetch_array($query)) 
{

    $row = $row['status'];

    // $notprocess=" ";
    $inprocess="in process";
    $closed="closed";


    if ($row == $inprocess) {
         include('timeline/inprocess.php');
    }
    else if($row == $closed)
    {
        include('timeline/closed.php');
    }
    else 
    {
        include('timeline/notprocess.php');
    }
}
?>  
<?php }?>




    
</div>
<br>
<br>
<br>
<br>
<br>
<br>

</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>