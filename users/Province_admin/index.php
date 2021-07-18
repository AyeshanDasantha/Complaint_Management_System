<?php
session_start();
error_reporting(0);
include('../../config/config.php');
if(strlen($_SESSION['plogin'])==0)
	{	
header('location:../index.php');
}
else{
 $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
date_default_timezone_set($row['setting_description']);
$currentTime = date( 'd-m-Y h:i:s A', time () );
}
}
?>