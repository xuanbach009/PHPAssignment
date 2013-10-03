<?php

/** 
 * Class Database connect mysql database
 * @author Vo Anh
 * @since 10/03/2013
 * 
 */
class Database {
	/* *
	 * Connect mysql
	 * @return connection
	 * */
 function connection() {
		// Information connect
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "assignment";
		
		// Create Connection
		$conn = mysql_connect ( $server, $username, $password );
		if (! $conn) {
			die ( "Connect sql fail: " . mysqli_connect_error () );
		}
		
		$connectdata = mysql_selectdb ( $database, $conn );
		if (! $connectdata) {
			die ( "Connect database: " . mysqli_connect_error () );
			;
		}
		return $conn;
	}
}

?>