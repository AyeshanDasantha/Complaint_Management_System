<!-- header-section-starts -->
    <div class="header">
        <div class="container">
           <div class="logo">
                <?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
                <?php $logophoto=$row['setting_description'];
                if($logophoto==""):
                ?>
                <a href="index.php"><img src="../images/logo/logo.png" class="img-responsive" alt="" width="217" height="63" /></a>
                <?php else:?>
                    <a href="../index.php"><img src="../images/logo/<?php echo htmlentities($logophoto);?>" class="img-responsive" alt="" width="217" height="63"/></a>
                <?php endif;?><?php } ?>
            </div>
            <div class="header-right">
                <?php $query=mysqli_query($con," SELECT ContactNo FROM `tblcontactusinfo`");
                     while($row=mysqli_fetch_array($query)) 
                     {
                     ?> 
                  
                 <h4><i class="phone"></i><?php echo htmlentities($row['ContactNo']);?> <?php }?>
                 </h4>
                <span class="menu"></span>
                <div class="top-menu">
                    <ul>
                        <li><a href="../index.php">Home</a></li>                                       
                        <li><a href="index.php">Login</a></li>
                        <li><a href="registration.php">Register</a></li>
                        <li><a href="../page.php?type=aboutus">About Us</a></li>
                        <li><a href="../page.php?type=whyus">Why us</a></li>
                        <li><a href="../contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- script for menu -->
                <script>
                $( "span.menu" ).click(function() {
                  $( ".top-menu" ).slideToggle( "slow", function() {
                    // Animation complete.
                  });
                });
            </script>
            <!-- script for menu -->

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- header-section-ends -->