<?php
include('../config/config.php');
if(!empty($_POST["cityid"])) 
{
 $id=intval($_POST['cityid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT cityName FROM city WHERE sid ='$id'");
 ?><option selected="selected">Select City </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['cityName']); ?>"><?php echo htmlentities($row['cityName']); ?></option>
  <?php
 }
}

}
?>