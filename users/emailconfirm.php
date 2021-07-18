<?php
require "../config/config.php";
error_reporting(0);
$query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
    while($row=mysqli_fetch_array($query)) 
    {
        date_default_timezone_set($row['setting_description']);
        $currentTime = date( 'd-m-Y h:i:s A', time () );
    }
?>
<!doctype html>
<html>
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
</head>

<body>
<?php

$userEmail = $_GET['userEmail'];
$code = $_GET['code'];

$query = mysqli_query($con,"SELECT * FROM users WHERE `userEmail`='$userEmail'");
  while($row=mysqli_fetch_array($query))
{
	$db_code = $row['confir_Code'];
}
if($code == $db_code)
{
	mysqli_query($con,"UPDATE users SET `status`='1' WHERE `userEmail`='$userEmail'");
	mysqli_query($con,"UPDATE users SET `confir_Code`='0' WHERE `userEmail`='$userEmail'");
	
	// echo "Thank You. Your email has been confimed and you may now login";
	include "emailconfirmsuccess.php";
}
else
{
	// echo "Username and code dont match";	
	include "emailconfirmfail.php";
}

?>
</body>
</html>