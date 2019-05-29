<?php
/*
 * Skapar databaskopplingen
*/
function dbConnect(){
	$connection = mysqli_connect("localhost", "root", "", "moviepass")
        or die("Could not connect");
    mysqli_select_db($connection,"moviepass") or die("Could not select database");
	return $connection;
}
	
/*
* stänger databaskopplingen
*/
function dbDisconnect($connection){
	mysqli_close($connection);
}
?>
