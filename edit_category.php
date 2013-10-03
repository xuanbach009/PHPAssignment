<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Edit Category</title></head>
<body>

<?php
//Get id of product
$id = $_GET ['category_id'];
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
$myquery = "SELECT * FROM category WHERE idcategory =" . $id;
$result = mysql_query ( $myquery );
while ($row = mysql_fetch_array($result)) {
$name = $row['name'];
$description = $row['description'];
} 
?>
	<form action="update_category.php" method="post">	
	<h3 align="center">Update Product</h3>	
	<input type="hidden" name="id" value="<?php echo"$id"?>">
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
		<td></td>
		<td><button type="submit" name="update">Update</button><button type="reset">Reset</button></td>
		</tr>
		</table>
	</form>
</body>
</html>
