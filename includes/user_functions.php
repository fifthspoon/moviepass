<?php
/*
 * Lists all users
*/

require_once("escapeInsert.php");

function getAllUsers(){
    $conn = dbConnect();

    $query = "SELECT * FROM users ORDER BY userName ASC";
    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    dbDisconnect($conn);

    // Create user objects with the fetched data
    $users = [];
    foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $user) {
        $users[] = new User($user['userId'], $user['userName'], $user['userPass'], $user['userAdmin']);
    };

    return $users;
}

/*
 * Fetches a user
 */
function getUserData($userId){
    $conn = dbConnect();
    $query = "SELECT * FROM users
			WHERE userId=".$userId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    dbDisconnect($conn);
    return $row;
}

/*
 * Saves user
*/
function saveUser(){
    $conn = dbConnect();

    $userName = escapeInsert($conn,$_POST['uName']);
    $userPass = escapeInsert($conn,$_POST['uPass']);
    $userAdmin = escapeInsert($conn,$_POST['uAdmin']);

    $query = "INSERT INTO users
			(userName,userPass,userAdmin)
			VALUES('$userName','$userPass','$userAdmin')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    dbDisconnect($conn);

    return $insId;
}

/*
 * Updates user
*/
function updateUser(){
    $conn = dbConnect();

    $userName = escapeInsert($conn,$_POST['uName']);
    $userPass = escapeInsert($conn,$_POST['uPass']);
    $userAdmin = boolval(escapeInsert($conn,$_POST['uAdmin'])) ? 1 : 0;
    $editid = $_POST['updateid'];

    $query = "UPDATE users
            SET userName='$userName', userPass='$userPass', userAdmin=$userAdmin
            WHERE userId=". $editid;
    
    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    dbDisconnect($conn);
    return $result;
}

/*
 * Deletes user
*/
function deleteUser($userId){
    $conn = dbConnect();
    $query = "DELETE FROM users WHERE userId=". $userId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
    dbDisconnect($conn);
}
