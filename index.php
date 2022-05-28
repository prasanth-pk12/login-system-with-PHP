<?php
session_start();
include("connection.php");
include("function.php");
$user_data = check_login($con);
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
padding: 10px;
border : 10px solid red;

}

.logout{
text-decoration : none;
background: orange;
color: white;
display: inline-block;
margin: 10px;
padding: 10px 20px;
}

h1{
  padding: 5px;
}

h5{
  padding: 3px;
}
 </style>

</head>
<body>
<div>
<a href="logout.php" class = "logout">Logout</a>
</div>
<h1>Welcome, <?php echo $user_data['name'] ?> </h1>
<h5>Your Email : <?php echo $user_data['email'] ?> </h5>

</body>
</html>