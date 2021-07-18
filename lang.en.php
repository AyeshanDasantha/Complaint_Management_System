<?php

//Welcome
$language["welcome"] = "Welcome to CMS | Complaint Management System";

//Tips
$language["tips_one_headr"] = "What for us ?";
$language["tips_one_details"] = "This is a place which you can complain about your issues without any corruption ,<b> which is the our particular service</b>";

$language["tips_two_headr"] = "What we do ?";
$language["tips_two_details"] = "you can complain about everything without any hesitation because <b>our services are 100 % legal and uncorrupted</b>.We can guarantee about that.";

$language["tips_third_headr"] = "What we actually expected";
$language["tips_third_details"] = "The reason behind this system was to reduce the problems in Sri Lanka without any corrections.for that <b>we created a system for you.</b>";

$language["closed_cmp"] = "Closed Complaints";
$language["inpro_cmp"] = "In Process Complaints";
$language["not_pro_cmp"] = "Not Process Complaints";
$language["cmp"] = "Complaint";

$language["cmp_type"] = "Complaint type";
$language["cmp_type_details"] = "For easy to put your complaint we created Specialize some Subjects";
$language["cmp_type_long"] = "Commonly in Sri Lanka facing those some kind of issues farley .More than that we subject wise divided by some specialized matters.We did some reachers for while to found this perticular subject which are seems like major and common issues in Sri Lanka.";

$language["trackcmpheader"] = "Track Complaint";
$language["trackcmpdetails"] = "If you use our service before this is your status and complaint details.you can track your complaint using this section whic is will be a easy for you to check your compaint status and details";
$language["trackcmpbutton"] = "Track Your Complaint";

//header
$language["home"] = "Home";
$language["login"] = "Login";
$language["register"] = "Register";
$language["aboutus"] = "About Us";
$language["whyus"] = "Why us";
$language["contactus"] = "Contact Us";
//end header

//contact us
$language["sendusmsg"] = "Send us a Message";
$language["fullname"] = "Full Name : ";
$language["phoneno"] = "Phone Number : ";
$language["email"] = "Email Address : ";
$language["message"] = "Message : ";
$language["sendmessage"] = "Send Message";
$language["conatctdetails"] = "Contact Details";
$language["addres"] = "Address :  ";
//end contact us

$language["track"] = "Track Your Complaint ";
$language["trackcmp"] = "Track Complaint ";
$language["entercmpno"] = "Enter Your Complaint No";
$language["submit"] = "Submit";

$language["thankyou"] = "Thank You!";
$language["cancel"] = "Opps !!";
$language["thankyouquote"] = "Your payment has been processed successfully.";
$language["cancelyouquote"] = "We Were Unable To Process Your Appeal, Please Try Again";
$language["havingtroble"] = "Having trouble?";
$language["backtoacc"] = "Go Back To Your Account";

//footer
$language["downloadapp"] = "Download App";
$language["followus"] = "Follow us";
$language["payoption"] = "Payment Options";
$language["mission"] = "Our Mission";
$language["vision"] = "Our Vision";
$language["terms"] = "Terms and Conditions";
$language["faqs"] = "FAQs";
$language["ourwork2"] = "Our Work";
$language["addiinfo2"] = "Additional informations";
$language["address2"] = "Address";
$language["cmpcount"] = "Complaint Statistics Map";
//end footer

//Error Page
$language["errpagequote"] = "Ohh.....You Requested the page that is no longer There.";
$language["backtohome"] = "Back to Homepage";
//end
?>
<?php 
	include('config/config.php');
$pagetype=$_GET['type'];
$query=mysqli_query($con,"SELECT * from tblpages where type='$pagetype'");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['PageName'];
?>         
	<?php $language["PageName"] = $row2 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$pagetype=$_GET['type'];
$query=mysqli_query($con,"SELECT * from tblpages where type='$pagetype'");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['detail'];
?>         
	<?php $language["detail"] = $row2 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from services where id=1");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['header_en'];
	$row3 = $row['description_en'];
?>         
	<?php $language["header1"] = $row2 ;?>
	<?php $language["description1"] = $row3 ;?>
<?php } ?>


<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from services where id=2");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['header_en'];
	$row3 = $row['description_en'];
?>         
	<?php $language["header2"] = $row2 ;?>
	<?php $language["description2"] = $row3 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from services where id=3");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['header_en'];
	$row3 = $row['description_en'];
?>         
	<?php $language["header3"] = $row2 ;?>
	<?php $language["description3"] = $row3 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from services where id=4");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['header_en'];
	$row3 = $row['description_en'];
?>         
	<?php $language["header4"] = $row2 ;?>
	<?php $language["description4"] = $row3 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from services where id=5");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['header_en'];
	$row3 = $row['description_en'];
?>         
	<?php $language["header5"] = $row2 ;?>
	<?php $language["description5"] = $row3 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from footer where id=1");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['detail'];
?>         
	<?php $language["ourwork"] = $row2 ;?>
<?php } ?>

<?php 
	include('config/config.php');
$query=mysqli_query($con,"SELECT * from footer where id=2");
while($row=mysqli_fetch_array($query)) 
{
	$row2 = $row['detail'];
?>         
	<?php $language["addiinfo"] = $row2 ;?>
<?php } ?>








 




 


