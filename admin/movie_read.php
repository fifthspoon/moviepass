<?php 
/*
  * Displays all movies
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/movie_functions.php");

// Displays all movies
$movies = getAllMovies();
?>

<h2>Movies</h2>
<p><a href="<?php echo $admin_url .'?page=movie_create'?>">Add new movie</a></p>
<ul>

<?php 
	// Loops through the array of movies
    foreach($movies as $movie){
?>
  <li>
    <?php echo $movie->getName();?> 
    <a href="<?php echo $admin_url ?>?page=movie_update&editid=<?php echo $movie->getId(); ?>">Update</a> 
    <a href="<?php echo $admin_url ?>?page=movie_delete&deleteid=<?php echo $movie->getId(); ?>">Delete</a>
  </li>
<?php 
	}
?>
</ul>

<a href="admin/index.php"><input type="button" value="Return to Dashboard"></a>