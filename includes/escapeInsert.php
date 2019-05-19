<?php
/*
 * Removes unwanted HTML characters
 *
 * mysqli_real_escape_string prevents SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}
?>