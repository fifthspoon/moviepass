<?php
/*
 * Displays all users
*
*/

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/user_functions.php");

// Edit confirmation
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$userData = getUserData($_GET['editid']);
}

// Update confirmation
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	$res = updateUser();

    if($res == 1){
        $_SESSION['message']['success'][] = 'The account has been updated';
    }else{
        $_SESSION['message']['failure'][] = 'The account could not be updated';
    }

    header("Location: {$admin_url}?page=user_update&editid=".$_POST['updateid']);
    exit;
}
?>

<h2>Update <?php echo $userData['userName']; ?></h2>


<form method="post">
   	<input type="hidden" name="updateid" value="<?php echo $userData['userId']; ?>">

    <label>Email:</label>
    <p><input type="email" name="uName" value="<?php echo $userData['userName']; ?>"></p>
	
    <label>Password:</label>
    <p><input type="password" name="uPass" value="<?php echo $userData['userPassword']; ?>"></p>

     <label>Admin?</label>
    <p><input type="checkbox" name="uAdmin" value="<?php echo $userData['userAdmin']; ?>"></p>
     
    <p><input type="submit" value="Update"></p>
</form>

<p><a href="<?php echo $admin_url . '?page=user_read' ?>">Go Back</a></p>