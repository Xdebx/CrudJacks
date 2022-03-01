<?php
include "../includes/config.php";
include "../includes/header.php";
$result = mysqli_query( $conn,"SELECT * FROM customer where customer_id = ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
?>
<div class="container">
<h2>Update customer</h2>
<form method="POST" action="update.php" >
<div class="form-group">
<label for="customerid" class="control-label">Customer ID</label>
<input type='text' class="form-control " id='customerid' name='customer_id' value="<?php echo $_GET['cust_id']; ?>">
</div>
<div class="form-group">
<label for="title" class="control-label">Title</label>
<input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>" >
</div>
<div class="form-group">
<label for="lname" class="control-label">last name</label>
<input type="text" class="form-control " id="lname" name="lname" value="<?php echo $row['lname'];?>">
</div>
<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" value="<?php echo $row['fname'];?>">
</div>
<div class="form-group">
<label for="address" class="control-label">Address</label>
<input type="text" class="form-control" id="address" name="addressline" value="<?php echo $row['addressline'];?>">
</div>
<div class="form-group">
<label for="town" class="control-label">Town</label>
<input type="text" class="form-control" id="town" name="town" value="<?php echo $row['town'];?>">
</div>
<div class="form-group">
<label for="zipcode" class="control-label">Zip code</label>
<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $row['zipcode'];?>">
</div>
<div class="form-group">
<label for="phone" class="control-label">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'];?>">
</div>
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