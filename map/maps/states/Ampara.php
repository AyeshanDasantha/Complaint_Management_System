<?php
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=1");
    while($row=mysqli_fetch_array($query)) 
    {
        $Ampara_all=$row['COUNT(complaintNumber)'];
    }
    //Not Process CMP
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=1 and state is null");
    while($row=mysqli_fetch_array($query)) 
    {
        $Ampara_not=$row['COUNT(complaintNumber)'];
    }
    //In Process CMP
    $inpro='in process';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=1 and status='$inpro'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Ampara_in=$row['COUNT(complaintNumber)'];
    }
    //closed
    $close='closed';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=1 and status='$close'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Ampara_close=$row['COUNT(complaintNumber)'];
    }




?>