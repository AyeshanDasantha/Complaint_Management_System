 <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                
            </ol>
            
            <div class="carousel-inner " role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=5");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
                <?php $banner=$row['setting_description'];
                if($banner==""):
                ?>
                <div class="carousel-item active" style="background-image: url('images/banner/banner1.jpg')">
                <?php else:?>
                <div class="carousel-item active" style="background-image: url('images/banner/<?php echo htmlentities($banner);?>')">
                <?php endif;?><?php } ?>
                    <?php 
                    $id=1;
                    $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                    while($row=mysqli_fetch_array($query)) 
                    {

                        $row = $row['status'];

                        if ($row == 1)
                        { 
                            $id=1;
                            $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                            while($row2=mysqli_fetch_array($query)) 
                                {
                                     $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                                     while($row=mysqli_fetch_array($query)) 
                                     {
                                    date_default_timezone_set($row['setting_description']);
                                    $currentdate = date('Y-m-d');
                                    $row2 = $row2['expire'];
                                    
                                    if ($row2 >= $currentdate) 
                                    {
                                        $id=1;
                                        $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                                        while($row3=mysqli_fetch_array($query))
                                        {
                                            $row3 = $row3['startdate'];
                                            if ($row3 <= $currentdate) 
                                            {
                                               include('includes/bannerinfo.php');
                                            }
                                        }
                                    }
                               }  }
                        }
                    ?>  
                    <?php }?>
            
         <div class="carousel-caption d-none d-md-block">
                       
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=6");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
                <?php $banner=$row['setting_description'];
                if($banner==""):
                ?>
                <div class="carousel-item active" style="background-image: url('images/banner/banner2.jpg')">
                <?php else:?>
                <div class="carousel-item" style="background-image: url('images/banner/<?php echo htmlentities($banner);?>')"> <?php endif;?><?php } ?>
                     <?php 
                    $id=2;
                    $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                    while($row=mysqli_fetch_array($query)) 
                    {
                        $row = $row['status'];
                        if ($row == 1)
                        { 
                            $id=2;
                            $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                            while($row2=mysqli_fetch_array($query)) 
                                {
                                    $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                                     while($row=mysqli_fetch_array($query)) 
                                     {
                                    date_default_timezone_set($row['setting_description']);
                                    $currentdate = date('Y-m-d');
                                    $row2 = $row2['expire'];
                                    
                                    if ($row2 >= $currentdate) 
                                    {
                                        $id=2;
                                        $query=mysqli_query($con,"SELECT * FROM sliderbanner WHERE id='$id'");
                                        while($row3=mysqli_fetch_array($query))
                                        {
                                            $row3 = $row3['startdate'];
                                            if ($row3 <= $currentdate) 
                                            {
                                               include('includes/bannerinfo_second.php');
                                            }
                                        }
                                    }
                              }   }
                        }
                    ?>  
                    <?php }?>
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
