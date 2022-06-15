<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query2 = "UPDATE `jobs` SET accepted=NULL WHERE accepted='$_SESSION[username]' AND item='$_POST[item]'";       // Update jobs and set accepted to NULL
$result = mysqli_query($con, $query2) or die(mysql_error());
header("Location: myjobs.php");
?>