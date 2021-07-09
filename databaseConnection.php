<?php
$servername="localhost";
$Uname="root";
$password="";
$dbname="hms";
$conn=mysqli_connect($servername,$Uname,$password,$dbname);
//$conn=mysqli_connect('localhost','root','','demo');

if(!$conn)
{
	die("Connection failed:".mysqli_connect_error());
}


?>
