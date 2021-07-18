<?php
include('../InvoicePrinter.php');
include('../../config/config.php');
$invoice = new InvoicePrinter();
  /* Header Settings */

  $invoice->setTimeZone('Asia/Colombo');
  $invoice->setLogo("../../images/recipt/example2.png");
  $invoice->setColor("#f7540e");
  $invoice->setType("Payment Recipt");
  $link=mysqli_query($con,"SELECT * FROM genaralsetting where id=2");
  while($row=mysqli_fetch_array($link))
    {
      $url=$row['setting_description'];
  $invoice->setReference($url);}
  $invoice->setDate(date('M dS ,Y',time()));
  // $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));
  
  $contact=mysqli_query($con,"SELECT * FROM tblcontactusinfo");
  while($row=mysqli_fetch_array($contact))
    {
      $address=$row['Address'];
      $pno=$row['ContactNo'];
      $email=$row['EmailId'];
  $invoice->setFrom(array("Recipt From",$address,$email,$pno));}
    
  $billto=mysqli_query($con,"SELECT appealcomplaint.UserID,users.fullName,users.address,users.contactNo FROM appealcomplaint INNER JOIN users ON appealcomplaint.UserID=users.id WHERE appealcomplaint.id='".$_GET['id']."'");
 while($row=mysqli_fetch_array($billto))
    {
      $fullname=$row['fullName'];
      $address=$row['address'];
      $contactno=$row['contactNo'];
   $invoice->setTo(array("Recipt TO",$fullname,$address,$contactno));}
  /* Adding Items in table */
  $detail=mysqli_query($con,"SELECT * from appealcomplaint WHERE id='".$_GET['id']."'");
 while($row=mysqli_fetch_array($detail))
    {
      $appealno=$row['id'];
      $cmpno=$row['complaintNo'];
      $appealdate=$row['DateTime'];
      $paymentdate=$row['paymentDateTime'];

  $invoice->addItem("Appeal No",$appealno);
  $invoice->addItem("Complaint No",$cmpno);
  $invoice->addItem("Appeal Date",$appealdate);
  $invoice->addItem("Payment Status","Successful");
  $invoice->addItem("Payment Date",$paymentdate);
}
$cur=mysqli_query($con,"SELECT * from genaralsetting where id=8");
while($row=mysqli_fetch_array($cur))
{
  $currency=$row['setting_description'];

$detail=mysqli_query($con,"SELECT * from charges WHERE id=1");
while($row=mysqli_fetch_array($detail))
    {
      $appealcharge=$row['ChargeAmount'];
      $detail=mysqli_query($con,"SELECT * from charges WHERE id=2");
while($row=mysqli_fetch_array($detail))
    {
      $servicecharge=$row['ChargeAmount'];
      $total=$appealcharge + $servicecharge;
  /* Add totals */
  $invoice->addTotal("Appeal Fee",$currency ." ".$appealcharge."");
  $invoice->addTotal("Service Charges",$currency ." ".$servicecharge);
  $invoice->addTotal("Total due",$currency ." ".$total,true);}}}
  /* Set badge */ 
  $invoice->addBadge("Payment Paid");
  /* Add title */
  $invoice->addTitle("Important Notice");
  /* Add Paragraph */
  $invoice->addParagraph("This is System Genarated Recipt do not required Signature
Thank You");
  /* Set footer note */
  $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
    date_default_timezone_set($row['setting_description']);
    $currentTime = date( 'd-m-Y h:i:s A', time () );
  $invoice->setFooternote($currentTime);}
  /* Render */
  $invoice->render('Payment-Recipt.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */

?>
