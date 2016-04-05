<?php
include "konekdb.php";
session_start();
$idmasuk1=$_GET['idmasuk'];
$iduser=$_SESSION['idpegawai'];

$sql = mysql_query("select sum(total) as jumlah from penjualan where id_pemasukan='$idmasuk1' group by id_pemasukan");
$tm=mysql_fetch_array($sql);
$jml=$tm['jumlah'];
$hari=date('Y-m-d', mktime(0,0,0, date('m'), date('d'), date('Y')));
$sql1=mysql_query("insert into pemasukan values ('DB-','','$iduser','Penjualan Obat','$hari','Lunas','$jml')");
if($sql1){
header("location:jualbarang.php?idpesan=0&&pesan=Transaksi berhasil disimpan");
}



?>