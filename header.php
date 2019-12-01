<?php
	$user = $_GET['user'];
	//$content holds a 2D array with keys being menu names and values being an array with a subtitle, and content
	$content = array(
		"Add Supplier" => "addSupplier.php",
		"Add Part" => "addPart.php",
		"List Customers" => "listCustomers.php",
		"List Suppliers" => "listSuppliers.php",
	/*"Ratings by Customer" => "listRatingsByCustomer.php"*/);
?>
<header>
	My Site - <em>Welcome Stephen<span id="somespan"><?php echo $user;?></span>!</em>
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
