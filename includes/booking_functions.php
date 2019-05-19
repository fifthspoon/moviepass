<?php

function getBookings($userId) {
$query "SELECT * FROM booking WHERE userId = $userId";
}

?>