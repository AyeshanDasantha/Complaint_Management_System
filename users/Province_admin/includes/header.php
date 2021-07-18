<div class="brand clearfix">
	<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
	<?php $logophoto=$row['setting_description'];
                if($logophoto==""):
                ?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/logo/logo.png" alt="" class="header" /></a>
                <?php else:?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/logo/<?php echo htmlentities($logophoto);?>" alt="" class="header"/></a>
                <?php endif;?><?php } ?> 
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<?php
				$ut=2;
				$query=mysqli_query($con,"select fullName from users where province = '".$_SESSION['province']."' and usertype='$ut' and userEmail='".$_SESSION['plogin']."'");
				 while($row=mysqli_fetch_array($query)) 
				 {
				 ?> 
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php echo htmlentities($row['fullName']);?> <i class="fa fa-angle-down hidden-side"></i></a><?php } ?>
				<ul>
					<li><a href="change-password.php"><i class="fa fa-key"></i>  Change Password</a></li>
					<li ><a href="../../index.php"><i class="fa fa-home"></i>  Home</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
