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
    include 'connectvars.php';

    ?>
    <header>
        <div>
            <div id="main"><a href="homepage.php" id="home">RATE MY BOBA </a></div>
            <!-- <div id="bardiv"><em></em></div> -->

    </header>

    <div class="mainbody">

        <img class="bobaimg" src="boba.png" alt="Bob">
        <input class="homebutton" type="button" style="width:200px;height:50px;" value="FIND YOUR SHOP" onclick="window.location='listShops.php'" />
        <input class="homebutton" type="button" style="width:200px;height:50px;" value="SEE ALL CUSTOMERS" onclick="window.location='listCustomers.php'" />
        <input class="homebutton" type="button" style="width:200px;height:50px;" value="BECOME A CUSTOMER" onclick="window.location='addCustomer.php'" />

    </div>
</body>

</html>
