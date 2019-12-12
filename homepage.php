<!DOCTYPE html>
<?php
$currentpage = "Home";
$listshop = $_GET['listShops'];
?>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="animate.css">
</head>

<body>

    <?php
    // change the value of $dbuser and $dbpass to your username and password
    include 'connectvars.php';
    // include 'header.php';

    ?>
    <header>
    <div>
    <div id = "main"><a href="home.php" id = "home">RATE MY BOBA </a></div>
    <div id="bardiv"><em>Welcome <span id="username"><?php echo $user;?></span>!</em>
    </div>

    </header>
    <div class="mainbody">
        <img class="bobaimg" src="boba.png" alt="Boba Fett">
        <input class="homebutton" type="button" style="width:200px;height:50px" value="See all shops" onclick="window.location='listShops.php'" />
        <input class="homebutton" type="button" style="width:200px;height:50px" value="List customers" onclick="window.location='listCustomers.php'" />
        <input class="homebutton" type="button" style="width:200px;height:50px" value="Sign up" onclick="window.location='addCustomer.php'" />
    </div>
</body>

</html>