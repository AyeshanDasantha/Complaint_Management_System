<?php
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=20");
    while($row=mysqli_fetch_array($query)) 
    {
        $Mullaitivu_all=$row['COUNT(complaintNumber)'];
    }
    //Not Process CMP
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=20 and status is null");
    while($row=mysqli_fetch_array($query)) 
    {
        $Mullaitivu_not=$row['COUNT(complaintNumber)'];
    }
    //In Process CMP
    $inpro='in process';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=20 and status='$inpro'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Mullaitivu_in=$row['COUNT(complaintNumber)'];
    }
    //closed
    $close='closed';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=20 and status='$close'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Mullaitivu_close=$row['COUNT(complaintNumber)'];
    }




?>