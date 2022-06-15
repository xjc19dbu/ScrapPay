<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Job</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <ul class="nav">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li onclick="TokenAlert()"><?php echo $_SESSION['tokens']; ?> Tokens</li>
        <li onclick="JobClick()">Jobs</li>
        <div id="Dropdown" class="dropdown-content" style="display: none">
            <a href="newjob.php">New Job</a>
            <a href="myjobs.php">My Jobs</a>
            <a href="acceptedjobs.php">Accepted Jobs</a>
        </div>
        <li><a href="about.php">About</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
<?php
    require('db.php');
    if (isset($_POST['item'])) {
        $item = stripslashes($_REQUEST['item']);    // removes backslashes
        $item = mysqli_real_escape_string($con, $item);
        $weight = $_REQUEST['weight'];
        switch ($item){             // Switch case for item type 
            case "Small Appliance":
                $tokens = $weight;
                break;
            case "Large Appliance":
                $tokens = intdiv($weight,3);        // integer division by 3
                break;
            case "Plastic":
                $tokens = intdiv($weight,2);        // integer division by 2
                break;
            case "Metal":
                $tokens = $weight;
                break;
        }
        $location = stripslashes($_REQUEST['location']);
        $location = mysqli_real_escape_string($con, $location);
        $leftTokens = $_SESSION['tokens']-$tokens;              
        $sql1 = "INSERT INTO `jobs` (username,item,location,weight,tokens) VALUES ('$_SESSION[username]', '$item', '$location', '$weight', '$tokens')";     // Create new job
        if (mysqli_query($con, $sql1)) {
            $_SESSION['tokens'] = $leftTokens;      // Update session tokens
            $sql2 = "UPDATE `users` SET tokens=$leftTokens WHERE username='$_SESSION[username]'"; // update tokens
            mysqli_query($con, $sql2);
            header("Refresh:0; url=myjobs.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else{
?>
    <form class="form" method="post" name="job"> <!-- Form for new job -->
        <h1 class="job-title">New Job</h1>
        <select class="item-input" name="item" required>
            <option value="Small Appliance">Small Household Appliance</option>
            <option value="Large Appliance">Large Household Appliance</option>
            <option value="Plastic">Plastic</option>
            <option value="Metal">Metal</option>
        </select>
        <input type="text" class="job-input" name="location" placeholder="Location" required/>
        <input type="number" class="job-input" name="weight" placeholder="Weight (Kg)" min="1" max="100" required/>
        <input type="submit" value="Add Job" name="submit" class="job-button"/>
    </form>
</body>
<?php
    }
?>
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