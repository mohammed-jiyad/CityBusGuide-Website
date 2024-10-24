<?php
include("connection1.php");

// Current time minus 3 hours
date_default_timezone_set('Asia/Kolkata');
$threshold_time = date("Y-m-d H:i:s", strtotime('-2 minutes'));

$delete_query = "DELETE FROM regg WHERE verify_status = '0' AND last_time < '$threshold_time'";
$delete_run = mysqli_query($conn, $delete_query);

if($delete_run){
    echo "Old unverified accounts have been deleted.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
