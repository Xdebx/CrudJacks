<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/.../js/bootstrap.min.js" ></script>
<script src="https://kit.fontawesome.com/c88097f817.js" crossorigin="anonymous"></script>
<title>Customer CRUD</title>
</head>
<?php
include "../includes/config.php";
?>
<a href="create.php" class="btn btn-primary a-btn-slide-text">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
<span><strong>ADD</strong></span>
</a>
<div class="table-responsive">
<table  class="table table-striped table-hover">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>lname</th>
<th>fname</th>
<th>address</th>
<th>town</th>
<th>zip code</th>
<th>phone</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
$result = mysqli_query( $conn,"SELECT * FROM customer ORDER BY customer_id ASC" );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
while ($row = mysqli_fetch_array($result)) {
echo "<tr>\n";
echo "<td>".$row['customer_id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td>".$row['lname']."</td>";
echo "<td>".$row['fname']."</td>";
echo "<td>".$row['addressline']."</td>";
echo "<td>".$row['town']."</td>";
echo "<td>".$row['zipcode']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td align='center'><a href='edit.php?cust_id=".$row['customer_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
echo "<td align='center'><a href='delete.php?cust_id=".$row['customer_id']."'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
echo "</tr>\n";
}
mysqli_free_result($result);
mysqli_close( $conn );
?>
</tbody>
</table>
</div>
</body>
</html>