<?php

include 'conn.php';

if(isset($_POST['id_riwayat_pendidikan'])){
	$id = $_POST['id_riwayat_pendidikan'];
	$riwayat = $_POST['riwayat_p'];
	$sql = "INSERT INTO riwayat_pendidikan VALUES ('$id','$riwayat')";
	if(mysqli_query($conn,$sql)){
		echo "BERHASIL MENAMBAH DATA RIWAYAT PENDIDIKAN";
	}else{
		echo "ERROR MANMBAH DATA RIWAYAT PENDIDIKAN <br/>".mysqli_error($conn);
	}
}