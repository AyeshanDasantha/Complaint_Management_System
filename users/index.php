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
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$ret=mysqli_query($con,"SELECT * FROM users WHERE userEmail='$username' and password='$password'");
	$num=mysqli_fetch_array($ret);
		if($num>0)
		{
			$usertype=$num['usertype'];
			$activestatus=$num['status'];
			if($usertype == 2)
			{
				$extra="Province_admin/dashboard.php";
				$_SESSION['plogin']=$_POST['username'];
				$_SESSION['province']=$num['province'];
				$_SESSION['id']=$num['id'];
				$host=$_SERVER['HTTP_HOST'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=1;
				$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['plogin']."','$uip','$status')");
				$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
				exit();
			}
			else
			{
				if($activestatus== 1)
				{
					$extra="dashboard.php";
					$_SESSION['login']=$_POST['username'];
					$_SESSION['province']=$num['province'];
					$_SESSION['id']=$num['id'];
					$host=$_SERVER['HTTP_HOST'];
					$uip=$_SERVER['REMOTE_ADDR'];
					$status=1;
					$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
					$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
					header("location:http://$host$uri/$extra");
					exit();	
				}
				else
				{
					$_SESSION['login']=$_POST['username'];	
					$uip=$_SERVER['REMOTE_ADDR'];
					$status=0;
					mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
					$errormsg=$language["notactivate"];
					$extra="login.php";
					
				}
			}	
		}
		else
		{
			$_SESSION['login']=$_POST['username'];	
			$uip=$_SERVER['REMOTE_ADDR'];
			$status=0;
			mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
			$errormsg=$language["notmatchpw"];
			$extra="login.php";

		}

}
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
     <link rel="shortcut icon" type="image/x-icon" href="../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>

    <?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=11");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
     <link rel="shortcut icon" type="image/x-icon" href="../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>
    <script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
</script>
    <!-- //Meta-Tags -->
	<!-- Custom Theme files -->
	<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome_login.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom Theme files -->
	
	<!-- web font --> 
	<!-- <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> -->
	<!-- //web font --> 
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/modern-business.css" rel="stylesheet">

    <!--  header Style -->
    <link href="../css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../css/header_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="../js/jquery.min.js"></script>
   <!--  / Header Style -->
   <!-- footer style -->
    <link href="../css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->
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
						<h2><?php echo $language["login"]; ?></h2>
						<span class="fa fa-lock"></span>
						
					</div>	
					<p style="padding-left:4%; padding-top:2%;  color:red"><b>
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></b></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green"><b>
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></b></p>				
					<div class="clear"></div>
					<div class="login-agileits-top"> 	
						<form  name="login" method="post"> 
							<input type="text" class="name" name="username" Placeholder="<?php echo $language["User_Email"]; ?>" required=""/>
							<input type="password" class="password" name="password"  Placeholder="<?php echo $language["Password"]; ?>" required=""/>
							<button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> <?php echo $language["login"]; ?></button> 
						</form> 	
					</div> 
					<label class="checkbox">
		                <span class="pull-right">
		                    <a href="forgot_password.php"><?php echo $language["Forg_Password"]; ?></a>
		
		                </span>
		            </label>

<!-- <div class="login-agileits-bottom1"> 
			<h5>or login with</h5>
		</div> -->
		
		<!-- social icons -->
		<!-- <div class="social_icons agileinfo">
			<ul class="top-links">
				<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
			</ul>
		</div> -->
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