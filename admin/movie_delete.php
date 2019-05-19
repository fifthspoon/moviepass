<?php
/*
 * Delete movie
 */

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/movie_functions.php");

// Makes sure if movie should be deleted
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Should the movie be deleted?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteMovie($_POST['isdeleteid']);

    // Redirects to all movies
    header("Location: {$admin_url}?page=movie_read");
    exit;
}
?>

<h2>Delete Movie</h2>

<form method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

    <label>Are you sure you wish to remove this movie?</label>
    <p><input type="submit" value="Confirm"></p>
</form>