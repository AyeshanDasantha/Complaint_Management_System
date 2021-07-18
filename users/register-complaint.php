<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
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
	  $uid=$_SESSION['id'];
      $category=$_POST['category'];
      $subcat=$_POST['subcategory'];
      $complaintype=$_POST['complaintype'];
      $province=$_POST['province'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $gramaDivision=$_POST['gramaDivision'];
      $noc=$_POST['noc'];
      $complaintdetials=$_POST['complaindetails'];

      $compfile=$_FILES["compfile"]["name"];
      $fileNameCmps = explode(".", $compfile);
      $fileExtension = strtolower(end($fileNameCmps));
      $cmpfilesize = $_FILES["compfile"]["size"];

      
      
        if(empty($compfile))
        {
               $query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,province,state,city,gramaDivision,noc,complaintDetails) values('$uid','$category','$subcat','$complaintype','$province','$state','$city','$gramaDivision','$noc','$complaintdetials')");
                // code for show complaint number
              $sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
              while($row=mysqli_fetch_array($sql))
              {
                $cmpn=$row['complaintNumber'];
              }
              $complainno=$cmpn;
              echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';

              $sql3=mysqli_query($con,"select * from tblcomplaints");
              while($row=mysqli_fetch_array($sql3))
              {
                $rgdate=$row['regDate'];
              }
              $sql2=mysqli_query($con,"SELECT userEmail FROM users where id ='".$_SESSION['id']."'");
              while($row=mysqli_fetch_array($sql2))
              {
                $to=$row['userEmail'];
                require '../phpmailer/registercmpmail.php';
            }

        }
        else
        {
          $filesize=mysqli_query($con,"SELECT * FROM genaralsetting where id =13");
          while($row=mysqli_fetch_array($filesize))
          {
            $sizebyte=$row['setting_description'];
            if($cmpfilesize > $sizebyte)
            {
                $errormsg3=$language["filesizeeror"];
                
            }
            else
            {
                $allowed_extensions = array('jpg', 'gif', 'png', 'txt', 'xls', 'docx','pdf');
                if(!in_array($fileExtension,$allowed_extensions))
                {
                    $errormsg4 = $language["invalidfileformat"];
                }
                else
                {
                    $complaintfile=md5(time().$compfile). '.' . $fileExtension;
                    move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$complaintfile);

                    $query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,province,state,city,gramaDivision,noc,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$province','$state','$city','$gramaDivision','$noc','$complaintdetials','$complaintfile')");
                    // code for show complaint number
                    $sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
                    while($row=mysqli_fetch_array($sql))
                    {
                        $cmpn=$row['complaintNumber'];
                    }
                    $complainno=$cmpn;
                    echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
                    $sql3=mysqli_query($con,"select * from tblcomplaints");
              while($row=mysqli_fetch_array($sql3))
              {
                $rgdate=$row['regDate'];
              }
              $sql2=mysqli_query($con,"SELECT userEmail FROM users where id ='".$_SESSION['id']."'");
              while($row=mysqli_fetch_array($sql2))
              {
                $to=$row['userEmail'];
                require '../phpmailer/registercmpmail.php';
               
            }
          }
            }
            }
            }
        }
        
        else
        {
          $message = $language["googlerecapchafail"];

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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  
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
<script >
  function onLoads()
  {
    $('#submit').prop('disabled',true);
  }
</script>
<script type="text/javascript">
  function enableBtn(){
    document.getElementById("submit").disabled = false;
   }
</script>
 <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>

 <!--  state -->
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
  
  <!--  city -->
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
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title"><?php echo $language["Register_Complaint"]; ?></h2>
            <?php if($message)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
                                          <b>Oh snap!</b> </b> <?php echo htmlentities($message);?></div>
                                          <?php }?>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo $language["Basic_info"]; ?></div>

									<div class="panel-body">
<form method="post" name="complaint" enctype="multipart/form-data" class="form-horizontal" onload="onLoads()" >
	<?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>

                      <?php }?>

                       <?php if($errormsg3)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg3);?></div>

                      <?php }?>

                       <?php if($errormsg4)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg4);?></div>

                      <?php }?>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Category"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
<option value=""><?php echo $language["SelectCategory"]; ?></option>
<?php $sql=mysqli_query($con,"select id,categoryName from category ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
<?php
}
?>
</select></div>
<label class="col-sm-2 control-label"><?php echo $language["Sub_Category"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="subcategory" id="subcategory" class="form-control" >
<option value=""><?php echo $language["SelectSub_Category"]; ?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Province"]; ?><span style="color:red">* </label>
<div class="col-sm-4">
<select name="province" id="province" class="form-control" onChange="getState(this.value);" required="">
<option value=""><?php echo $language["SelectProvince"]; ?></option>
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
<select name="state" id="state" class="form-control" onChange="getCity(this.value);" required="">
<option value=""><?php echo $language["SelectDistrict"]; ?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["City"]; ?><span style="color:red">* </label>
<div class="col-sm-4">
<select name="city" id="city" class="form-control"  required="" >
<option value=""><?php echo $language["SelectCity"]; ?></option>
</select>
</div>
<label class="col-sm-2 control-label"><?php echo $language["Grama"]; ?><span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="gramaDivision" required="required" value="" required="" class="form-control">
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Complaint_Type"]; ?></label>
<div class="col-sm-4">
<select name="complaintype" id="complaintype" class="form-control" required="">
<option value=""><?php echo $language["SelectComplaint_Type"]; ?></option>
<?php $sql=mysqli_query($con,"select id,complaintType from complaintstype ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['complaintType']);?></option>
<?php
}
?>
</select>
</div>
<div class="col-sm-4">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Nature_of_Complaint"]; ?></label>
<div class="col-sm-10">
<input type="text" name="noc" required="required" value="" required="" class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["Complaint_Details"]; ?></label>
<div class="col-sm-10">
<!-- <input type="text" name="noc" required="required" value="" required="" class="form-control"> -->
<textarea name="complaindetails" required="required" class="form-control" maxlength="2000" class="form-control" cols="10" rows="5"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["ComplaintDoc"]; ?></label>
<div class="col-sm-4">
<input type="file" name="compfile" class="form-control" value="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><?php echo $language["recaptcha"]; ?></label>
<div class="col-sm-4">
  <?php $query=mysqli_query($con,"SELECT * FROM googlerecapcha");
                               while($row=mysqli_fetch_array($query)) 
                               {
                               ?> 
 <div class="g-recaptcha" data-sitekey="<?php echo htmlentities($row['site_key']);?>" data-callback="enableBtn"></div> <?php } ?>
 
</div>
</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset"><?php echo $language["cancel"]; ?></button>
													<button class="btn btn-primary" name="submit" id="submit" type="submit"><?php echo $language["cmpsave"]; ?></button>
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
   <script src='https://www.google.com/recaptcha/api.js'></script>
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