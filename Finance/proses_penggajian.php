<?php

$id = $_GET['id'];
$pegawai = $_GET['pegawai'];

include '../config.php';

$total=mysql_fetch_array(mysql_query("SELECT total from gajibulan where id_gaji=$id"));

$sql = "UPDATE gajibulan SET status=1 WHERE id_gaji = $id";

$hasil = mysql_query($sql);

$sql1 = "INSERT INTO pengeluaran VALUES ('KR-','',$pegawai,'Penggajian Pegawai',NOW(),'Gaji bulanan pegawai',$total[0])";

$hasil1 = mysql_query($sql1);


if($hasil && $hasil1){
	print "<script>location = 'index.php'; </script>";
}else{
	echo "Data gagal diubah.";
}



?>