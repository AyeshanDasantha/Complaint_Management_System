<?php
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=12");
    while($row=mysqli_fetch_array($query)) 
    {
        $Galle_all=$row['COUNT(complaintNumber)'];
    }
    //Not Process CMP
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=12 and status is null");
    while($row=mysqli_fetch_array($query)) 
    {
        $Galle_not=$row['COUNT(complaintNumber)'];
    }
    //In Process CMP
    $inpro='in process';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=12 and status='$inpro'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Galle_in=$row['COUNT(complaintNumber)'];
    }
    //closed
    $close='closed';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=12 and status='$close'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Galle_close=$row['COUNT(complaintNumber)'];
    }




?>