<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
if($_SESSION['tokens'] > $_POST['tokens']){
    $query1 = "UPDATE `jobs` SET accepted='$_SESSION[username]' WHERE username='$_POST[username]' AND item='$_POST[item]'"; // Update jobs to accept the job the user has selected
    $result = mysqli_query($con, $query1) or die(mysql_error());
    header("Location: dashboard.php");
} else {
    header("Location: dashboard.php");
}
?>