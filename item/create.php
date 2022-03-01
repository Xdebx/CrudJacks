<?php
include "../includes/itemHeader.php";
include "../includes/config.php";
?>
<div class="container">
  <h2>Create new Item</h2>
  <form method="POST" action="store.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title" class="control-label">Description</label>
    <input type="text" class="form-control" id="title" name="description"  >
  </div> 
  <div class="form-group"> 
    <label for="costprice" class="control-label">cost price</label>
    <!-- <input type="text" class="form-control" id="costprice" name="description"  > -->
    <input type="number" id="costprice" class="form-control" name="cprice" step = "0.01">
  </div> 
  <div class="form-group"> 
    <label for="sellprice" class="control-label">selling price</label>
    <input type="number" id="sellprice" name="sprice" class="form-control" step = "0.01">
  </div>
 <div class="form-group"> 
   <label for="cat" class="control-label">category</label>
  <select name="category" id="cat"class="form-control">
  <?php
   $sql = "select Category_id,CategoryName from categories";
   $results = mysqli_query($conn,$sql);
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
 <button type="submit" name="submit" class="btn btn-primary" value="save">Save</button>
  <a href="index.php" class="btn btn-default" role="button">Cancel</a>
  </div>     
</form> 
</div>