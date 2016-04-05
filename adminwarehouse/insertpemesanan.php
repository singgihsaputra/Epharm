<?php
include "konekdb.php";

$no=$_GET['no'];
$nama=$_GET['nama'];
$jenis=$_GET['jenis'];
$jumlah=$_GET['jumlah'];
$satuan=$_GET['satuan'];
$supplier=$_GET['supplier'];
$status=$_GET['status'];
$cabang=$_GET['cabang'];
$tgl=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));

mysql_query("INSERT INTO pemesanan (namabarang,jenis,jumlah,satuan,tanggal,status) VALUES ('$nama','$jenis','$jumlah','$satuan','$tgl','0')");
mysql_query("UPDATE dariwarehouse SET status='1' WHERE No='$no'");

header ("location:daftarACC.php");

?>