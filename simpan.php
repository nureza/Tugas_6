<?php

include 'koneksi.php';

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$riwayat = $_POST['riwayat_pendidikan'];
	$sql = "INSERT INTO riwayat VALUES ('$id','$riwayat_pendidikan')";
	if(mysqli_query($koneksi,$sql)){
		echo "BERHASIL MENAMBAH DATA RIWAYAT PENDIDIKAN";
	}else{
		echo "ERROR MANMBAH DATA RIWAYAT PENDIDIKAN <br/>".mysqli_error($conn);
	}
}