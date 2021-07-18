<div class="brand clearfix">

				<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
                <?php $logophoto=$row['setting_description'];
                if($logophoto==""):
                ?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/logo/logo.png" alt="" class="header" /></a>
                <?php else:?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/logo/<?php echo htmlentities($logophoto);?>" alt="" class="header"/></a>&nbsp;
                <?php endif;?><?php } ?>
<?php
$id=intval($_GET['cid']);
?>
	<selection style="
    margin-right: 8px;
    border: 1px solid #fff;
    border-radius: 3px;
    padding-top: 4px;
    padding-bottom: 2px;
    padding-right: 5px;
    padding-left: 5px;
"> 
<a href="?cid=<?php echo $id ; ?>&lang=en"  <?php if($lang == 'en'){?> style="color:#ff9900;" <?php } ?>><font size="3px" style="color:#ff9900;">English</font></a>&nbsp;<font size="3px" style="color:white;">|</font>&nbsp;
<a href="?cid=<?php echo $id ; ?>&lang=si"  <?php if($lang == 'si'){?> style="color:#ff9900;" <?php } ?>><font size="3px" style="color:#ff9900;">සිංහල</font></a>&nbsp;<font size="3px" style="color:white;">|</font>&nbsp;
<a href="?cid=<?php echo $id ; ?>&lang=ta"  <?php if($lang == 'ta'){?> style="color:#ff9900;" <?php } ?>><font size="2px" style="color:#ff9900;">தமிழ்</font></a></selection>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>

		<ul class="ts-profile-nav">
			<li class="ts-account">
				<?php $query=mysqli_query($con,"select fullName,userImage,gender from users where userEmail='".$_SESSION['login']."'");
				 while($row=mysqli_fetch_array($query)) 
				 {
				 ?> 
				  <?php 
				  $gender=$row['gender'];
				  $male='Male';
				 $userphoto=$row['userImage'];
				if($userphoto==""):
				?>
				<?php
				if($gender==$male)
				{?>
				<a href="#"><img src="userimages/no-image/male.png"  class="img-circle" width="25" height="25" alt="">&nbsp;&nbsp; <?php echo htmlentities($row['fullName']);?> <i class="fa fa-angle-down hidden-side"></i></a>
				<?php }	
				else {?>
				<a href="#"><img src="userimages/no-image/female.png"  class="img-circle" width="25" height="25" alt="">&nbsp;&nbsp; <?php echo htmlentities($row['fullName']);?> <i class="fa fa-angle-down hidden-side"></i></a>	
				<?php } ?>
				<?php else:?>

				<a href="#"><img src="userimages/<?php echo htmlentities($userphoto);?>" class="img-circle" width="25" height="25" alt=""> &nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?> <i class="fa fa-angle-down hidden-side"></i></a><?php endif;?>
				<?php } ?>
				<ul>
					<li><a href="change-password.php"><i class="fa fa-key"></i> &nbsp;<?php echo $language["Change_Password"]; ?></a></li>
					<li><a href="update-image.php"><i class="fa fa-camera"></i> &nbsp;<?php echo $language["Change_Photo"]; ?></a></li>
					<li ><a href="../index.php" target="_blank"><i class="fa fa-home"></i>  &nbsp;<?php echo $language["home"]; ?></a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> &nbsp;<?php echo $language["logout"]; ?></a></li>
				</ul>
			</li>
		</ul>
	</div>
