<?php
/*
 * Visar alla kunder
*/
function getAllUsers($conn){
    
    $query = "SELECT userName, movieName FROM users 
    INNER JOIN booking ON users.userId=booking.bookingUserId
    INNER JOIN movies ON movies.movieId=booking.bookingMovieId
    ORDER BY userName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

/*
 * Hämtar en kund
 */
function getUserData($conn,$userId){
    $query = "SELECT * FROM users
			WHERE userId=".$userId;
    echo $query;
    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

/*
 * Sparar en kund
*/
function saveUser($conn){
    $name = escapeInsert($conn,$_POST['userName']);
    $password = escapeInsert($conn,$_POST['userPass']);
    // Sparar lösenordet med password_hash
    // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users
			(userName,userPass)
			VALUES('$name','$password')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*
 * Uppdaterar en kund
*/
function updateUser($conn){
    $name = escapeInsert($conn,$_POST['uName']);
    $password = escapeInsert($conn,$_POST['uPass']);
    $editid = $_POST['updateid'];

    $query = "UPDATE users
			SET userName='$name', userPass='$password'
			WHERE userId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Raderar kund
*/
function deleteUser($conn,$userId){
    $query = "DELETE FROM users WHERE userId=". $userId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Tar bort oönskade html-tecken
 *
 * mysqli_real_escape_string motverkar SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}


