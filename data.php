<?php

include 'koneksi.php';

$sql = "SELECT * FROM riwayat";
$result = mysqli_query($koneksi,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$link_delete = "<a class='hapusData' href='delete.php?id=".$row['id']."'>Delete</a>";
		echo $row['id'].", Riwayat_pendidikan:".$row['riwayat_p'] . ". | $link_delete <br/>";
	}
}