<?php
session_start();
error_reporting(0);
include('../config/config.php');
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
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
   $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
date_default_timezone_set($row['setting_description']);
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$password=md5($_POST['password']);
	$userEmail =$_SESSION['login'];
	$newpassword = md5($_POST['newpassword']);
$sql=mysqli_query($con,"SELECT password FROM  users where password='$password' and userEmail='$userEmail'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='$newpassword' where userEmail='$userEmail'");
 $con=mysqli_query($con,"update users set updationDate='$currentTime' where userEmail='$userEmail'");
 header('location:change-password-success.php');
$successmsg=$language["pwchangedone"];
}
else
{
$errormsg=$language["notmatch"];
}
}

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
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("<?php echo $language["currentpwempty"]; ?>");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("<?php echo $language["newpwempty"]; ?>");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("<?php echo $language["confirmpwempty"]; ?>");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("<?php echo $language["newandconfirmpwmotmatch"]; ?>");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"><?php echo $language["Change_Password"]; ?></h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["UserChangePassword"]; ?></div>
									<div class="panel-body">
										<form method="post" name="chngpwd" onSubmit="return valid();"  class="form-horizontal">
										
											
  	        	  <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b><?php echo $language["welldone"]; ?></b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b><?php echo $language["ohsnap"]; ?></b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label"><?php echo $language["Current_Password"]; ?></label>
												<div class="col-sm-8">
													 <input type="password" name="password" required="required" class="form-control">
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label"><?php echo $language["New_Password"]; ?></label>
												<div class="col-sm-8">
													<input type="password" name="newpassword" required="required" class="form-control">
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label"><?php echo $language["Confirm_Password"]; ?></label>
												<div class="col-sm-8">
													<input type="password" name="confirmpassword" required="required" class="form-control">
												</div>
											</div>
											<div class="hr-dashed"></div>
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>

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

</body>

</html>
<?php } ?>