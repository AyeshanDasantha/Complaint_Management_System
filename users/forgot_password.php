<?php
session_start();
error_reporting(0);
include("../config/config.php");
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

if(isset($_POST['submit']))
{
	$email=($_POST['email']);
  	$nic=$_POST['nic'];

  	$ret=mysqli_query($con,"SELECT * FROM users WHERE userEmail='$email' and nic='$nic'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
		$forgotcode = md5(rand());
		$query=mysqli_query($con,"UPDATE users SET recoveryPassword='$forgotcode' WHERE userEmail='$email'");


		$host=$_SERVER['HTTP_HOST'];
      	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

      	require '../phpmailer/forgotpwmail.php';
      	
	}
	else
	{
		$errormsg=$language["cannotfind"];
	}

}
?>

<!DOCTYPE html>
<html>
<head>
<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>  
    <title><?php echo htmlentities($row['setting_description']);?></title><?php }?>
	<!-- Meta-Tags -->
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

    <!-- //Meta-Tags -->
	<!-- Custom Theme files -->
	<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome_login.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom Theme files -->
	
	<!-- web font --> 
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //web font --> 
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- footer style -->
    <link href="../css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->

    <!--  header Style -->
    <link href="../css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../css/header_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="../js/jquery.min.js"></script>
   <!--  / Header Style -->
	<style>
		.modal-footer {   border-top: 0px; }
	</style>
</head>
<body>
	<?php include('../includes/header_second.php');?>
	<!-- main -->
<br>
		<div class="main-w3lsrow">
			<!-- login form -->
			<div class="login-form login-form-left"> 
				<div class="agile-row">
					<div class="head">
						<h2><?php echo $language["Forg_Password"]; ?></h2>
						<span class="fa fa-lock"></span>
						
					</div>	
					<span><?php echo $language["forgot_details"]; ?></span>
					<p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>			
					<div class="clear"></div>

					<div class="login-agileits-top"> 	
						<form  name="login" method="post"> 
							<input type="email" class="name" name="email" Placeholder="<?php echo $language["User_Email"]; ?>" required=""/>
							<input type="text" class="name" name="nic"  Placeholder="<?php echo $language["nic"]; ?>" required=""/>
							<button class="btn btn-theme btn-block" name="submit" type="submit"><?php echo $language["Submit"]; ?></button> 
						</form> 	
					</div> 
					



				</div>  
			</div>  
		</div>
		<br>
	</div>	

 
</div>
	<!-- //main -->
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="js/model/jquery.js"></script>
    <script src="js/model/bootstrap.min.js"></script>

	<?php include('../includes/footer_login_register.php');?>
</body>
</html>