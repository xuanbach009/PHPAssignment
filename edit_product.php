<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Edit Product</title></head>
<body>

<?php
//Get id of product
$id = $_GET ['product_id'];
//include file Database
include 'Database.php';

$connect = new Database();
//Create connection
$conn = $connect->connection ();
//name database
$database = "assignment";
// Select database
$isconnect = mysql_select_db ( $database, $conn );
// check connect data
if (! $isconnect) {
	die ( "Connect database fail: " . mysql_error () );
}
$myquery = "SELECT * FROM product WHERE idproduct =" . $id;
$result = mysql_query ( $myquery );
while ($row = mysql_fetch_array($result)) {
$id = $row['idproduct'];
$name = $row['name'];
$description = $row['description'];
$quantity= $row['quantity'];
$status = $row['status'];
$category_id = $row['category_id'];
} 

?>
	<form action="update_product.php" method="post">	
	<h3 align="center">Update Product</h3>	
	<input type="hidden" name="id" value="<?php echo"$id"?>">
	<input type="hidden" name="category_id" value="<?php echo"$category_id"?>">
		<table border="1" width="250" align="center" >
		<tr>
		<td>Name </td>
		<td><input type="text" name="name" value="<?php echo"$name"?>"></td>
		</tr>
		<tr>
		<td>Description</td>
		<td><input type="text" name="description" value="<?php echo"$description"?>"></td>
		</tr>
		<tr>
		<td>Quantity</td>
		<td><input type="text" name="quantity" value="<?php echo"$quantity"?>"></td>
		</tr>
		<tr>
		<td>Status</td>
		<td><?php
		if ($status ==1) {
		echo "<input type=\"checkbox\" name=\"status\" checked=\"checked\">";
		}else
		{
		echo "<input type=\"checkbox\" name=\"status\">";
		} 
		?></td>
		</tr>
		<tr>
		<td><button type="submit" name="update">Update</button></td>
		<td><button type="reset">Reset</button></td>
		</tr>
		</table>
	</form>
</body>
</html>
