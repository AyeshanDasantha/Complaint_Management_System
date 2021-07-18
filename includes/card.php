 <h2><?php echo $language["cmp"]; ?></h2>
 <br>
        <div class="row">
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                   <!--  <a href="#"><img class="card-img-top img-fluid" src="https://resilientbridgeport.com/wp-content/uploads/2016/11/in-progress-icon-01.jpg" alt="" ></a> -->
                    <div class="card-block">
                        <?php 
                    $query3=mysqli_query($con,"SELECT tblcomplaints.*,users.fullName, province.provinceName, city.cityName,category.categoryName FROM tblcomplaints INNER JOIN users ON tblcomplaints.userId=users.id INNER JOIN province ON tblcomplaints.province=province.id INNER JOIN city ON tblcomplaints.city=city.id INNER JOIN category ON tblcomplaints.category=category.id where tblcomplaints.status is Null order by rand() limit 1");
                     while($row3=mysqli_fetch_array($query3)) 
                     {
                     ?> 
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($row3['categoryName']);?></a></h4>
                        <p class="card-text"><b>Province :</b> <?php echo htmlentities($row3['provinceName']);?></p>
                        <p class="card-text"><b>City :</b> <?php echo htmlentities($row3['cityName']);?></p>
                        <p class="card-text"><b>Status : <font color="red">Not Process Yet</font></b></p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <!-- <a href="#"><img class="card-img-top img-fluid" src="https://resilientbridgeport.com/wp-content/uploads/2016/11/in-progress-icon-01.jpg" alt="" ></a> -->
                    <div class="card-block">
                         <?php 
                    $status1="in process";
                    $query1=mysqli_query($con,"SELECT tblcomplaints.*,users.fullName, province.provinceName, city.cityName,category.categoryName FROM tblcomplaints INNER JOIN users ON tblcomplaints.userId=users.id INNER JOIN province ON tblcomplaints.province=province.id INNER JOIN city ON tblcomplaints.city=city.id INNER JOIN category ON tblcomplaints.category=category.id where tblcomplaints.status='$status1' order by rand() limit 1");
                     while($row1=mysqli_fetch_array($query1)) 
                     {
                     ?> 
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($row1['categoryName']);?></a></h4>
                        <p class="card-text"><b>Province :</b> <?php echo htmlentities($row1['provinceName']);?></p>
                        <p class="card-text"><b>City :</b> <?php echo htmlentities($row1['cityName']);?></p>
                        
                        <p class="card-text"><b>Status : <font color="orange">In Process</font></b></p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <!-- <a href="#"><img class="card-img-top img-fluid" src="https://resilientbridgeport.com/wp-content/uploads/2016/11/in-progress-icon-01.jpg" alt="" ></a> -->
                    <div class="card-block">
                         <?php 
                    $status2="closed";
                    $query2=mysqli_query($con,"SELECT tblcomplaints.*,users.fullName, province.provinceName, city.cityName,category.categoryName FROM tblcomplaints INNER JOIN users ON tblcomplaints.userId=users.id INNER JOIN province ON tblcomplaints.province=province.id INNER JOIN city ON tblcomplaints.city=city.id INNER JOIN category ON tblcomplaints.category=category.id where tblcomplaints.status='$status2'order by rand() limit 1");
                     while($row2=mysqli_fetch_array($query2)) 
                     {
                     ?> 
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($row2['categoryName']);?></a></h4>
                        <p class="card-text"><b>Province :</b> <?php echo htmlentities($row2['provinceName']);?></p>
                        <p class="card-text"><b>City :</b> <?php echo htmlentities($row2['cityName']);?></p> 
                        <p class="card-text"><b>Status : <font color="green">Complaint Closed</font></b></p>
                        
                    </div><?php } ?>
                </div>
            </div>
            
        
 


        </div>
