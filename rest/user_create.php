<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../rest/conn_mysql.php");
require("../rest/user_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

if(isset($_POST['userName'])){
    $name = $_POST['userName'];
}else{
    echo "Ingen tillåten post (userName)";
    exit;
}
if(isset($_POST['userPass'])){
    $password = $_POST['userPass'];
}else{
    echo "Ingen tillåten post (userPass)";
    exit;
}

$saveUser = saveUser($connection);

if(isset($saveUser) && $saveUser > 0 ) {
    $userData = getUserData($connection, $saveUser);

    $output = $userData;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>

