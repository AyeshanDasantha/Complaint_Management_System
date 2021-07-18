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
    $cmpno=$_POST['cmpno'];
    $userEmail = $_SESSION['login'];
    $feedback = $_POST['feedback'];
    $comment = $_POST['comment'];
    $ret=mysqli_query($con,"SELECT complaintNumber FROM tblcomplaints INNER JOIN users ON tblcomplaints.userId = users.id WHERE tblcomplaints.complaintNumber ='$cmpno' and users.userEmail='".$_SESSION['login']."'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $query=mysqli_query($con,"SELECT tblcomplaints.province FROM tblcomplaints INNER JOIN users ON tblcomplaints.province = users.province WHERE users.userEmail='".$_SESSION['login']."'");
        while($row=mysqli_fetch_array($query)) 
        {
          $province = $row['province'];

        $query=mysqli_query($con,"insert into feedback(userEmail,cmpNo,feedbackValue,comment,province) values('$userEmail','$cmpno','$feedback','$comment','$province')");
        if($query)
        {
            $successmsg=$language["feedbackdone"];

        } 
        else
        {
            $errormsg2=$language["feedbackfail"];
        }  
      }
    }
    else
    {
        $errormsg=$language["cmpnowrong"];
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
  <script >
      function checkcmp() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "check_cmpno.php",
      data:'cmpno='+$("#cmpno").val(),
      type: "POST",
      success:function(data){
      $("#messge").html(data);
      $("#loaderIcon").hide();
      },
      error:function (){}
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
          
            <h2 class="page-title"><?php echo $language["feedback"]; ?></h2>

           <!--  <div class="row">
              <div class="col-md-10"> -->
                <div class="panel panel-default">
                  <div class="panel-heading"><?php echo $language["feedback_dis"]; ?></div>
                  <div class="panel-body">
                    <form method="post"  class="form-horizontal">
          
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

                      <?php if($errormsg2)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <b><?php echo $language["ohsnap"]; ?></b> </b> <?php echo htmlentities($errormsg2);?></div>
                      <?php }?>
                   
                      <div class="form-group">
                        <label class="col-sm-4 control-label"><?php echo $language["your_cmp_no"]; ?></label>
                        <div class="col-sm-8">
                          <input type="text" name="cmpno" id="cmpno" onBlur="checkcmp()" required="required" class="form-control">
                          <li><span id="messge" style="font-size:12px; color: red;"></span></li>
                        </div>
                      </div>
                      <div class="hr-dashed"></div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label"><?php echo $language["satisfiedservice"]; ?></label><br>
                        <div class="col-sm-8">
                           <input type="radio" name="feedback" value="Excellent" required="required">  <?php echo $language["Excellent"]; ?> <br>
                           <input type="radio" name="feedback" value="Good" required="required">  <?php echo $language["Good"]; ?> <br>
                           <input type="radio" name="feedback" value="Neutral" required="required">  <?php echo $language["Neutral"]; ?> <br>
                           <input type="radio" name="feedback" value="Poor" required="required">  <?php echo $language["Poor"]; ?> <br>
                           <input type="radio" name="feedback" value="VeryPoor" required="required">  <?php echo $language["VeryPoor"]; ?> <br>
                        </div>
                      </div>
                      <div class="hr-dashed"></div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label"><?php echo $language["comment"]; ?></label>
                        <div class="col-sm-8">
                          <textarea class="form-control" name="comment" ></textarea>
                        </div>
                      </div>
                      <div class="hr-dashed"></div>

                     
                      
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                
                          <button class="btn btn-primary" name="submit"  id="submit" type="submit"><?php echo $language["submit_feedback"]; ?></button>
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