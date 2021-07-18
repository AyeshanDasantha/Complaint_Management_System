<?php 
require_once("../config/config.php");
if(!empty($_POST["cmpno"])) {
	$cmpno= $_POST["cmpno"];
	
		$result =mysqli_query($con,"SELECT cmpNo FROM feedback WHERE cmpNo='$cmpno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> You Alredy feedback To this complaint .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> </span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
