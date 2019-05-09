<?php 
/*
  * Displays all movies
*/

// Includes functions and connections
require("includes/conn_mysql.php");
require("includes/movie_functions.php");

// Establishes connection
$connection = dbConnect();

// Displays all movies
$allMovies = getAllMovies($connection);
?>

<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>Adming - Movie List</title>
</head>

<body>
<h2>Movies</h2>
<p><a href="movie_create.php">Add new movie</a></p>
<ul>
<?php 
	// Loops through the array of movies
    while($row = mysqli_fetch_array($allMovies)){
?>
 <li><?php echo $row['movieName'];?> <a href="movie_update.php?editid=<?php echo $row['movieId'];?>">Update</a> <a href="movie_delete.php?deleteid=<?php echo $row['movieId'];?>">Delete</a></li>
<?php 
	}
?>
</ul>

 <a href="admin.php">
    <input type="button" value="Return to Dashboard">
  </a>

<?php
// Terminates connection
dbDisconnect($connection);
?>
</body>
</html>