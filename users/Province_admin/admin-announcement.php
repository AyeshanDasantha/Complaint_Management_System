<div class="alert alert-annosment">
									<?php 
										$query=mysqli_query($con,"SELECT discription FROM announcement where id=1");
										while($row=mysqli_fetch_array($query)) 
										{
										?>
										<form name="state" method="post" >
									<button class="close" data-dismiss="alert">x</button>
								</form>
									<p><?php echo ($row['discription']);?></p><?php } ?>
									</div>