<?php
include "../includes/header.php";
?>
<div class="container">
<h2>Create new customer</h2>
<form method="post" action="store.php" >
<div class="form-group">
<label for="title" class="control-label">Title</label>
<input type="text" class="form-control" id="title" name="title"  >
</div>
<div class="form-group">
<label for="lname" class="control-label">last name</label>
<input type="text" class="form-control " id="lname" name="lname" ></text>
</div>
<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" >
</div>
<div class="form-group">
<label for="address" class="control-label">Address</label>
<input type="text" class="form-control" id="address" name="addressline" >
</div>
<div class="form-group">
<label for="town" class="control-label">Town</label>
<input type="text" class="form-control" id="town" name="town">
</div>
<div class="form-group">
<label for="zipcode" class="control-label">Zip code</label>
<input type="text" class="form-control" id="zipcode" name="zipcode" >
</div>
<div class="form-group">
<label for="phone" class="control-label">Phone</label>
<input type="text" class="form-control" id="phone" name="phone" >
</div>
<div>
<button type="submit" name="submit" class="btn btn-primary" value="save">Save</button>
<a href="index.php" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
</div>