<?php
header("refresh:2;url=partner");
include_once("../z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page

$todelete = mysqli_real_escape_string($con, $_GET["id"]);

$result = mysqli_query($con, "DELETE FROM partner WHERE id='$todelete'");
if ($result) {
    print "<center> Partner Logo deleted<br/>Redirecting in 2 seconds...</center>";
} else {
    print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}

?>