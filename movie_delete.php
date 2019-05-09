<?php
/*
 * Delete movie
 */

// Includes functions and db connection
require("includes/conn_mysql.php");
require("includes/movie_functions.php");

// Establishes connection
$connection = dbConnect();

// Makes sure if movie should be deleted
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Should the movie be deleted?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteMovie($connection,$_POST['isdeleteid']);

    // Redirects to all movies
    header("Location: movie_read.php");
}
?>

<!DOCTYPE HTML>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title>Admin - Delete</title>
</head>

<body>
<h2>Delete Movie</h2>

<form action="movie_delete.php" method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

    <label>Are you sure you wish to remove this movie?</label>
    <p><input type="submit" value="Confirm"></p>
</form>
<?php
// Terminates connection
dbDisconnect($connection);
?>
</body>
</html>
