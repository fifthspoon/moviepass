<?php 
/*
  * Displays all users
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/user_functions.php");

// Displays all users
$users = getAllUsers();
?>

<h2>Accounts:</h2>
<p><a href="<?php echo $admin_url .'?page=user_create'?>">Add new user</a></p>
<ul>

<?php 
	// Loops through the array of users
    foreach($users as $user){
?>
  <li>
    <?php echo $user->getName();?> 
    <a href="<?php echo $admin_url ?>?page=user_update&editid=<?php echo $user->getId(); ?>">Update</a> 
    <a href="<?php echo $admin_url ?>?page=user_delete&deleteid=<?php echo $user->getId(); ?>">Delete</a>
  </li>
<?php 
	}
?>
</ul>

<a href="admin/index.php"><input type="button" value="Return to Dashboard"></a>