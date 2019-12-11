 <?php
	$user = $_GET['user'];
	//$content holds a 2D array with keys being menu names and values being an array with a subtitle, and content
	$content = array(
		// "Add Shop" => "addShop.php",
		// "Add Drink" => "add_drinks.php",
		// "Add Customer" => "addCustomer.php",
		// "Add Manager" => "addManager.php",
		// "List Drinks" => "list_drinks.php",
    "Home" => "homepage.php",
    "List Shops" => "listShops.php",
		"List Customers" => "listCustomers.php");

		// "List Managers" => "listManagers.php",
		// "Add Ratings" => "addRating.php",


?>
<header>
	<div>
    <div id = "main"><a href="home.php" id = "home">RATE MY BOBA </a></div>
    <div id="bardiv"><em>Welcome <span id="username"><?php echo $user;?></span>!</em>
    </div>
  </div>
</header>
<nav>
	<ul>
	<?php
		foreach ($content as $page => $location){
			echo "<li><a href='$location?user=".$user."' ".($page==$currentpage?" class='active'":"").">".$page."</a></li>";
		}
	?>
	</ul>
</nav>
