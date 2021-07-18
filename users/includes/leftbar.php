	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label"></li>
				<?php $query=mysqli_query($con,"select fullName,userImage,gender from users where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <li align="center">
 <?php 
 $gender=$row['gender'];
 $male='Male';
 $userphoto=$row['userImage'];
if($userphoto==""):
?>
<?php
if($gender==$male)
{?>
<img src="userimages/no-image/male.png"  class="img-circle" width="100" height="100" >
<?php }	
else {?>
<img src="userimages/no-image/female.png"  class="img-circle" width="100" height="100" >	
<?php } ?>
<?php else:?>
  <img src="userimages/<?php echo htmlentities($userphoto);?>" class="img-circle" width="100" height="100">

<?php endif;?></li><hr/>
                  <?php } ?>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <?php echo $language["Dashboard"]; ?></a></li>

				<li><a href="profile.php"><i class="fa fa-cog"></i><?php echo $language["Account_setting"]; ?></a></li>
				
				
				<li><a href="register-complaint.php"><i class="fa fa-files-o"></i><?php echo $language["Lodge_cmp"]; ?></a></li>
				<li><a href="complaint-history.php"><i class="fa fa-desktop"></i><?php echo $language["Complaint_History"]; ?></a></li>
				<li><a href="apeal-complaint.php"><i class="fa fa-rocket"></i><?php echo $language["Appealcmp"]; ?></a></li>
				<li><a href="appeal-history.php"><i class="fa fa-history"></i><?php echo $language["Appealhistory"]; ?></a></li>
				<li><a href="feedback.php"><i class="fa fa-comments-o"></i><?php echo $language["Feedback"]; ?></a></li>
				
				<li class="logout"><a href="change-password.php"><i class="fa fa-key"></i><?php echo $language["Change_Password"]; ?></a></li>
				<li class="logout"><a href="logout.php"><i class="fa fa-sign-out"></i><?php echo $language["logout"]; ?></a></li>

			</ul>
		</nav>