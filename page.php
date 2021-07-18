<?php
session_start();
error_reporting(0);
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
$query=mysqli_query($con,"SELECT status FROM sitemaintenance where id=1");
while($row=mysqli_fetch_array($query)) 
{
$maintincestatus = $row['status'];
if($maintincestatus==1)
{
    header('location:Maintenance/index.php');
}
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
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <!--  header Style -->
    <link href="css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/header_style.css" rel="stylesheet" type="text/css" media="all" />
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> 
    <script src="js/header.jquery.min.js"></script>
   <!--  / Header Style -->
   <!-- footer style -->
    <link href="css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->

</head>

<body>


<?php include('includes/header_page.php');?>
    <!-- Page Content -->
    <div class="container">

        <h1 class="mt-4 mb-3"><?php echo $language["PageName"]; ?></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $language["PageName"]; ?></li>
        </ol>

        <p><?php echo $language["detail"]; ?></p>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- /.container -->
 

    <!-- Footer -->
  
<?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
