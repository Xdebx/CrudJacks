<?php
include "../includes/config.php";
include "../includes/itemHeader.php";
$result = mysqli_query( $conn,"SELECT * FROM item where item_id = ". $_GET['item_id']);
$row = mysqli_fetch_array($result);
print_r($row);
?>
<div class="container">
  <h2>Update customer</h2>
  <form method="POST" action="update.php" enctype="multipart/form-data">
 <div class="form-group">
    <label for="customerid" class="control-label">Item ID</label>
    <input type='text' class="form-control " id='customerid' name='item_id' readonly value="<?php echo $_GET['item_id']; ?>">
  </div>
  <div class="form-group">
    <label for="title" class="control-label">Product Name</label>
    <input type="text" class="form-control" id="title" name="description" value="<?php echo $row['description'];?>" > 
  </div> 
  <div class="form-group"> 
    <label for="costprice" class="control-label">cost price</label>
    <input type="number" id="costprice" class="form-control" name="cprice" step = "0.01" value="<?php echo $row['cost_price']; ?>" >
  </div> 
  <div class="form-group"> 
    <label for="sellprice" class="control-label">selling price</label>
    <input type="number" id="sellprice" name="sprice" class="form-control" step = "0.01" value="<?php echo $row['sell_price']; ?>" >
  </div>
   <div class="form-group"> 
   <label for="cat" class="control-label">category</label>
  <select name="category" id="cat"class="form-control">
  <?php
   $sql = "SELECT  i.description, i.img_path,i.cost_price,i.sell_price, c.CategoryName,c.Category_id FROM item i inner join categories c on i.category_id = c.Category_id where item_id = ". $_GET['item_id'];
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);
   $sql = "select Category_id,CategoryName from categories where Category_id <>".$row['Category_id'];
   $results = mysqli_query($conn,$sql);
   echo '<option selected value='.$row['Category_id'].'>'.$row['CategoryName'].'</option>';
   while ($rows = mysqli_fetch_assoc($results)){ 
      echo '<option value='.$rows['Category_id'].'>'.$rows['CategoryName'].'</option>';
    } 
  ?>
</select>
</div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
  <div class="form-group"> 
    <label for="imgpath" class="control-label">image</label>
    <?php echo "<img border=\"0\" src=\"".$row['img_path']."\" width=\"250\" alt=\"item Name\" height=\"250\">" ?>;
 </div>
 <div>
 <div>
 <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
  <a href="index.php" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
</div>
<?php
mysqli_free_result($result);
mysqli_close( $conn );
 ?>
 </body>
 </html>