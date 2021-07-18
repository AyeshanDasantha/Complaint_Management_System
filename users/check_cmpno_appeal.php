<?php 
require_once("../config/config.php");
if(!empty($_POST["cmpno"])) {
	$cmpno= $_POST["cmpno"];
		$result =mysqli_query($con,"SELECT complaintNo FROM appealcomplaint WHERE complaintNo='$cmpno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> You Alredy Appeal To this complaint Or complaint on process.Please check complaint no Again.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> </span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
