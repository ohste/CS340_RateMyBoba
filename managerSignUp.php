
<!DOCTYPE html>
<html>
<head>
  <title>Manager Sign Up Page</title>
  <!-- <link rel="stylesheet" href="managerLogin.css"> -->
  <!-- <script type="text/javascript"></script>
 -->
 <style type="text/css">
   *{
  margin: 0;
  padding:0;
}
body{
  background-color:none;
  padding-top: 25vh;
}
.form-container{
  width: 300px;
  height: auto;
  padding: 30px 40px;
  background-color: #fff;
  border-radius: 15px;
  box-shadow: 0 0 10px #000;
  margin: auto;
}
ul.list{
  list-style-type: none;
  text-align: center;

}
ul.list li{
  width: 300px;
  margin-bottom: 15px

}
ul.list li input{
  width: 300px;
  text-align: center;
  padding: 16px 0px;
  border: none;
  background-color: #d3d3d3;
}
ul.list li input[type="button"]{
  background-color: #4690fb;
  color: #bbb;
}

ul.list li:nth-child(5){
  color: red;
}

#button:hover{
    box-shadow: inset 0 -4px 0 0 rgba(0,0,0,0.6), 0 0 8px 0 rgba(0,0,0,0.5);
}

#button:focus{
    position: relative;
    top: 2px;
    box-shadow: inset 0 3px 5px 0 rgba(0,0,0, 0.2);
    outline: 0;

 </style>

</head>
  <body>
    <form action ="addDrink.php" method="get">
 
    <div class="form-container" >
      <ul class="list" >
        <li>Manager SignUp</li>
        <li><input type="text" name="ManagerName" placeholder="Manager Name"></li>
        <li><input type="password" name="Password" placeholder="..."></li>
         <li><input type="button" id ="button" name="Submit" value="Submit"></li>
         <li><a href="managerLoginPage.php" target="_blank">You already have a account?</a></li>


    </div>
  </form>
<?php

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

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



  </body>

</head>
  
</html>

 <!--  https://www.youtube.com/watch?v=qFzalHnpYgM -->
