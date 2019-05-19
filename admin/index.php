<?php
session_start();

$base_url = "http://localhost/moviepass/";
$admin_url = "http://localhost/moviepass/admin/";

// Check if Admin
if(!isset($_SESSION['status'])){
	header("Location: ". $base_url);
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administration</title>
  <base href="<?php echo $base_url; ?>">

</head>
<body>
  <h2>Administrator Tools</h2>

  <?php
    require_once("../includes/movies.php");
    require_once("../includes/users.php");
    require_once('messages.php');

    if(isset($_GET['page'])){
      require_once('./'.$_GET['page'].'.php');
    }else{
      require_once('./admin.php');
    }
  ?>
</body>
</html>