<?php
// Starts session
session_start();

// Resets session
unset($_SESSION['status']);

// Resets and deletes session history
session_destroy();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
 <title>Logout</title>
 <meta charset="utf-8" />
</head>
<body>

<h2>You have been successfully logged out</h2>
   <a href="index.php">
    <input type="button" value="Return to Startpage">
  </a>

</body>
</html