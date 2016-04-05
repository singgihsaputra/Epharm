<?php

$id = $_GET['id'];
$status = $_GET['status'];

include '../config.php';

$sql = "UPDATE transaksi SET status=$status WHERE id_transaksi = $id";

$hasil = mysql_query($sql);


if($hasil){
	print "<script>alert('Data berhasil diubah.'); location = 'pemesanan.php'; </script>";
}else{
	echo "Data gagal diubah.";
}



?>