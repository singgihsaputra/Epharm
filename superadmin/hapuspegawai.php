<?php
	include "konekdb.php";
	$id=$_GET['id'];
	echo $id;
	mysql_query("DELETE FROM authorization WHERE id_pegawai='$id'");
	header("location:deletepegawai.php")
?>