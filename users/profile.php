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
$fname=$_POST['fullname'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
$province=$_POST['province'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$query=mysqli_query($con,"update users set fullName='$fname',contactNo='$contactno',address='$address',province='$province',State='$state',city='$city',pincode='$pincode' where userEmail='".$_SESSION['login']."'");
if($query)
  {
  $successmsg=$language["profileupdatesuccess"];
  }
  else
  {
  $errormsg=$language["profileupdatefail"];
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
<script>
function getState(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getstate.php",
  data:'stateid='+val,
  success: function(data){
    $("#state").html(data);
    
  }
  });
  }
  </script>

  <script>
function getCity(val) {
//  alert('val');

  $.ajax({
  type: "POST",
  url: "getcity.php",
  data:'cityid='+val,
  success: function(data){
    $("#city").html(data);
    
  }
  });
  }
  </script>

  <script >
      function userPhone() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "check_phone_profile.php",
      data:'contactno='+$("#contactno").val(),
      type: "POST",
      success:function(data){
      $("#messge2").html(data);
      $("#loaderIcon").hide();
      },
      error:function (){}
      });
      }
  </script>

  <script>
      function phoneno()
      {
        var a = document.getElementById("contactno").value;
        if(a=="")
        {
            document.getElementById("messge").innerHTML="";
            return false;
        }
        if(isNaN(a))
        {
            document.getElementById("messge").innerHTML="Numbers Only";
            return false;
        }
        else if(isNaN(a))
        {
            document.getElementById("messge").innerHTML="Numbers Only Please Check Your Phone No";
            return false;
        }
        else if(a.length<10)
        {
            document.getElementById("messge").innerHTML="Phone No is Wrong Please Check Your Phone No";
            return false;
        }
        else if(a.length>10)
        {
            document.getElementById("messge").innerHTML="Phone No is Wrong Please Check Your Phone No";
            return false;
        }
        else if((a.charAt(0)!=0) && (a.charAt(0)!=7))
        {
            document.getElementById("messge").innerHTML="Phone No is Start with 07XXXXXXXX";
            return false; 
        }
        else
        {
          document.getElementById("messge").innerHTML="";
        }

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
					
						<h2 class="page-title"></i><?php echo $language["Profile_info"]; ?></h2>
						<?php $query=mysqli_query($con,"SELECT users.*, province.provinceName, state.stateName,city.cityName FROM users INNER JOIN province ON users.province=province.id INNER JOIN state ON users.State=state.id INNER JOIN city ON users.city=city.id where userEmail='".$_SESSION['login']."'");
                     while($row=mysqli_fetch_array($query)) 
                     {
                     ?>  
						<h4><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($row['fullName']);?><?php echo $language["s_Profile"]; ?></h4>
						 <h5><i class="fa fa-calendar" aria-hidden="true"></i> <b><?php echo $language["Last_Updated_at"]; ?></b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["Basic_info"]; ?></div>

									<div class="panel-body">
<form name="state" method="post" class="form-horizontal" onsubmit="return phoneno()" >
	 
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
<label class="col-sm-2 control-label"><?php echo $language["Full_Name"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']);?>" class="form-control" >
</div>
<label class="col-sm-2 control-label"><?php echo $language["Contact"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contactno" maxlength="10" id="contactno" onBlur="userPhone()" onmouseout="phoneno()" required="required" value="0<?php echo htmlentities($row['contactNo']);?>" class="form-control">
<li><span id="messge" style="font-size:12px; color: red;"></span></li>
<span id="messge2" style="font-size:12px; color: red;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["User_Email"]; ?></label>
<div class="col-sm-4">
<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<label class="col-sm-2 control-label"><?php echo $language["nic"]; ?></label>
<div class="col-sm-4">
<input type="text" name="nic" required="required" value="<?php echo htmlentities($row['nic']);?>" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Gender"]; ?></label>
<div class="col-sm-4">
<input type="text" name="gender" required="required" value="<?php echo htmlentities($row['gender']);?>" class="form-control" readonly>
</div>
<label class="col-sm-2 control-label"><?php echo $language["Reg_Datea"]; ?></label>
<div class="col-sm-4">
<input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Birthday"]; ?></label>
<div class="col-sm-4">
<input type="text" name="birthday" required="required" value="<?php echo htmlentities($row['birthday']);?>" class="form-control" readonly>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Address"]; ?><span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea  name="address" required="required" class="form-control"><?php echo htmlentities($row['address']);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Province"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="province" id="province" class="form-control" onChange="getState(this.value);" required="required">
<option value=""><?php echo htmlentities($row['provinceName']);?></option>
    <?php $sql=mysqli_query($con,"select id,provinceName from province ");
    while ($rw=mysqli_fetch_array($sql)) {
      ?>
      <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['provinceName']);?></option>
    <?php
    }
    ?>
</select>
</div>
<label class="col-sm-2 control-label"><?php echo $language["District"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="state" id="state" class="form-control" onChange="getCity(this.value);" required="required">
<option value="" ><?php echo htmlentities($row['stateName']);?></option>
</select>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["City"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="city" id="city" class="form-control" required="required" >
<option value=""><?php echo htmlentities($row['cityName']);?></option>
</select>
</div>
<label class="col-sm-2 control-label"><?php echo $language["Zipcode"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="pincode" maxlength="5" required="required" value="<?php echo htmlentities($row['pincode']);?>" class="form-control">

</div>
</div>

<div class="hr-dashed"></div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?php echo $language["User_Photo"]; ?></label>
<div class="col-sm-4" >
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png" width="256" height="256" class="img-circle">
<label><a href="update-image.php" ><?php echo $language["Change_Photo"]; ?></a></label>
<?php else:?>
	<img src="userimages/<?php echo htmlentities($userphoto);?>" width="256" height="256" class="img-circle">
  <label ><a href="update-image.php"><?php echo $language["Change_Photo"]; ?></a></label>
<?php endif;?>
</div>
</div>
<?php } ?>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset"><?php echo $language["cancel"]; ?></button>
													<button class="btn btn-primary" name="submit" type="submit"><?php echo $language["save"]; ?></button>
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