<?php
header("refresh:2;url=comments");
include_once ("../z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page

$todelete = mysqli_real_escape_string($con, $_GET["id"]);

$result = mysqli_query($con, "DELETE FROM comments WHERE c_id='$todelete'");
if ($result) {
    print "<center> Comments deleted<br/>Redirecting in 2 seconds...</center>";
} else {
    print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}

?>