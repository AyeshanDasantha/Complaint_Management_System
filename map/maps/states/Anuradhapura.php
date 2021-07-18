<?php
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=24");
    while($row=mysqli_fetch_array($query)) 
    {
        $Anuradhapura_all=$row['COUNT(complaintNumber)'];
    }
    //Not Process CMP
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=24 and status is null");
    while($row=mysqli_fetch_array($query)) 
    {
        $Anuradhapura_not=$row['COUNT(complaintNumber)'];
    }
    //In Process CMP
    $inpro='in process';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=24 and status='$inpro'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Anuradhapura_in=$row['COUNT(complaintNumber)'];
    }
    //closed
    $close='closed';
    $query=mysqli_query($con,"SELECT COUNT(complaintNumber) FROM tblcomplaints  where state=24 and status='$close'");
    while($row=mysqli_fetch_array($query)) 
    {
        $Anuradhapura_close=$row['COUNT(complaintNumber)'];
    }




?>