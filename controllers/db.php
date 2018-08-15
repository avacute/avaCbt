<?php 

	// Place db host name. Sometimes "localhost" but 
	$db_host = "localhost";
	// Place the username for the MySQL database here
	$db_username = "root"; 
	// Place the password for the MySQL database here
	$db_pass = ""; 
	// Place the name for the MySQL database here
	 $db_name = "cbt";
 
	
	// Run the connection here 
	$conn = @mysqli_connect("$db_host","$db_username","$db_pass") or die ("Service Temporarily Unavailable...");
	mysqli_select_db($conn, "$db_name") or die ("no database");

?>
