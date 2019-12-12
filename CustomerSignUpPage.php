<!DOCTYPE html>

<?php 
    $currentpage="Customer Signup"

?>

<html>
<head>
  <title>Customer Sign Up Page</title>
  <link rel="stylesheet" href="login.css">
  <script>
        
  </script>
</head>

  <body>
    <form action ="addRating.php" method="get">
 
    <div class="form-container" >
      <ul class="list" >
        <li>Customer SignUp</li>
        <li><input type="text" name="Customer" placeholder="Customer Name"></li>
        <li><input type="password" name="Password" placeholder="..."></li>
         <li><input type="button" id ="button" name="Submit" value="Submit"></li>
         <li><a href="customerLoginPage.html" target="_blank">You already have a account?</a></li>


    </div>
  </form>
  
<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $passwordErr = "";
$name = $password  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "we should provide the name";
    }
    else
    {
        $name = test_input($_POST["name"]);
        
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "only allow the name and blank"; 
        }
    }
    
    if (empty($_POST["password"]))
    {
      $emailErr = "we should provide the password";
    }
    else
    {
        $email = test_input($_POST["email"]);
        
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$password))
        {
            $emailErr = "the password is invalid"; 
        }
    }
}

?>
</body>
</head>
</html>
