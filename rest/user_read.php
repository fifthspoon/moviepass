<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../rest/conn_mysql.php");
require("../rest/user_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

if(isset($_GET['userid']) && $_GET['userid'] > 0 ){
    $userData = getUserData($connection,$_GET['userid']);
}else{
    echo "No Valid ID";
}

$output = $userData;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
