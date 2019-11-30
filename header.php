<?php		
	$user = $_GET['user'];
	//$content holds a 2D array with keys being menu names and values being an array with a subtitle, and content
	$content = array(
		"Add Supplier" => "addSupplier.php",
		"List Suppliers" => "listSuppliers.php");
?>
<header> 
	Aeijan Bajracharya - <em>Welcome <span id="username"><?php echo $user;?></span>!</em>
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
