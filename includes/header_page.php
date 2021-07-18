
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
                <a href="index.php"><img src="images/logo/logo.png" class="img-responsive" alt="" width="217" height="63" /></a>
                <?php else:?>
                    <a href="index.php"><img src="images/logo/<?php echo htmlentities($logophoto);?>" class="img-responsive" alt="" width="217" height="63"/></a>
                <?php endif;?><?php } ?>
            </div>
            <div class="header-right">
                <?php $query=mysqli_query($con," SELECT ContactNo FROM `tblcontactusinfo`");
                     while($row=mysqli_fetch_array($query)) 
                     {
                     ?>
                    <?php 
$pagetype=$_GET['type'];
?>
  
                  <div>
                 <h4><a href="tel:<?php echo htmlentities($row['ContactNo']);?>"><i class="phone"></i><font color="white"><?php echo htmlentities($row['ContactNo']);?></a></font> <?php }?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <selection style="
float: right;
    margin-right: 8px;
    border: 1px solid #fff;
    border-radius: 3px;
    padding-top: 0px;
    padding-bottom: 2px;
    padding-right: 5px;
    padding-left: 5px;
    text-align: auto;
"> 
<a href="?type=<?php echo $pagetype ; ?>&lang=en"  <?php if($lang == 'en'){?> style="color:#ff9900;" <?php } ?>><font size="5px" style="color:#ff9900;">English</font></a>&nbsp;|
<a href="?type=<?php echo $pagetype ; ?>&lang=si"  <?php if($lang == 'si'){?> style="color:#ff9900;" <?php } ?>><font size="5px" style="color:#ff9900;">සිංහල</font></a>&nbsp;|
<a href="?type=<?php echo $pagetype ; ?>&lang=ta"  <?php if($lang == 'ta'){?> style="color:#ff9900;" <?php } ?>><font size="4px" style="color:#ff9900;">தமிழ்</font></a></div></selection>
                 </h4>
                <span class="menu"></span>
                <div class="top-menu">
                    <ul>
                        <div class="space"><br></div>
                        <a href="?type=<?php echo $pagetype ; ?>&lang=en"  <?php if($lang == 'en'){?> style="color:#ff9900;" <?php } ?>><button class="as">English</button></a>
                        <a href="?type=<?php echo $pagetype ; ?>&lang=si"  <?php if($lang == 'si'){?> style="color:#ff9900;" <?php } ?>><button class="as">Sinhala</button></a>
                        <a href="?type=<?php echo $pagetype ; ?>&lang=ta"  <?php if($lang == 'ta'){?> style="color:#ff9900;" <?php } ?>><button class="as">Tamil</button></a>
                        <li><a class="active" href="index.php"><?php echo $language["home"]; ?></a></li>                                       
                        <li><a href="users/index.php"><?php echo $language["login"]; ?></a></li>
                        <li><a href="users/registration.php"><?php echo $language["register"]; ?></a></li>
                        <li><a href="page.php?type=aboutus"><?php echo $language["aboutus"]; ?></a></li>
                        <li><a href="page.php?type=whyus"><?php echo $language["whyus"]; ?></a></li>
                        <li><a href="contact.php"><?php echo $language["contactus"]; ?></a></li>
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