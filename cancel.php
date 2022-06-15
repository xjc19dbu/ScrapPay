<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query1 = "DELETE FROM `jobs` WHERE username='$_POST[username]' AND item='$_POST[item]'";      // Deleted job from jobs
$result = mysqli_query($con, $query1) or die(mysql_error());
$query2 = "UPDATE `users` SET tokens=tokens + '$_POST[tokens]' WHERE username='$_POST[username]'"; // Reset tokens
$result = mysqli_query($con, $query2) or die(mysql_error());
$_SESSION['tokens'] = $_SESSION['tokens'] + $_POST['tokens'];      // Reset session tokens
header("Location: myjobs.php");
?>