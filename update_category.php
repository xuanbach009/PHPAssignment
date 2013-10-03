<?php
if (isset ( $_POST ['update'] )) {
	// Gets from index.php
	$category_id = $_POST['id'];
	//var_dump($id);
	
	$name = $_POST ['name']; // string
	// var_dump($name);
	
	$desicription = $_POST ['description']; // string
	 //var_dump($desicription);

	include 'Database.php';
	$connection = new Database();
	$conn = $connection->connection();
	$database ="assignment";
	mysql_select_db($database,$conn);
	$mysql = "UPDATE category SET name='$name', description ='$desicription' WHERE idcategory =$category_id";
	$result = mysql_query($mysql);
	mysql_close ();
	if (! $result) {
		die ( "Update fail: " . mysql_error () );
	} else {
		// header() redirect
		header ( 'Location: http://localhost/PHPAssignment/display_category.php' );
	}
}
?>