	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
				<li><a href="#"><i class="fa fa-files-o"></i>Manage Complaint</a>
					<ul>
						<?php
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null and province ='".$_SESSION['province']."'");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="notprocess-complaint.php">Not Process Yet Complaint &nbsp;&nbsp; <span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						 <?php 
						  $status="in Process";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status' and province ='".$_SESSION['province']."'");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="inprocess-complaint.php">In Process Complaint &nbsp;&nbsp; <span class="label info">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						<?php 
						  $status="closed";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status' and province ='".$_SESSION['province']."'");
						$num1 = mysqli_num_rows($rt);
						{?>						
						<li><a href="closed-complaint.php">Closed Complaints &nbsp;&nbsp; <span class="label success">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
					</ul>
				</li>
				<?php 
				$status="Not Process Yet";                   
				$rt = mysqli_query($con,"SELECT * from appealcomplaint WHERE status='$status' and province ='".$_SESSION['province']."'");
				$num1 = mysqli_num_rows($rt);
				{?>	
				<li><a href="complaint-appeal.php"><i class="fa fa-rocket"></i>Complaint Appeal &nbsp;&nbsp; <span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
				<li class="logout"><a href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
				<li><a href="#"><i class="fa fa-users"></i>Manage Users</a>
					<ul>
						<li><a href="manage-users.php">Manage users</a></li>
						<li><a href="add-users.php">Add users</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-map-marker"></i>Manage State</a>
					<ul>
						<li><a href="state.php">Add District</a></li>
						<li><a href="city.php">Add City</a></li>
					</ul>
				</li>
				<li><a href="user-logs.php"><i class="fa fa-list"></i>User Login Log</a></li>
				<li><a href="#"><i class="fa fa-comment-o"></i>User Feedback</a>
					<ul>
						<li><a href="feedback-static.php">Feedback Dashboard</a></li>
						<li><a href="feedback-all.php">All Feedback</a></li>
						<li><a href="feedback-user-wise.php">User Wise Feedback</a></li>
					</ul>
				</li>
			</ul>
		</nav>