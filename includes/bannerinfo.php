<?php 
$id =1;
$query=mysqli_query($con,"SELECT * FROM sliderbanner where id='$id'");
                     while($row=mysqli_fetch_array($query)) 
                     {
                     ?>  
<div class="banner-info">
                <h2><?php echo htmlentities($row['header']);?></h2>
                <p class="p1"><?php echo htmlentities($row['firstline']);?></p>
                <p class="p1" ><?php echo htmlentities($row['secondline']);?></p>
                <a href="<?php echo htmlentities($row['link']);?>" class="btn btn-1 btn-1d"><?php echo htmlentities($row['buttonname']);?></a><?php } ?>
            </div>