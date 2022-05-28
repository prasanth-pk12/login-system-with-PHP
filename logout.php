<?php
session_start();

if(isset($_SESSION['user_id'])){
     unset($_SESSION['user_id']);
}

echo("<script>window.location = 'http://localhost/ls/login.php'</script>");
die();


