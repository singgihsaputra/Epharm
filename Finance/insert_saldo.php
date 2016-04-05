<?php

$saldo = $_POST['saldo'];

include '../config.php';

$bulan = mysql_fetch_array(mysql_query("SELECT DATE_FORMAT(NOW(),'%m') from DUAL"));
$b = "0".$bulan[0]+1;
$sql = "UPDATE saldo set Jumlah = $saldo WHERE DATE_FORMAT(Tanggal,'%m') = $b";

//echo $nama1[0].$nama2[0].$pesan;
/*
INSERT INTO saldo (id_saldo, Tanggal, Jumlah) VALUES (NULL, '2014-07-01', '5000000');

if (isset($_POST['send'])) {
     $sql = "INSERT INTO pesan VALUES ('',$nama2[0],$nama1[0],'$pesan',NOW(),0,0)";
 }
else{
     $sql = "INSERT INTO pesan VALUES ('',$nama2[0],$nama1[0],'$pesan',NOW(),1,0)";
 }
*/
$hasil = mysql_query($sql);


if($hasil){
	print "<script>location = 'general.php'; </script>";
}else{
	echo "Data gagal diubah.";
}



?>