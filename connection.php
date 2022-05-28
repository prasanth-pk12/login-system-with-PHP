<?php
$dbHost = "localhost";
$dbUser  = "root";
$dbPass = "";
$dbName = "test";
if(!$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)){
  die("Failed to connect... ");
}