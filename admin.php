<!-- Create, edit and remove movies -->
<?php
// Start of Session
session_start();

// Check if Admin
if(!isset($_SESSION['status'])){
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moviepass Admin</title>
</head>
<body>

<a href="movie_read.php">
    <input type="button" value="View movie database">
  </a>

      <a href="logout.php">
    <input type="button" value="Logout">
  </a>

</body>
</html>