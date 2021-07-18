<?php
include('../config/config.php');
if(!empty($_POST["gramaid"])) 
{
 $id=intval($_POST['gramaid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT gramaName FROM gramadivision WHERE cid ='$id'");
 ?><option selected="selected">Select Gramad </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['gramaName']); ?></option>
  <?php
 }
}

}
?>