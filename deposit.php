<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query2 = "UPDATE `users` SET tokens=tokens + '$_POST[money]' WHERE username='$_SESSION[username]'";            // Update users to add tokens
$result = mysqli_query($con, $query2) or die(mysql_error());
$_SESSION['tokens'] = $_SESSION['tokens'] + $_POST['money'];           // Update session tokens
header("Location: shop.php");
?>