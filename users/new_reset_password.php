<?php
session_start();
error_reporting(0);
include("../config/config.php");

if(isset($_POST['submit']))
{
	$newpassword=md5($_POST['password']);
	$userEmail = $_GET['userEmail'];
	$forgotcode = md5(rand());

  	$query=mysqli_query($con,"UPDATE users SET password='$newpassword' WHERE `userEmail`='$userEmail'");
  	$query2=mysqli_query($con,"UPDATE users SET recoveryPassword='$forgotcode' WHERE `userEmail`='$userEmail'");
	$msg="Successfully Change Your Password!";
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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--  header Style -->
    <link href="../css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../css/header_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="../js/jquery.min.js"></script>
   <!--  / Header Style -->
	<script>
function valid()
{
  var passowrd = document.getElementById("password").value;
  var confirmpassword = document.getElementById("confirmpassword").value;

if(passowrd!= confirmpassword)
{
document.getElementById("passerror").innerHTML="Password and Confirm Password Field do not match  !!";
document.getElementById("submit").disabled = true;
}
else
{
  document.getElementById("passerror").innerHTML="";
  document.getElementById("submit").disabled = false;
}

}
</script>
</head>
<body>
	<?php include('../includes/header_resetpassword.php');?>
	<!-- main -->
<br>
		<div class="main-w3lsrow">
			<!-- login form -->
			<div class="login-form login-form-left"> 
				<div class="agile-row">
					<div class="head">
						<h2>Forgot Password ?</h2>
						<span class="fa fa-lock"></span>
						
					</div>	
					<span>Enter your details below to reset your password.</span>
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
						<form name="login" method="post" onsubmit="return valid()"> 
							<input type="password" class="name" name="password" id="password" Placeholder="New Password" required=""/>
							<input type="password" class="name" name="confirmpassword" id="confirmpassword" onmouseout="valid()" Placeholder="Confirm New Password" required=""/>
							<span id="passerror" style="font-size:12px; color: red;"></span>
							<button class="btn btn-theme btn-block" name="submit" id="submit" type="submit">Submit</button> 
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
    <script src="js/js/jquery.js"></script>
    <script src="js/js/bootstrap.min.js"></script>

	<?php include('../includes/footer.php');?>
</body>
</html>