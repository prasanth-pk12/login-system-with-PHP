<?php
session_start();
include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD']== "POST"){
// something was posted
$uname = $_POST['uname'];
$pass = $_POST['pass'];

if(!empty($uname) && !empty($pass) && !is_numeric($uname)){

// read from database

$query = "select * from users where user_name ='$uname' limit 1";

$result = mysqli_query($con,$query);

if($result){

  if($result && mysqli_num_rows($result) > 0){
    $user_data = mysqli_fetch_assoc($result);
  
    if($user_data['pass']=== $pass)
    $_SESSION['user_id'] = $user_data['user_id'];
   echo("<script>window.location = 'http://localhost/ls/index.php'</script>");
   die();
    }
    else{
      echo "Incorrect username or password";
      }
}
}
else{
  echo "Incorrect username or password";
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoTech</title>
 <style type="text/css">

*{
  margin: 0;
  box-sizing:border-box;
  font-family: sans-serif;
}

   body{
     width: 100vw;
    }

    .flex{
  height: 100vh;
  display:flex;
  align-items: center;
  justify-content:center;
}

label { 
  display: block; 
 margin-bottom : 3px;
 font-weight: bold;
 font-size: 12px;
}

fieldset{
  border:4px solid #f228f2;
  border-radius:5px;
  padding:30px 60px;
  box-shadow: 10px 10px 5px lightblue;
}

legend{
  font-weight: bold;
  font-size: 20px;
  color : #ffffff;
  background : #ffb732;
  border-radius: 10px;
  padding : 5px 15px
}

.btn{
  display:flex;
  justify-content: space-evenly;

}
button{
  padding:5px 10px
}

a{
  font-size: 14px;
}
input{
padding: 5px
}

 </style>

</head>
<body>

<div class="flex">
<form action="login.php" method="post">

<fieldset>
<legend>InfoTech</legend>


<label for="user name">Username</label>
<input type="text" name ="uname" placeholder= "Enter your username"><br><br>
<label for="password">Password</label>
<input type="password" name ="pass" placeholder= "Enter your password"><br><br>
<div class="btn">
<button type="submit">Login</button>
<a href="register.php"> Register</a>
</div>
</fieldset>
</form>
</div>
</body>
</html>