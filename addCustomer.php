<!DOCTYPE html>
<!-- Add Supplier Info to Table Supplier -->
<?php
		$currentpage="Add Customer";
?>
<html>
	<head>
		<title>Add Customer</title>
		<link rel="stylesheet" href="index.css">
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
	include "header.php";
	$msg = "Add new customer to the Customer Table";

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
		if (mysqli_num_rows($resultIn)> 0) {
			$msg ="<h2>Can't Add to Table</h2> There is already a customer with CustomerID $CustomerID<p>";
		} else {

		// attempt insert query
			$query = "INSERT INTO Customers (CustomerID, Name, Email, Password) VALUES ('$CustomerID', '$Name', '$Email', '$Password')";
			if(mysqli_query($conn, $query)){
				$msg =  "Record added successfully.<p>";
			} else{
				echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
			}
		}
}
// close connection
mysqli_close($conn);

?>

	<h2> <?php echo $msg; ?> </h2>

	<form method="post" id="addForm">
	<fieldset>
		<legend>Add a customer:</legend>
		<!-- <p>
			<label for="CustomerID">Customer:</label>
			<input type="number" min=1 max = 99999 class="required" name="CustomerID" id="CustomerID" title="CustomerID should be numeric">
		</p> -->
		<p>
			<label for="Name">First Name:</label>
			<input type="text" class="required" name="Name" id="Name">
		</p>
		<p>
			<label for="Email">Email:</label>
			<input type="text" class="required" name="Email" id="Email">
		</p>
		<p>
			<label for="Password">Password:</label>
			<input type="password" class="required" name="Password" id="Password">
      	<p>
		<input type="checkbox" onclick="myFunction()">Show Password

	</fieldset>


        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
	</form>
	</body>
</html>
