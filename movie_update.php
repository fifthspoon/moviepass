<?php
/*
 * Displays all movies
*
*/

// Includes all functions and connections
require("includes/conn_mysql.php");
require("includes/movie_functions.php");

// Establishes connection
$connection = dbConnect();

// Edit confirmation
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$movieData = getMovieData($connection,$_GET['editid']);
}

// Update confirmation
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateMovie($connection);

	header("Location: movie_update.php?editid=".$_POST['updateid']);
}
?>

<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>Admin - Update</title>
</head>

<body>
<h2>Update <?php echo $movieData['movieName']; ?></h2>
<p><a href="movie_read.php">Go Back</a></p>

<form action="movie_update.php" method="post">
   	<input type="hidden" name="updateid" value="<?php echo $movieData['movieId']; ?>">

    <label>Name:</label>
    <p><input type="text" name="txtName" value="<?php echo $movieData['movieName']; ?>"></p>
	
    <label>Age:</label>
    <p><input type="number" name="txtAge" value="<?php echo $movieData['movieAge']; ?>"></p>

     <label>Price:</label>
    <p><input type="number" name="txtPrice" value="<?php echo $movieData['moviePrice']; ?>"></p>
     
    <p><input type="submit" value="Update"></p>
</form>
<?php
// Terminates connection
dbDisconnect($connection);
?>
</body>
</html>
