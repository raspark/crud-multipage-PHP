<?php
include_once('connection.php');
$delete_id = $_GET['delete_id'];
if (isset($delete_id)) {
    $delete_quary = mysqli_query($conn, "update users set is_delete = 1 where id = $delete_id");
    header(
        'location:index.php',
    );
}