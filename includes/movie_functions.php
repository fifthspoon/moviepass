<?php
/*
 * Lists all movies
*/
require_once("escapeInsert.php");

function getAllMovies(){
    $conn = dbConnect();

    $query = "SELECT * FROM movies ORDER BY movieName ASC";
    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    dbDisconnect($conn);

    // Create movie objects with the fetched data
    $movies = [];
    foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $movie) {
        $movies[] = new Movie($movie['movieId'], $movie['movieName'], $movie['movieAge'], $movie['moviePrice']);
    };

    return $movies;
}

/*
 * Fetches a movie
 */
function getMovieData($movieId){
    $conn = dbConnect();
    $query = "SELECT * FROM movies
			WHERE movieId=".$movieId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    dbDisconnect($conn);
    return $row;
}

/*
 * Saves movie
*/
function saveMovie(){
    $conn = dbConnect();

    $movieName = escapeInsert($conn,$_POST['txtName']);
    $movieAge = escapeInsert($conn,$_POST['txtAge']);
    $moviePrice = escapeInsert($conn,$_POST['txtPrice']);

    $query = "INSERT INTO movies
			(movieName,movieAge,moviePrice)
			VALUES('$movieName','$movieAge','$moviePrice')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    dbDisconnect($conn);

    return $insId;
}

/*
 * Updates movie
*/
function updateMovie(){
    $conn = dbConnect();

    $movieName = escapeInsert($conn,$_POST['txtName']);
    $movieAge = escapeInsert($conn,$_POST['txtAge']);
    $moviePrice = escapeInsert($conn,$_POST['txtPrice']);
    $editid = $_POST['updateid'];

    $query = "UPDATE movies
			SET movieName='$movieName', movieAge='$movieAge', moviePrice='$moviePrice'
			WHERE movieId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    dbDisconnect($conn);
    return $result;
}

/*
 * Deletes movie
*/
function deleteMovie($movieId){
    $conn = dbConnect();
    $query = "DELETE FROM movies WHERE movieId=". $movieId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
    dbDisconnect($conn);
}
