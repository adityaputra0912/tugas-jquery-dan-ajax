<?php

#include'conn.php'

#$sql = "DELETE FROM riwayat_pendidikan WHERE id_riwayat_pendidikan='".$_GET['id_riwayat_pendidikan']."'";
#$result = mysqli_query($conn,$sql);

include 'conn.php';
if(isset($_GET['id_riwayat_pendidikan'])){
	$delete = mysqli_query($conn, "DELETE FROM riwayat_pendidikan WHERE id_riwayat_pendidikan = '".$_GET['id_riwayat_pendidikan']."' ");
}