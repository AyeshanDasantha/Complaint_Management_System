  
  
  <footer class="py-5 bg-inverse">
        <div class="container">
            <div class="ftr-grid-main">
            	<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
				<div class="footer-grid">
					<ul>
						<li>
			                <?php $logophoto=$row['setting_description'];
			                if($logophoto==""):
			                ?>
                				<a href="index.php"><img src="images/logo/logo.png" class="img-responsive" alt="" width="170" height="63" /></a>
                			<?php else:?>
                    			<a href="index.php"><img src="images/logo/<?php echo htmlentities($logophoto);?>" class="img-responsive" alt="" width="170" height="63"/></a>
                			<?php endif;?><?php } ?>
                		</li>
                		
					</ul>					
				</div>
				<div class="footer-grid">
					<h3><?php echo $language["aboutus"]; ?></h3>
					<ul>
						<li><a href="page.php?type=mission"><?php echo $language["mission"]; ?></a></li>
						<li><a href="page.php?type=vision"><?php echo $language["vision"]; ?></a></li>	
						<li><a href="page.php?type=terms"><?php echo $language["terms"]; ?></a></li>	
						<li><a href="page.php?type=faqs"><?php echo $language["faqs"]; ?></a></li>
						<li><a href="map"><?php echo $language["cmpcount"]; ?></a></li>						
					</ul>	
				</div>
				<div class="footer-grid">
					<h3><?php echo $language["ourwork2"]; ?></h3>
					<p><?php echo $language["ourwork"]; ?></p>	
				</div>
				<div class="footer-grid">
				<?php $query=mysqli_query($con,"SELECT * from footerlink where id=1");
		        while($row=mysqli_fetch_array($query))
		        {
		        	$app = $row['link'];
		        	$empty= "#";        	
		        ?>
						<?php
						if($app==$empty)
			        	{?>
			        		
			        	
			        	<?php }    
                        else {?>
                        	<h3><?php echo $language["downloadapp"]; ?></h3>
							<ul class="downloadapp-icon">
			        		<li><a href="<?php echo $app;?>" target="_blank" class="android"> </a></li>
						<?php } ?>
                        <?php }?>

                        <?php $query=mysqli_query($con,"SELECT * from footerlink where id=6");
		        while($row=mysqli_fetch_array($query))
		        {
		        	$apple = $row['link'];
		        	$empty= "#";        	
		        ?>
						<?php
						if($apple==$empty)
			        	{?>
			        		
			        	
			        	<?php } 
			        	else {?>
							<?php
							if($app == $empty)
							{?>
								<h3><?php echo $language["downloadapp"]; ?></h3>
								<ul class="downloadappapple-icon">
							<?php }     
                        	else {?>
                        		
							<?php } ?>
							<ul class="downloadappapple-icon">
			        		<li><a href="<?php echo $apple;?>" target="_blank" class="apple"> </a></li>

						<?php } ?>
                        <?php }?>
					</ul>
				</div>
				<div class="footer-grid">
				<?php $query=mysqli_query($con,"SELECT * from footerlink where id=2");
		        while($row=mysqli_fetch_array($query))
		        {
		        	$fb = $row['link'];
		        	$empty= "#";        	
		        ?>
		        <?php
						if($fb==$empty)
			        	{?>
			        		
			        	<?php }     
                        else {?>
                        	<h3><?php echo $language["followus"]; ?></h3>
							<ul class="social-icon">
							<li><a href="<?php echo $fb;?>" target="_blank" class="fb"> </a></li>
						<?php } ?>
                        <?php }?>
					<?php $query=mysqli_query($con,"SELECT * from footerlink where id=3");
		        while($row=mysqli_fetch_array($query))
		        {
		        	$twiter = $row['link'];
		        	$empty= "#";        	
		        ?>
		        <?php
						if($twiter==$empty)
			        	{?>
			        		
			        	<?php }     
                        else {?>
							<?php
							if($fb == $empty)
							{?>
								<h3><?php echo $language["followus"]; ?></h3>
								<ul class="social-icon">
							<?php }     
                        	else {?>
                        		
							<?php } ?>
							<li><a href="<?php echo $twiter;?>" target="_blank" class="tw"> </a></li>
						<?php } ?>
                        <?php }?>

					</ul>
				</div>
				<div class="clear"> </div>
		    </div>
		    <div class="ftr-bottom">
		    	<div class="ftr-bottom-grid">
		    		<h3><?php echo $language["payoption"]; ?></h3>
					<ul>
					   <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="250"/></a>

					</ul>
		    	</div>
		    	<div class="ftr-bottom-grid">
		    		<?php $query=mysqli_query($con,"SELECT Address from tblcontactusinfo");
		            while($row=mysqli_fetch_array($query))
		            {
		            ?> 
		    		<h3><?php echo $language["address2"]; ?></h3>
					<p><?php echo htmlentities($row['Address']);?></p>
                    <?php } ?>
		    	</div>
		    	<div class="ftr-bottom-grid">
		    		<h3><?php echo $language["addiinfo2"]; ?></h3>
					<p><?php echo $language["addiinfo"]; ?></p>
		    	</div>
		    	<div class="clear"> </div>
		    	<div>
		    		<br>
		    		<?php
		    		$query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
						date_default_timezone_set($row['setting_description']);
						$currentyear = date( 'Y', time () );
		    		?>
		    		<?php $query=mysqli_query($con,"SELECT * from footerlink where id=4");
		            while($row=mysqli_fetch_array($query))
		            {
		            	$copyright = $row['name'];
		            ?>
		            <?php
		            if(empty($copyright))
		            {?>
			        		
			        <?php }     
                    else {?>
		    			<p class="m-0 text-center text-white">Copyright &copy; <a href="<?php echo htmlentities($row['link']);?>" style="color: white"><?php echo htmlentities($row['name']);?></a> <?php echo $currentyear;?></p>
		    		<?php } ?>
		    		<?php $query=mysqli_query($con,"SELECT * from footerlink where id=5");
		            while($row=mysqli_fetch_array($query))
		            {
		            	$made = $row['name'];        	
		            ?>
		            <?php
		            if(empty($made))
		            {?>
			        		
			        <?php }     
                    else {?>
		    			<p class="m-0 text-center text-white"><a href="<?php echo htmlentities($row['link']);?>" style="color: white"><?php echo ($row['name']);?></p></a>
		    		<?php } ?>
		    	</div><?php } ?><?php } ?><?php } ?>
		    </div>
		    
		</div>
        </div>
        <!-- /.container -->
    </footer>