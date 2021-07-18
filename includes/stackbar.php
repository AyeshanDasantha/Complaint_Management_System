<!-- Stack Bar -->
<div class="page-info page-info-lite rounded">
        <div class="text-center section-promo">
            <div class="row">
    
                                <div class="col-sm-4 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon icon-docs"></i>
                            </div>
                            <div class="iconbox-wrap-content">
<?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>

                                <h3><span><?php echo htmlentities($num1);?></span></h3> <?php }?>
                                <div class="iconbox-wrap-text"><h5><?php echo $language["closed_cmp"]; ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>



                    
                                <div class="col-sm-4 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon icon-group"></i>
                            </div>
                            <div class="iconbox-wrap-content">
 <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>                 

                                <h3><span><?php echo htmlentities($num1);?></span></h3><?php }?>
                                <div class="iconbox-wrap-text"><h5><?php echo $language["inpro_cmp"]; ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                                <div class="col-sm-4 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon icon-map"></i>
                            </div>
                            <div class="iconbox-wrap-content">
 <?php
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>

                                <h3><span><?php echo htmlentities($num1);?></span></h3><?php }?>
                                <div class="iconbox-wrap-text"><h5><?php echo $language["not_pro_cmp"]; ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>