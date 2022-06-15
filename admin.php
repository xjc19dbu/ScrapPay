<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <ul class="nav"><!--Navigation-->
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
    <?php
    require('db.php');
    $query = "SELECT * FROM `jobs` WHERE completed=0 AND accepted!=''"; // Get all jobs that are not complete and have been accepted by someone
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;
    foreach($rows as $row){                         // Make rows from selected jobs to get data
        $uname = stripslashes($row['username']);
        $accept = stripslashes($row['accepted']);
        $item = stripcslashes($row['item']);
        $location = stripslashes($row['location']);
        $weight = stripslashes($row['weight']);
        $tokens = $row['tokens'];
        echo "<form action='confirm.php' class='form' method='post'>
                <div class='grid-container'>
                    <div class='grid-item'><input type='hidden' name='username' value='$uname'>$uname</div>
                    <div class='grid-item'><input type='hidden' name='accept' value='$accept'>$accept</div>
                    <div class='grid-item'>Item:</div>
                    <div class='grid-item'><input type='hidden' name='item' value='$item'>$item</div>
                    <div class='grid-item'>Weight:</div>
                    <div class='grid-item'><input type='hidden' name='weight' value='$weight'>$weight Kg</div>
                    <div class='grid-item'>Location:</div>
                    <div class='grid-item'><input type='hidden' name='location' value='$location'>$location</div>
                    <div class='grid-item'><input type='hidden' name='tokens' value='$tokens'>$tokens tokens</div>
                    <div class='grid-item'><button>Confirm</button></div>
            </div>
        </form>";           // Output data into forms on webpage
    }
    ?>
</body>
<script>
    function TokenAlert() {
    alert("You have <?php echo $_SESSION['tokens']; ?> tokens. \nIn order to earn more you have to post or complete more jobs.");
}

function JobClick() {
    var x = document.getElementById("Dropdown");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
</html>