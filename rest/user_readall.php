<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../rest/conn_mysql.php");
require("../rest/user_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla kunder
$allUsers = getAllUsers($connection);

$output = $allUsers;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
