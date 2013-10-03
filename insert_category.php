<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add Category</title>
</head>
<body>
	<form action="insert_category.php" method="post">
		<h3 align="center">Add New Category</h3>
		<table border="1" width="250" align="center">
		<tr>
		<td>Name </td>
		<td><input type="text" name="name" ></td>
		</tr>
		<tr>
		<td>Description</td>
		<td><input type="text" name="description"></td>
		</tr>
		<tr>
		<td></td>
		<td><button type="submit" name="add">Add New</button><button type="reset">Reset</button></td>
		</tr>
		</table>
	</form>
<?php
include 'bootstrap.php';

if (isset ( $_POST ['add'] )) {
	// Gets from index.php
	$name = $_POST ['name']; // string
// 	 var_dump($name);
	
	$desicription = $_POST ['description']; // string
	
 	// Create instance dbconnect
	$connnect = new  Database();
	$conn = $connnect->connection ();
	$database_name ="assignment";
	mysql_select_db($database_name, $conn);
	// 	Sql query
	$query = "INSERT INTO category(name, description)
	VALUES ('$name', '$desicription')";
	
	var_dump($query);
	// 	excute query
	// Gets value result
	$result = mysql_query ( $query);
	// Close connection
	mysql_close ();
	// Check result if error
	if (! $result) {
		die ( "Insert fail: " . mysql_error () );
	} else {
// 		header() redirect
		header ( 'Location: http://localhost/PHPAssignment/display_category.php' );
	}
} 
?>
</body>
</html>
