<!DOCTYPE html>
<?php
		$currentpage="List Ratings";
    $customer = $_GET['cust'];
		$drink = $_GET['drink'];
		$shop = $_GET['shop'];
?>
<html>
	<head>
		<title>List Parts</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

	<?php
	// change the value of $dbuser and $dbpass to your username and password
		include 'connectvars.php';
		include 'header.php';
		echo"<div class=\"mainbody\">";
	// Connect to the database

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}

	// query to select all information from parts table
		$query = "SELECT Shop.Name, Drink.Flavor, Rating.Comment, Rating.NumStars, Customers.Name AS CustName
			FROM `Rating`, `Customers`, `Drink`, `Shop`
			WHERE Rating.CustomerID = Customers.CustomerID
			AND Rating.DrinkID = Drink.DrinkID
			AND Drink.ShopID = Shop.ShopID
			AND Rating.DrinkID = $drink";

	// Get results from query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		// If there are parts in the database construct an HTML table
		// to display the results
		$row = mysqli_fetch_array($result);
		if(mysqli_num_rows($result) > 0){
	     echo "<h2> Shop:" . $row['Name']. "</h1>";
			 echo "<h2> Drink:" . $row['Flavor']. "</h1>";
			echo "<table id='t01' border='1'>";
			// Create the table header
	        echo "<thead>";
				echo "<tr>";
				echo "<th>Customer</th>";
				echo "<th>Comment</th>";
				echo "<th>Rating(1-5)</th>";
				echo "</tr>";
	        echo "</thead>";
	        echo "<tbody>";

			// Extract rows from the results returned from the database
			mysqli_data_seek($result, 0);
	        while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>" . $row['CustName'] . "</td>";
						echo "<td>" . $row['Comment'] . "</td>";
						echo "<td>" . $row['NumStars'] . "</td>";
						echo "</tr>";
	        }
	        echo "</tbody>";
	        echo "</table>";
			// Free result set
	        mysqli_free_result($result);
	    } else{
			echo "<p class='lead'><em>No records were found.</em></p>";
	    }
		// Close the database connection
		mysqli_close($conn);
		echo "<input id=\"addButton\" type=\"Button\" value=\"Add a Rating\" onclick=\"window.location='addRating?user=".$user."&shop=".$shop."&drink=".$drink."'\">";
		echo "<input id=\"addButton\" type=\"Button\" value=\"Go Back to All Drinks\" onclick=\"window.location='list_drinks?user=".$user."&shop=".$shop."'\">";

	?>
</div>
	</body>

	</html>
