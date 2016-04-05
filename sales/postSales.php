<?php
include "konekdb.php";

$idmasuk=$_GET['idpemasukan'];
$nmobat=$_GET['namaobat'];
$jmlobat=$_GET['jumlahobat'];

$sql = "SELECT * FROM warehouse where nama='$nmobat'";
$obat = mysql_query ($sql, $mysql_connect);
$hasil=mysql_fetch_array($obat);
$idbrg=$hasil['id_barang'];
$hrg = $hasil['Harga'];
$hrg1=$hrg * $jmlobat;
$stok=$hasil['Stok'];
if($stok>=$jmlobat){
$sisa=$stok-$jmlobat;
 mysql_query("INSERT INTO penjualan VALUES ('','$idmasuk','$idbrg','$jmlobat', '$hrg1')");
 mysql_query("UPDATE warehouse set Stok=$sisa where id_barang=$idbrg");
 header("location:jualbarang.php?idpesan=0&&pesan=Transaksi sukses");
}else{
header("location:jualbarang.php?idpesan=1&&pesan=Maaf, Jumlah barang tidak mencukupi");
}





?>