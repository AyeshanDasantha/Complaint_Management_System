<?php
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
include('config/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$query=mysqli_query($con,"insert into tblcontactusquery(name,EmailId,ContactNumber,Message) values('$name','$email','$contactno','$message')");
$lastInsertId="Registration successfull. Now You can login !";
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

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

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

     <!--  header Style -->
    <link href="css/header_bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/header_style.css" rel="stylesheet" type="text/css" media="all" />
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="js/header.jquery.min.js"></script>
   <!--  / Header Style -->
   <!-- footer style -->
    <link href="css/style_footer.css" rel="stylesheet" type="text/css"> 
    <!-- end footer style -->
    <!-- Temporary navbar container fix -->
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

<body >

    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><?php echo $language["contactus"]; ?></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><?php echo $language["home"]; ?></a>
            </li>
            <li class="breadcrumb-item active"><?php echo $language["contactus"]; ?></li>
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
              <div class="col-lg-8 mb-4">
                <h3><?php echo $language["sendusmsg"]; ?></h3>
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form name="sentMessage"  method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo $language["fullname"]; ?></label>
                            <input type="text" class="form-control" id="name" name="fullname" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo $language["phoneno"]; ?></label>
                            <input type="tel" class="form-control" id="phone" name="contactno"  required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo $language["email"]; ?></label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo $language["message"]; ?></label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" name="send"  class="btn btn-primary"><?php echo $language["sendmessage"]; ?></button>
                </form>
            </div>

            <!-- Contact Details Column -->
            <?php $query=mysqli_query($con,"SELECT Address,EmailId,ContactNo,location from tblcontactusinfo");
            while($row=mysqli_fetch_array($query))
            {
            ?>                                  
            <div class="col-lg-4 mb-4">
                <h3><?php echo $language["conatctdetails"]; ?></h3>
                
                <p>
                    <p title="Phone"><?php echo $language["phoneno"];  ?> <?php echo htmlentities($row['ContactNo']);?></p> 
                </p>
                <p>
                    <p title="Email"><?php echo $language["email"]; ?>  <a href="mailto:<?php echo htmlentities($row['EmailId']);?>"><?php echo htmlentities($row['EmailId']);?>
                    </a> </p> 
                </p>
              <p>
                   <p title="Address"><?php echo $language["addres"]; ?>  <?php echo htmlentities($row['Address']);?> </p>
                    
                </p>
              <p> 
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="340" height="270" id="gmap_canvas" src="<?php echo htmlentities($row['location']);?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;height:250px;width:250px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></abbr>

                </p>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
<?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
<?php } ?>