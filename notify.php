<?php
include('config/config.php');
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$query=mysqli_query($con,"SELECT * FROM paymentsetting where id=1");
while($row=mysqli_fetch_array($query)) 
{
    $mechantsecret=$row['secret_key'];

$merchant_secret = $mechantsecret;
// Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        $sql=mysqli_query($con,"update appealcomplaint set paymentStatus = 1 where id= '$order_id'");
        
        date_default_timezone_set('Asia/Kolkata');// change according timezone
        $currentTime = date( 'd-m-Y h:i:s A', time () );
        
        $sql=mysqli_query($con,"update appealcomplaint set paymentDateTime = '$currentTime' where id= '$order_id'");

}
}
?>