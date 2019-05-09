<?php
// Start Session
session_start();

// Preset login
$user = "test@test.se";
$pass = "123";

// Fetches user and pass from the loginpage.php form
$checkUser = $_POST['txtUser'];
$checkPass = $_POST['txtPassword'];
?>

<!DOCTYPE html>
<html lang="sv">
<head>
 <title>Moviepass Login</title>
 <meta charset="utf-8" />
</head>
<body>
<?php
// Checks the session
if($checkUser == $user && $checkPass == $pass){
	$_SESSION['status'] = "ok";
	echo "<p>You have successfully logged in.</p>";
	echo '<p><a href="admin.php">Admin Dashboard</a></p>';
} else{
	echo "<p>Incorrect user or password</p>";
	echo '<p><a href="index.php">Try again</a></p>';
}
?>
</body>
</html>