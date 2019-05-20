<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "productInformation";

$con = mysqli_connect($host,$user,$pass,$db);
if(!$con){
	echo "<script>Database not connected !</script>";
}


?>