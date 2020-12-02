<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$db= "user";

	$koneksi = mysqli_connect($host, $username, $password, $db);
if(!$koneksi){
		die("Conection failed :".mysqli_connect_error());
	}

 ?>