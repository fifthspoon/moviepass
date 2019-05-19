<?php
/*
 * Displays all movies
*
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/movie_functions.php");

// Edit confirmation
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$movieData = getMovieData($_GET['editid']);
}

// Update confirmation
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	$res = updateMovie();

    if($res == 1){
        $_SESSION['message']['success'][] = 'The movie has been updated';
    }else{
        $_SESSION['message']['failure'][] = 'The movie could not be updated';
    }

    header("Location: {$admin_url}?page=movie_update&editid=".$_POST['updateid']);
    exit;
}
?>

<h2>Update <?php echo $movieData['movieName']; ?></h2>
<p><a href="<?php echo $admin_url . '?page=movie_read' ?>">Go Back</a></p>

<form method="post">
   	<input type="hidden" name="updateid" value="<?php echo $movieData['movieId']; ?>">

    <label>Name:</label>
    <p><input type="text" name="txtName" value="<?php echo $movieData['movieName']; ?>"></p>
	
    <label>Age:</label>
    <p><input type="number" name="txtAge" value="<?php echo $movieData['movieAge']; ?>"></p>

     <label>Price:</label>
    <p><input type="number" name="txtPrice" value="<?php echo $movieData['moviePrice']; ?>"></p>
     
    <p><input type="submit" value="Update"></p>
</form>