<?php
//Includes database connection
require("includes/conn_mysql.php");

// Start Session
session_start();

$connection = dbConnect();

// Fetches user and pass from the loginpage.php form
$checkUser = mysqli_real_escape_string($connection,$_POST['uName']);
$checkPass = mysqli_real_escape_string($connection,$_POST['uPass']);
//Checks for the user
$query = "SELECT * FROM users WHERE userName = '$checkUser'";

$result = mysqli_query($connection,$query) or die("Query failed: $query");

$row = mysqli_fetch_assoc($result);

//Count the rows to find the user
$count = mysqli_num_rows($result);

dbDisconnect($connection);

if($count == 1) {
	//Checks password
	if ($checkPass === $row["userPass"]) {
		$_SESSION['userid'] = $row['userId'];
		$_SESSION['admin'] = $row['userAdmin'];

		// Redirects to admin page
    	header("Location: http://localhost/moviepass/admin/index.php");
    exit;
	} else {
		echo "<p>Login failed</p>";
		echo '<p><a href="loginpage.php">Try again</a></p>';
	}
}


?>
