<!DOCTYPE html>
<?php
		$currentpage="List Drinks";
		$shop = $_GET['shop'];
?>
<html>
	<head>
		<title>List Drinks</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>


<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';
	include 'header.php';

echo"<div class=\"mainbody\">";
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

// query to select all information from supplier table

	$query = "SELECT Drink.DrinkID, Drink.Flavor, Drink.Temperature, Drink.Price, Drink.Rating FROM Drink, Shop
		WHERE Drink.ShopID=Shop.ShopID
		AND Shop.ShopID= $shop";
	$query2 = "SELECT Manager.Name, Manager.Email, Shop.Address, Shop.Phone FROM Manager, Shop
	WHERE Manager.managerID = Shop.managerID
	AND Shop.ShopID = $shop";

// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
	$result2 = mysqli_query($conn, $query2);
	if (!$result2) {
		die("Query to show fields from manager failed");
	}

	if(mysqli_num_rows($result) > 0){
    echo "<h1>Drinks</h1>";
		echo "<div id=info>";
		echo "<table id='t01' border='1'>";

		echo "<thead>";
		echo "<tr>";
		// echo "<th>DrinkID</th>";
		echo "<th>Flavor</th>";
		echo "<th>Temperature</th>";
		echo "<th>Price</th>";
		echo "<th>Rating</th>";
		echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


		while($row = mysqli_fetch_array($result)){


		    echo "<tr>";
				// echo "</tr>";
				echo "<td><a class='shops' href = 'listRatings?user=".$user."&shop=".$shop
				."&drink=".$row['DrinkID']."' >".$row['Flavor'] . "</td>";
				// echo "<td>" . $row['Flavor'] . "</td>";
        echo "<td>" . $row['Temperature'] . "</td>";
				echo "<td>" . $row['Price'] . "</td>";
				echo "<td>" . $row['Rating'] . "</td>";
        echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
		// Free result set
        mysqli_free_result($result);
    } else{
		echo "<div id=info>";
		echo "<p class='lead'>No drinks yet for this shop! Would you like to</p>";
    }

	mysqli_close($conn);
echo "</div>";
$row = mysqli_fetch_array($result2);
echo "<div id=info2>";
echo "Address: " . $row[Address];
echo "<br>";
echo "Phone: " . $row[Phone];
echo "<br>";
echo "Manager: " . $row[Name] ;
echo "<br>";
echo "Email: " . $row[Email];
echo "</div>";
echo "<div id=info3>";
echo "<bottom>";
echo "<input id=\"addButton\" type=\"Button\" value=\"Add a Drink\" onclick=\"window.location='add_drinks?user=".$user."&shop=".$shop."'\">";
echo "</input>";
echo "<input id=\"addButton\" type=\"Button\" value=\"Go Back to All Shops\" onclick=\"window.location='listShops?user=".$user."'\">";
echo "</input>";
echo "</div>";
echo "</bottom>";
echo "</div>";
?>

</body>
</html>
