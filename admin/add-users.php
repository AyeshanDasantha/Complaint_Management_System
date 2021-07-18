
<?php
session_start();
include('../config/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
  $pw=$_POST['password'];
	$contactno=$_POST['contactno'];
	$nic=$_POST['nic'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$zipcode=$_POST['zipcode'];
	$status=1;
	$gender=$_POST['gender'];
  	$birthday=$_POST['birthday'];
	$query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,nic,address,province,state,city,pincode,status,gender,birthday) values('$fullname','$email','$password','$contactno',
		'$nic','$address','$province','$state','$city','$zipcode','$status','$gender','$birthday')");
	$msg="User Added successfully..";

 
  $weburl=mysqli_query($con,"SELECT * FROM genaralsetting where id=2");
  while($row=mysqli_fetch_array($weburl)) 
  {
      $sitelink = $row['setting_description'];
      require '../phpmailer/addusermail.php';
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
		function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}
</script>
<script >
  	  function usernic() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "check_nic.php",
      data:'nic='+$("#nic").val(),
      type: "POST",
      success:function(data){
      $("#error2").html(data);
      $("#loaderIcon").hide();
      },
      error:function (){}
      });
      }
  </script>

   <script >
      function userPhone() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "check_phone.php",
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
  <script>
       function phoneno()
      {
        var a = document.getElementById("contactno").value;
        if(a=="")
        {
            document.getElementById("messge").innerHTML="";
            return false;
            document.getElementById("submit").disabled = true;
        }
        if(isNaN(a))
        {
            document.getElementById("messge").innerHTML="Numbers Only";
            return false;
            document.getElementById("submit").disabled = true;
        }
        else if(isNaN(a))
        {
            document.getElementById("messge").innerHTML="Numbers Only Please Check Your Phone No";
            return false;
            document.getElementById("submit").disabled = true;
        }
        else if(a.length<10)
        {
            document.getElementById("messge").innerHTML="Phone No is Wrong Please Check Your Phone No";
            return false;
            document.getElementById("submit").disabled = true;
        }
        else if(a.length>10)
        {
            document.getElementById("messge").innerHTML="Phone No is Wrong Please Check Your Phone No";
            return false;
            document.getElementById("submit").disabled = true;
        }
        else if((a.charAt(0)!=0) && (a.charAt(0)!=7))
        {
            document.getElementById("messge").innerHTML="Phone No is Start with 07XXXXXXXX";
            return false;
            document.getElementById("submit").disabled = true;
        }
        else
        {
            document.getElementById("messge").innerHTML="";
            return true;
            document.getElementById("submit").disabled = false;
        }

      }
    </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#find").click(function () {
                //Clear Existing Details
                $("#error").html("");
                $("#gender").html("");  
                $("#year").html("");
                $("#month").html("");
                $("#day").html("");

                var NICNo = $("#nic").val();
                var dayText = 0;
                var year = "";
                var month = "";
                var day = "";
                var gender = "";
                if (NICNo.length != 10 && NICNo.length != 12) {
                    $("#error").html("Invalid NIC NO");
                    $('#submit').prop('disabled',true);
                }
                 else if (NICNo.length == 10 && !$.isNumeric(NICNo.substr(0, 9))) {
                    $("#error").html("Invalid NIC NO");
                    $('#submit').prop('disabled',true);

                }
                else {
                    // Year
                    if (NICNo.length == 10) {
                        year = "19" + NICNo.substr(0, 2);
                        dayText = parseInt(NICNo.substr(2, 3));
                    } else {
                        year = NICNo.substr(0, 4);
                        dayText = parseInt(NICNo.substr(4, 3));
                    }

                    // Gender
                    if (dayText > 500) {
                        gender = "Female";
                        dayText = dayText - 500;
                    } else {
                        gender = "Male";
                    }

                    // Day Digit Validation
                    if (dayText < 1 && dayText > 366) {
                        $("#error").html("Invalid NIC NO");
                    } else {

                        //Month
                        if (dayText > 335) {
                            day = dayText - 335;
                            month = "December";
                        }
                        else if (dayText > 305) {
                            day = dayText - 305;
                            month = "November";
                        }
                        else if (dayText > 274) {
                            day = dayText - 274;
                            month = "October";
                        }
                        else if (dayText > 244) {
                            day = dayText - 244;
                            month = "September";
                        }
                        else if (dayText > 213) {
                            day = dayText - 213;
                            month = "Auguest";
                        }
                        else if (dayText > 182) {
                            day = dayText - 182;
                            month = "July";
                        }
                        else if (dayText > 152) {
                            day = dayText - 152;
                            month = "June";
                        }
                        else if (dayText > 121) {
                            day = dayText - 121;
                            month = "May";
                        }
                        else if (dayText > 91) {
                            day = dayText - 91;
                            month = "April";
                        }
                        else if (dayText > 60) {
                            day = dayText - 60;
                            month = "March";
                        }
                        else if (dayText < 32) {
                            month = "January";
                            day = dayText;
                        }
                        else if (dayText > 31) {
                            day = dayText - 31;
                            month = "Febuary";
                        }

                        // Show Details
                        $("#gender").val(gender);
                        $("#year").val(day +" / "+month+" / "+year);
                        // $("#month").html("Month : " + month);
                        // $("#day").html("Day :" + day);
                    }
                }
            });
        });
    </script>


     <script>
