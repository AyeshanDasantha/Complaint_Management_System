<?php
include('../config/config.php');
session_start();
error_reporting(0);
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
	$fullname=($_POST['fullname']);
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $contactno=$_POST['contactno'];
  $province=$_POST['province'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $nic=$_POST['nic'];
  $gender=$_POST['gender'];
  $birthday=$_POST['birthday'];
  $status=0;
  if(!empty($gender) && !empty($birthday))
  {
    $confirmcode = rand();
    $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,province,state,city,status,confir_Code,nic,gender,birthday) values('$fullname','$email','$password','$contactno','$province','$state','$city','$status','$confirmcode','$nic','$gender','$birthday')");
      $msg="Registration successfull. Now You can login !";

      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

      require '../phpmailer/registrationmail.php';
  }
  else
  {
    $msg="Invalid Nic No.Please Check the NIC No..";
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
    <!-- //Meta-Tags -->

	<!-- Custom Theme files -->
	<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome_login.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom Theme files -->
	
	<!-- web font --> 
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> -->
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
      $("#messge").html(data);
      $("#loaderIcon").hide();
      },
      error:function (){}
      });
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
                        $('#submit').prop('disabled',true);
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
	<?php include('../includes/header_second.php');?>
	<!-- main -->
<br>
		<div class="main-w3lsrow">
			<!-- login form -->
			<div class="login-form login-form-left"> 
				<div class="agile-row">
					<div class="head">
						<h2><?php echo $language["registration"]; ?></h2>
						<span class="fa fa-"></span>
						
					</div>	
					 <p style="padding-left: 1%; color: green">
              <?php if($msg){
            echo htmlentities($msg);
                }?>
            </p>	
					<div class="clear"></div>
					<div class="login-agileits-top"> 	
						<form  method="post" onsubmit="return phoneno()"> 
							<input type="text" class="name" name="fullname" Placeholder="<?php echo $language["Full_Name"]; ?>" required="required" autofocus/>

							<input type="email" placeholder="<?php echo $language["User_Email"]; ?>" id="email" onBlur="userAvailability()" name="email" required="required">
                 			<span id="user-availability-status1" style="font-size:12px;"></span>

                 			<input type="text" class="name" Placeholder="<?php echo $language["nic"]; ?>" name="nic" id="nic" required="required" onBlur="usernic()" autofocus/>
                 			<span id="error" style="font-size:12px; color: red;"></span>
                      <span id="error2" style="font-size:12px; color: red;"></span>
                 			

							<input type="password" class="password" required="required" name="password" Placeholder="<?php echo $language["Password"]; ?>" id="find" />
              <input type="password" class="password" name="password"  Placeholder="<?php echo $language["cnfPassword"]; ?>" id="confirmpassword" onmouseout="valid()" />
              <span id="passerror" style="font-size:12px; color: red;"></span>

                <input type="text" class="name"  Placeholder="<?php echo $language["Gender"]; ?>" id="gender"  name="gender" readonly />
                 <input type="text" class="name"  Placeholder="<?php echo $language["Birthday"]; ?>" id="year"  name="birthday" readonly />

							

							<input type="text" class="name" maxlength="10" name="contactno" id="contactno" placeholder="<?php echo $language["Contact"]; ?>" onBlur="userPhone()" onmouseout="phoneno()" required="required" autofocus/>
              <span id="messge" style="font-size:12px; color: red;"></span>
		            
							<select name="province" id="province" onChange="getState(this.value);" required="required"  >
		                  <option value=""><?php echo $language["selectprovince"]; ?></option>
		                      <?php $sql=mysqli_query($con,"select id,provinceName from province ");
		                      
		                      while ($rw=mysqli_fetch_array($sql)) {
		                        ?>
		                        <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['provinceName']);?></option>
		                      <?php
		                      }
		                      ?>
		                  </select>
                
		                  <select name="state" id="state" onChange="getCity(this.value);" required="required">
		                  <option value="" ><?php echo $language["selectdistrict"]; ?></option>
		                  </select>
		                 
		                  <select name="city" id="city"  required="required" >
		                  <option value=""><?php echo $language["selectcity"]; ?></option>
		                  </select>

							<button class="btn btn-theme btn-block" type="submit" name="submit" id="submit" ><i class="fa fa-user"></i> <?php echo $language["registration"]; ?></button>
						</form> 	
					</div> 
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
		<!-- //login form -->
		<br>
		
		<!-- //social icons -->

		<!-- //copyright --> 
	</div>	
	<!-- //main -->
	<?php include('../includes/footer_login_register.php');?>

	<script src="js/js/jquery.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
</body>
</html>