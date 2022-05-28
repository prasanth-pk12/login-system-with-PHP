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
     height:100vh;
    display:flex;
    flex-direction: column;
    align-items:center;
    justify-content: center:

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
  border:4px solid blue;
  border-radius:5px;
  padding:30px 60px;
  box-shadow: 10px 10px 5px lightblue;
}

legend{
  font-weight: bold;
  font-size: 20px;
  color : white;
  background : #ff5722;
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

.gender{
font-size: 12px

}
a{
  font-size: 14px;
}

input{
padding: 5px
}

#err{
  text-align : center;
  margin-bottom: 20px;

}
 </style>

</head>
<body>

  
  <div class="flex">
    
    <form  action = "" method="POST">
    <h4 id="err"></h5>

<fieldset>
<legend>InfoTech</legend>
<label for="name">Name</label>
<input type="text" name="name"  placeholder= "Enter your name"><br><br>
<label for="gender" style="margin-bottom : 10px">Gender</label>
<input type="radio" name="gender" value="male"  > <span class = "gender">Male</span>
<input type="radio" name="gender" value="female" > <span  class = "gender">Female</span>
<br><br>
<label for="email">Email</label>
<input type="email" name ="email"  placeholder= "Enter your email"><br><br>
<label for="">Username</label>
<input type="text" name ="uname"  placeholder= "Create username"><br><br>
<label for="password"> Password</label>
<input type="password" name ="password"  placeholder= "Create  password"><br><br>
<div class="btn"><button type="submit">Register</button>
<a href="login.php"> Login </a>

</fieldset>
</form>
</div>

<?php
session_start();

include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD']== "POST"){

// something was posted
$name = $_POST['name'];

if(isset($_POST['gender'])){
  $gender = $_POST['gender'];
}else{
$gender = "";
}

$email = $_POST['email'];
$uname = $_POST['uname'];
$pass = $_POST['password'];

if(!empty($uname) && !empty($pass) && !is_numeric($uname)){
  
  $user_id = random_num(20);
  
// save to database
$query = "insert into users (user_id, pass, name, gender, email, user_name) values ('$user_id', '$pass', '$name', '$gender', '$email', '$uname')";

mysqli_query($con,$query);

echo("<script>window.location = 'http://localhost/ls/login.php'</script>");
die();
}

else{
echo "
<script>
document.getElementById('err').textContent = 'Please enter some valid information!'
</script>
";
}
}
?>

</body>
</html>



