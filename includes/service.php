<div class="content">
    <div class="services-section">
        <div class="container">
            <h3>Our Services</h3>
            <div class="services-section-grids">
                <div class="col-md-4 services-section-grid1">
                    <div class="services-section-grid1-top">
                        <h4><?php echo $language["header1"]; ?></h4>
                        <p><?php echo $language["description1"]; ?></p>
                        <div class="icons">
                            <div class="icon-left">
                                <i class="call"></i>
                            </div>
                            <div class="icon-right">
                                <?php 
                                $query=mysqli_query($con,"SELECT * FROM services WHERE id=1");
                                while($row=mysqli_fetch_array($query)) 
                                {
                                ?> 
                                <a href="<?php echo htmlentities($row['link']);?>"><i class="arrow arrow1"></i></a><?php }?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                    <div class="services-section-grid1-bottom">
                        <h4><?php echo $language["header2"]; ?></h4>
                        <p><?php echo $language["description2"]; ?></p>
                        <div class="icons">
                            <div class="icon-left">
                                <i class="callmsg"></i>
                            </div>
                            <div class="icon-right">
                                <?php 
                                $query=mysqli_query($con,"SELECT * FROM services WHERE id=2");
                                while($row=mysqli_fetch_array($query)) 
                                {
                                ?> 
                                <a href="<?php echo htmlentities($row['link']);?>"><i class="arrow arrow1"></i></a><?php }?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 services-section-grid2">
                    <h4><?php echo $language["header3"]; ?></h4>
                    <p><?php echo $language["description3"]; ?></p>
                    <div class="icons icons2">
                            <div class="icon-left">
                                <i class="interact"></i>
                            </div>
                            <div class="icon-right">
                               <?php 
                                $query=mysqli_query($con,"SELECT * FROM services WHERE id=3");
                                while($row=mysqli_fetch_array($query)) 
                                {
                                ?> 
                                <a href="<?php echo htmlentities($row['link']);?>"><i class="arrow arrow1"></i></a><?php }?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                </div>
                <div class="col-md-4 services-section-grid3">
                    <div class="services-section-grid3-top">
                        <h4><?php echo $language["header4"]; ?></h4>
                        <p><?php echo $language["description4"]; ?></p>
                        <div class="icons">
                            <div class="icon-left">
                                <i class="dt"></i>
                            </div>
                            <div class="icon-right">
                                <?php 
                                $query=mysqli_query($con,"SELECT * FROM services WHERE id=4");
                                while($row=mysqli_fetch_array($query)) 
                                {
                                ?> 
                                <a href="<?php echo htmlentities($row['link']);?>"><i class="arrow arrow1"></i></a><?php }?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="services-section-grid3-bottom">
                        <h4><?php echo $language["header5"]; ?></h4>
                        <p><?php echo $language["description5"]; ?></p>
                        <div class="icons">
                            <div class="icon-left">
                                <i class="zoom"></i>
                            </div>
                            <div class="icon-right">
                                <?php 
                                $query=mysqli_query($con,"SELECT * FROM services WHERE id=5");
                                while($row=mysqli_fetch_array($query)) 
                                {
                                ?> 
                                <a href="<?php echo htmlentities($row['link']);?>"><i class="arrow arrow1"></i></a><?php }?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>