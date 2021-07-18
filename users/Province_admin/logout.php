<?php
session_start();
include("../../config/config.php");
$_SESSION['plogin']=="";
 $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
date_default_timezone_set($row['setting_description']);
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['plogin']."' ORDER BY id DESC LIMIT 1");
session_unset();
}
?>
<script language="javascript">
document.location="../index.php";
</script>
