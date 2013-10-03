<html>
<body>
	<h3 align="center">LIST PRODUCT</h3>
	<table align='center' width='600' border='2'>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Quatity</th>
			<th>Status</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
<?php
include 'Database.php';
// Create connect
$connnect = new Database();
$conn = $connnect->connection ();
// database name
$database_name = "assignment";

// Select database
$isconnect = mysql_select_db ( $database_name, $conn );
// check connect data
if (! $isconnect) {
	die ( "Connect database fail: " . mysql_error () );
}

// create query
$query = "SELECT * FROM product";

// Excute query and return row_result
$result = mysql_query ( $query);

while ( $row = mysql_fetch_array ( $result ) ) {
	echo "<tr>";
	echo "<td>$row[name]</td>";
	echo "<td>$row[description]</td>";
	echo "<td>$row[quantity]</td>";
	echo "<td>$row[status]</td>";
	echo "<td>$row[category_id]</td>";
	echo "<td><a href=\"edit_product.php?product_id=$row[idproduct]\">Edit</a></td>";
	echo "<td><a href=\"delete_product.php?product_id=$row[idproduct]\">Delete</a></td>";
	echo "</tr>";
}
mysql_free_result ( $result );
?>
</table>
		<a href="insert_product.php?">Insert new product</a>
</body>
</html>