<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shop</title>
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
    <form action='deposit.php' class='form' method='post'> <!-- Form for depositing -->
        <h1 class="login-title">Deposit</h1>
        <p style="text-align: center">1 AUD = 1 Token</p>
        <select id="money" name="money">
            <option value="10">10 Dollars</option>
            <option value="25">25 Dollars</option>
            <option value="50">50 Dollars</option>
            <option value="100">100 Dollars</option>
        </select>
        <button style="float: right">Submit</button>
    </form>
    <form action='withdraw.php' class='form' method='post'>      <!-- Form for withdrawal -->
        <h1 class="login-title">Withdraw</h1>
        <p style="text-align: center">1 Token = 1 AUD</p>
        <input type="number" class="job-input" name="tokens" placeholder="Tokens" min="10" max="<?php echo $_SESSION['tokens']; ?>" required/>   <!-- Cannot withdraw more than the user has -->
        <button style="float: right">Submit</button>
    </form>
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