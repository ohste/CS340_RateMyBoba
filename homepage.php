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
</head>

<body>

    <?php
    // change the value of $dbuser and $dbpass to your username and password
    include 'connectvars.php';
    include 'header.php';

    ?>
    <div class="mainbody">
        <input type="button" style="width:200px;height:50px" value="See all shops" onclick="window.location='listShops.php'" />
        <input type="button" style="width:200px;height:50px" value="List customers" onclick="window.location='listCustomers.php'" />
        <input type="button" style="width:200px;height:50px" value="Sign up" onclick="window.location='addCustomer.php'" />
    </div>
</body>

</html>