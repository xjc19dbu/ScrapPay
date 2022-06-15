<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query = "SELECT tokens FROM `users` WHERE username='$_POST[accept]'";      // Get tokens from user
$result = mysqli_query($con, $query) or die(mysql_error());
$row = mysqli_fetch_array($result);
$query2 = "UPDATE `jobs` SET completed=1 WHERE accepted='$_POST[accept]' AND item='$_POST[item]'"; // Update jobs to complete the job
$result = mysqli_query($con, $query2) or die(mysql_error());
$query3 = "UPDATE `jobs` SET accepted=NULL WHERE accepted='$_POST[accept]' AND item='$_POST[item]'"; // Update jobs so accepted equals NULL
$result = mysqli_query($con, $query3) or die(mysql_error());
$query4 = "UPDATE `users` SET tokens = '$row[tokens]' + '$_POST[tokens]' WHERE username='$_POST[accept]'"; // Update users tokens for when job is complete
$result = mysqli_query($con, $query4) or die(mysql_error());
header("Location: admin.php");
?>