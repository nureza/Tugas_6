<?php
include 'koneksi.php';
if(isset($_GET['id'])){
	$delete = mysqli_query($koneksi, "DELETE FROM riwayat_pendidikan WHERE id = '".$_GET['id']."' ");
}