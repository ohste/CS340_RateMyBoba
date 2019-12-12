<!DOCTYPE html>
<!-- Add Supplier Info to Table Supplier -->
<?php
$currentpage = "Add Customer";
?>
<html>

<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="login.css">
	<script>
		function myFunction() {
			var x = document.getElementById("Password");
			if (x.type === "text") {
				x.type = "password";
			} else {
				x.type = "text";
			}
		}
	</script>
</head>

<body>

	<?php
	// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// Escape user inputs for security
		$CustomerID = rand(100, 999);
		$Name = mysqli_real_escape_string($conn, $_POST['Name']);
		$Email = mysqli_real_escape_string($conn, $_POST['Email']);
		$Password = mysqli_real_escape_string($conn, $_POST['Password']);


		// See if sid is already in the table
		$queryIn = "SELECT * FROM Customers where CustomerID='$CustomerID' ";
		$resultIn = mysqli_query($conn, $queryIn);
		if (mysqli_num_rows($resultIn) > 0) {
			$msg = "<h2>Can't Add to Table</h2> There is already a customer with CustomerID $CustomerID<p>";
		} else {

			// attempt insert query
			$query = "INSERT INTO Customers (CustomerID, Name, Email, Password) VALUES ('$CustomerID', '$Name', '$Email', '$Password')";
			if (mysqli_query($conn, $query)) {
				// $msg =  "Record added successfully.<p>";
			} else {
				echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
			}
		}
	}

	// close connection
	mysqli_close($conn);

	?>

	<h2> <?php echo $msg; ?> </h2>
	<div class="form-container">

		<form method="post" id="addForm" action="homepage.php">
			<fieldset>
				<legend>Sign Up:</legend>
				<p>
					<label for="Name">Name:</label>
					<input type="text" class="required" name="Name" id="Name">
				</p>
				<p>
					<label for="Email">Email:</label>
					<input type="text" class="required" name="Email" id="Email">
				</p>
				<p>
					<label for="Password">Password:</label>
					<input type="password" class="required" name="Password" id="Password">
				</p>
				<p>
					<input type="checkbox" onclick="myFunction()">Show Password
				</p>

			</fieldset>
			<input type="submit" value="Sign up" />
		</form>
	</div>
</body>

</html>