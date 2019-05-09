<?php
/*
 * Adds movie
*/

// Includes functions and db connections
require("includes/conn_mysql.php");
require("includes/movie_functions.php");

// Establishes connection
$connection = dbConnect();

// Add new movie?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveMovie = saveMovie($connection);

	header("Location: movie_read.php");
}
?>

<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>Admin - Add Movie</title>
</head>

<body>
<h2>Add a movie</h2>

<form action="movie_create.php" method="post">
 <input type="hidden" name="isnew" id="isnew" value="1">

    <label>Title:</label>
    <p><input type="text" name="txtName" placeholder="Title"></p>
	
    <label>Age:</label>
    <p><input type="number" name="txtAge" placeholder="Age"></p>
     
    <label>Price:</label>
    <p><input type="number" name="txtPrice" placeholder="Price"></p>

    <p><input type="submit" value="Add"></p>
</form>
<?php
// Terminates connection
dbDisconnect($connection);
?>
</body>
</html>
