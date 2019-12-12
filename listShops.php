<!DOCTYPE html>
<?php
$currentpage = "List Shops";

?>
<html>

<head>
	<title>List Shops</title>
	<link rel="stylesheet" href="index.css">
</head>

<body>


	<?php
	include 'header.php';
	include 'connectvars.php';

	echo "<div class=\"mainbody\">";
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' .mysql_error());
	}

	// query to select all information from supplier table
	$query = "SELECT Name, NumStars, ShopID FROM `Shop` ";

	// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	if (mysqli_num_rows($result) > 0) {
		echo "<h1 class='table'>Shops</h1>";
		echo "<h3 class='table'>Click a shop to see their information</h3>";
		echo "<table class='center' id='t01' border='1'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Rating</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td><a class='shops' href = 'list_drinks?user=" . $user . "&shop=" . $row['ShopID']
				. "' >" . $row['Name'] . "</td>";
			echo "<td>" . $row['NumStars'] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		// Free result set
		mysqli_free_result($result);
	} else {
		echo "<p class='lead'><em>No records were found.</em></p>";
	}
	mysqli_close($conn);
	?>

	<div style="text-align:center;">
		<input type="button" style="width:200px;height:50px;font-size:20px;margin:10px;" value="Add a shop" onclick="window.location='addShop.php'" />
	</div>

</body>

</html>