<?php
/*
 * Delete user
 */

// Includes all functions and connections
require("../includes/conn_mysql.php");
require("../includes/user_functions.php");

// Makes sure if the user should be deleted
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Should the user be deleted?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteUser($_POST['isdeleteid']);

    // Redirects to all users
    header("Location: {$admin_url}?page=user_read");
    exit;
}
?>

<h2>Delete User</h2>

<form method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

    <label>Are you sure you wish to remove this account?</label>
    <p><input type="submit" value="Confirm"></p>
</form>