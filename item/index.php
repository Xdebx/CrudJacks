<?php
include "../includes/config.php";
include "../includes/itemHeader.php";
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
        <th>Product Name</th>
        <th>selling price</th>
        <th>cost price</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
 <tbody>
<?php 
$result = mysqli_query( $conn,"SELECT * FROM item ORDER BY item_id ASC" );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_array($result)) {  
        echo "<tr>\n";
        echo "<td>".$row['item_id']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['sell_price']."</td>";
        echo "<td>".$row['cost_price']."</td>";
        echo "<td align='center'><a href='edit.php?item_id=".$row['item_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "<td align='center'><a href='delete.php?item_id=".$row['item_id']."'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
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