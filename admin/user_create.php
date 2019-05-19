<?php
/*
 * Adds user
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/user_functions.php");

// Add new user?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveUser = saveUser();

	header("Location: {$admin_url}?page=user_read");
}
?>

<h2>Add a user</h2>

<form method="post">
 <input type="hidden" name="isnew" id="isnew" value="1">

    <label>Email:</label>
    <p><input type="text" name="uName" placeholder="Email"></p>
	
    <label>Password:</label>
    <p><input type="password" name="uPass" placeholder="Password"></p>
     
    
    <p>
    <input type="checkbox" name="uAdmin" value="1">
    <label>Admin</label>
    </p>

    <p><input type="submit" value="Add"></p>
</form>