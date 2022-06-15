<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>About</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <ul class="nav"><!--Navigation-->
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li onclick="TokenAlert()"><?php echo $_SESSION['tokens']; ?> Tokens</li>
        <li onclick="JobClick()">Jobs</li>
        <div id="Dropdown" class="dropdown-content" style="display: none"><!--Dropdown Menu-->
            <a href="newjob.php">New Job</a>
            <a href="myjobs.php">My Jobs</a>
            <a href="acceptedjobs.php">Accepted Jobs</a>
        </div>
        <li><a href="about.php">About</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br><br>
    <h2 style="text-align: center">About:</h2><!--Paragraph of information-->
    <p>ScrapPay lets you earn money, all while helping the environment.
    This website was developed to strive for cleaner environment with your help.
    It's easy how it works! If you're already heading to scrap some waste, why not accept a job and take their waste too.
    This will save plenty of petrol and would terminate random environment damage from locals who couldn't take their waste to junkyards.
    You can also earn plenty of rewards doing your part in saving the nature.<br> 
    Create an account today and get to Scrapping! After you create an account you can accept jobs on the homepage.<br>
    Once you accept the job you should then pick up the waste from the locals and it is then your responsibility to take the waste to be recycled.
    Once the job is completed we will reward you the tokens depending on the waste type and their weight.
    Tokens can then be cashed out from the shop section. Keep in mind, 1 Token = $1 (AUD)</p>
    <div id="myModal" class="modal" style="display: none"><!--Modal-->
        <div class="modal-content">
            <button onclick="ModalClose()">&times;</button>
            <p id="ModalText"></p>
        </div>
    </div>
    <h2 style="text-align: center">Recyclable Materials:</h2>
    <div class='form'><!--Form for Modal-->
        <div class='grid-container'>
            <div class='grid-item'><button onclick="KettleClick()" class='roundbutton'><img src="images/kettle.png" alt="kettle" style="width:100px;height: 100px;"></button></div>
            <div class='grid-item'><button onclick="WashingClick()" class='roundbutton'><img src="images/washing_machine.png" alt="washing machine" style="width:100px;height: 100px;"></button></div>
            <div class='grid-item'>Small Household Appliances</div>
            <div class='grid-item'>Large Household Appliances</div>
            <div class='grid-item'><button onclick="PlasticClick()" class='roundbutton'><img src="images/bottle.png" alt="bottle" style="width:100px;height: 100px;"></button></div>
            <div class='grid-item'><button onclick="MetalClick()" class='roundbutton'><img src="images/metal.png" alt="metal" style="width:100px;height: 100px;"></button></div>
            <div class='grid-item'>Plastic</div>
            <div class='grid-item'>Metal</div>
        </div>
    </div>
    </body>
<script>
    function TokenAlert() {
    alert("You have <?php echo $_SESSION['tokens']; ?> tokens. \nIn order to earn more you have to post or complete more jobs.");
    }
function JobClick() {
    var x = document.getElementById("Dropdown");
    if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function KettleClick() {
    var m = document.getElementById("myModal");
    if (m.style.display == "none") {
        m.style.display = "block";
        document.getElementById("ModalText").innerHTML = "<h3>Small Household Appliances:</h3><br><br>";
        document.getElementById("ModalText").innerHTML += "<img src='images/kettle.png' alt='kettle' style='width:100px;height: 100px;'>";
        document.getElementById("ModalText").innerHTML += "<img src='images/blender.png' alt='blender' style='width:100px;height: 100px;'>";
        document.getElementById("ModalText").innerHTML += "<img src='images/whisk.png' alt='whisk' style='width:100px;height: 100px;'><br><br>";
        document.getElementById("ModalText").innerHTML += "Small household appliances are appliances that can be moved around and plugged in wherever there is an outlet.<br>";
        document.getElementById("ModalText").innerHTML += "<h5>1 Token per Kilogram</h5>";
    }
}
function WashingClick() {
    var m = document.getElementById("myModal");
    if (m.style.display == "none") {
        m.style.display = "block";
        document.getElementById("ModalText").innerHTML = "<h3>Large Household Appliances:</h3><br><br>";
        document.getElementById("ModalText").innerHTML += "<img src='images/washing_machine.png' alt='washing_machine' style='width:100px;height: 100px;'>";
        document.getElementById("ModalText").innerHTML += "<img src='images/fridge.png' alt='fridge' style='width:100px;height: 100px;'><br><br>";
        document.getElementById("ModalText").innerHTML += "Large household appliances are appliances that are located in one place.<br>";
        document.getElementById("ModalText").innerHTML += "<h5>1 Token per 3 Kilograms</h5>";
    }
}
function PlasticClick() {
    var m = document.getElementById("myModal");
    if (m.style.display == "none") {
        m.style.display = "block";
        document.getElementById("ModalText").innerHTML = "<h3>Plastic:</h3><br><br>";
        document.getElementById("ModalText").innerHTML += "<img src='images/bottle.png' alt='bottle' style='width:100px;height: 100px;'>";
        document.getElementById("ModalText").innerHTML += "<img src='images/cling.png' alt='cling_film' style='width:100px;height: 100px;'><br><br>";
        document.getElementById("ModalText").innerHTML += "We accept PET, HPDE, LDPE, PP and ABS.<br>";
        document.getElementById("ModalText").innerHTML += "<h5>1 Token per 2 Kilograms</h5>";
    }
}
function MetalClick() {
    var m = document.getElementById("myModal");
    if (m.style.display == "none") {
        m.style.display = "block";
        document.getElementById("ModalText").innerHTML = "<h3>Metal:</h3><br><br>";
        document.getElementById("ModalText").innerHTML += "<img src='images/metal.png' alt='metal' style='width:100px;height: 100px;'>";
        document.getElementById("ModalText").innerHTML += "<img src='images/copper.png' alt='copper' style='width:100px;height: 100px;'><br><br>";
        document.getElementById("ModalText").innerHTML += "We accept Aluminium, Copper, Iron and Brass.<br>";
        document.getElementById("ModalText").innerHTML += "<h5>1 Token per Kilogram</h5>";
    }
}
function ModalClose() {
    var m = document.getElementById("myModal");
    if (m.style.display == "none") {
        m.style.display = "block";
    } else {
        m.style.display = "none";
    }
}
</script>
</html>