<!DOCTYPE html>
<?php
	$currentpage="Home";
    $listshop=$_GET['listShops'];
?>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

	<?php
	// change the value of $dbuser and $dbpass to your username and password
		include 'connectvars.php';
		include 'header.php';

	?>
<div class="mainbody">
    <form action="listShops.php" >
    <input type="submit" value="See all shops">
    </form>

    <form action="listCustomers.php" >
    <input type="submit" value="List customers">
    </form>

    <form action="addCustomer.php" >
    <input type="submit" value="Add a customer">
    </form>
</div>
    </body>

	</html>
