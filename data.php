<?php

include 'conn.php';

$sql = "SELECT * FROM riwayat_pendidikan";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$link_delete = "<a class='hapusData' href='delete.php?id_riwayat_pendidikan=".$row['id_riwayat_pendidikan']."'>Delete</a>";
		echo $row['id_riwayat_pendidikan'].", Riwayat_pendidikan:".$row['riwayat_p'] . ". | $link_delete <br/>";
	}
}