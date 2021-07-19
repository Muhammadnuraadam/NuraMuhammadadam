<?php    
session_start();  
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "grading";

$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
mysqli_select_db($db,$dbase) or die ("Could not connect to database name");

?>