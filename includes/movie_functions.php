<?php
/*
 * Lists all movies
*/
function getAllMovies($conn){
    $query = "SELECT * FROM movies ORDER BY movieName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    return $result;
}

/*
 * Fetches a movie
 */
function getMovieData($conn,$movieId){
    $query = "SELECT * FROM movies
			WHERE movieId=".$movieId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

/*
 * Saves movie
*/
function saveMovie($conn){
    $movieName = escapeInsert($conn,$_POST['txtName']);
    $movieAge = escapeInsert($conn,$_POST['txtAge']);
    $moviePrice = escapeInsert($conn,$_POST['txtPrice']);

    $query = "INSERT INTO movies
			(movieName,movieAge,moviePrice)
			VALUES('$movieName','$movieAge','$moviePrice')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*
 * Updates movie
*/
function updateMovie($conn){
    $movieName = escapeInsert($conn,$_POST['txtName']);
    $movieAge = escapeInsert($conn,$_POST['txtAge']);
    $moviePrice = escapeInsert($conn,$_POST['txtPrice']);
    $editid = $_POST['updateid'];

    $query = "UPDATE movies
            SET movieName='$movieName', movieAge='$movieAge', moviePrice='$moviePrice'
            WHERE movieId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    return $result;
}

/*
 * Deletes movie
*/
function deleteMovie($conn,$movieId){
    $query = "DELETE FROM movies WHERE movieId=". $movieId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Removes unwanted HTML characters
 *
 * mysqli_real_escape_string prevents SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}