<?php 
require_once("../config/config.php");
if(!empty($_POST["contactno"])) {
	$contactno= $_POST["contactno"];
	
		$result =mysqli_query($con,"SELECT contactNo FROM users WHERE contactNo='$contactno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Phone NO already Useing Anothor User USe Another NO .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> </span>";
	 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