function valid()
{
  var passowrd = document.getElementById("find").value;
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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Users</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>

									<div class="panel-body">
<form name="state" method="post" class="form-horizontal" onsubmit="return phoneno()">
	<p style="padding-left: 1%; color: green">
              <?php if(isset($msg)){
            echo htmlentities($msg);
                }?>
            </p>
  <p style="padding-left: 1%; color: green">
              <?php if(isset($successmsg)){
            echo htmlentities($successmsg);
                }?>
            </p>
            <p style="padding-left: 1%; color: red">
              <?php if(isset($errormsg)){
            echo htmlentities($errormsg);
                }?>
            </p>
<div class="form-group">
<label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" placeholder="Full Name" autofocus class="form-control">
</div>
<label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" maxlength="10" name="contactno" onBlur="userPhone();phoneno()" id="contactno" placeholder="Contact No" required="required" class="form-control">
<span id="messge" style="font-size:12px; color: red;"></span>
<span id="messge2" style="font-size:12px; color: red;"></span><br>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Email id<span style="color:red">* </label>
<div class="col-sm-4">
<input type="email" id="email" onBlur="userAvailability()" onclick="phoneno()" name="email" placeholder="E-mail" required="required" class="form-control">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<label class="col-sm-2 control-label">NIC No<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="nic" id="nic" maxlength="12" class="form-control" onBlur="usernic()" placeholder="NIC" required>
<span id="error2" style="font-size:12px; color: red;"></span>
<span id="error" style="font-size:12px; color: red;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password<span style="color:red">* </label>
<div class="col-sm-4">
<input type="password" name="password" placeholder="Password" id="find" required="required" class="form-control">
</div>
<label class="col-sm-2 control-label">Confirm Password<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="password" name="confirmPassword" class="form-control" id="confirmpassword" onmouseout="valid()" placeholder="Confirm Password" required>
<span id="passerror" style="font-size:12px; color: red;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender<span style="color:red">* </label>
<div class="col-sm-4">
<input type="text" class="form-control"  Placeholder="Gender" id="gender"  name="gender" readonly />
</div>
<label class="col-sm-2 control-label">Birthday<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control"  Placeholder="Bithday" id="year"  name="birthday" readonly />
<span id="passerror" style="font-size:12px; color: red;"></span>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<textarea class="form-control" name="address" placeholder="Address" ></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Zip Code </label>
<div class="col-sm-4">
<input type="text" name="zipcode" class="form-control" maxlength="5" placeholder="Zip Code">
</div>
<div class="col-sm-4">
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Province <span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="province" class="form-control" onChange="getState(this.value);" required>
<option value="">Select Province</option> 
<?php $query=mysqli_query($con,"select * from province ");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['provinceName'];?></option>
<?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">Distict <span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="state" id="state" class="form-control" onChange="getCity(this.value);" required="required">
<option value="" >Select Distict <?php echo htmlentities($row['stateName']);?></option>
</select>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">City <span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="city" id="city" class="form-control" required="" >
<option value="">Select City<?php echo htmlentities($row['cityName']);?></option>
</select>
</div>
</div>







											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" id="submit" type="submit">Save changes</button>
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