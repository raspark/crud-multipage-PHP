<?php
    $conn = mysqli_connect('localhost','root','','php_practice_db');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>