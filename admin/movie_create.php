<?php
/*
 * Adds movie
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/movie_functions.php");

// Add new movie?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveMovie = saveMovie();

	header("Location: {$admin_url}?page=movie_read");
}
?>

<h2>Add a movie</h2>

<form method="post">
 <input type="hidden" name="isnew" id="isnew" value="1">

    <label>Title:</label>
    <p><input type="text" name="txtName" placeholder="Title"></p>
	
    <label>Age:</label>
    <p><input type="number" name="txtAge" placeholder="Age"></p>
     
    <label>Price:</label>
    <p><input type="number" name="txtPrice" placeholder="Price"></p>

    <p><input type="submit" value="Add"></p>
</form>