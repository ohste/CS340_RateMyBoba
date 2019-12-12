﻿
<!DOCTYPE html>
<?php
$currentpage = "Remove Customers";
?>
<html>

<head>
    <title>Remove Customers</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <?php
    // change the value of $dbuser and $dbpass to your username and password
    include 'connectvars.php';
    include 'header.php';

    // Connect to the database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }

    // query to select all information from parts table
    $query = "SELECT * FROM `Customers` ";

    // Get results from query
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query to show fields from table failed");
    }

    // // If there are parts in the database construct an HTML table
    // // to display the results
    // if(mysqli_num_rows($result) > 0){
    //     echo "<h1>Remove Customers</h1>";
    // 	echo "<table id='t01' border='1'>";
    // 	// Create the table header
    //     echo "<thead>";
    // 		echo "<tr>";
    // 		echo "<th>ID</th>";
    // 		echo "<th>Name</th>";
    // 		echo "</tr>";
    //     echo "</thead>";
    //     echo "<tbody>";

    // 	// Extract rows from the results returned from the database
    //     while($row = mysqli_fetch_array($result)){
    // 				echo "<tr>";
    // 				echo "<td>" . $row['CustomerID'] . "</td>";
    // 				echo "<td><a href = 'listRatingsByCustomer?user=".$user."&cust=".$row['CustomerID']
    // 				."' >".$row['Name'] . "</td>";
    // 				echo "</tr>";
    //     }
    //     echo "</tbody>";
    //     echo "</table>";
    // 	// Free result set
    //     mysqli_free_result($result);
    // } else{
    // 	echo "<p class='lead'><em>No records were found.</em></p>";
    // }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape user inputs for security
        // $CustomerID = mysqli_real_escape_string($conn, $_POST['CustomerID']);
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        $queryIn = "SELECT * FROM Customers where Name='$Name' && Password='$Password'";
        $resultIn = mysqli_query($conn, $queryIn);
        if (mysqli_num_rows($resultIn) > 0) {
            $queryOut = "DELETE FROM Customers where Name='$Name' && Password='$Password'";
            if (mysqli_query($conn, $queryOut)) {
                $msg = "Delete was successfully.<p>";
            } else {
                echo "ERROR: Could not able to execute $queryOut. " . mysqli_error($conn);
            }
        } else {
            $msg = "<h2>Can't Remove Customer</h2> $Name does not exist <p>";
        }
    }
    // Close the database connection
    mysqli_close($conn);
    ?>

    <h2> <?php echo $msg; ?> </h2>

    <form method="post">
        <fieldset>
            <legend>Remove a customer:</legend>
            <p>
                <label for="Name">Name:</label>
                <input type="text" class="required" name="Name" id="Name">
            </p>
            <p>
                <label for="Password">Password:</label>
                <input type="text" class="required" name="Password" id="Password">
            </p>
        </fieldset>
        <input type="submit" style="width:200px;height:50px" value="Submit" onclick="window.location='listCustomers.php'"/>
    </form>
</body>

</html>