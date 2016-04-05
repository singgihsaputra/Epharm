<?php 
include('../konekdb.php');
session_start();
$user=$_SESSION['username'];
$getuser=mysql_query("select id_pegawai from authorization where Username='$user'");
$getiduser=mysql_fetch_array($getuser);
$iduser=$getiduser['id_pegawai'];
$tgl=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));

if(!isset($_GET['a'])){
$a=$_POST['a'];
$p=$_POST['p'];
} else {
$a=$_GET['a'];
$p=$_GET['p'];
$ids=$_GET['ids'];
}
$harga=$_GET['harga'];
if($a=="acc"){
$ambil=mysql_query("select id_transaksi from transaksi where id_supplier='$ids' and tanggal='$tgl'");
$ambil2=mysql_fetch_array($ambil);
if($ambil2==NULL){
$cek=NULL;
while($cek==NULL ){
	$idt=rand(111111, 999999);
	$cek2=mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$idt'");
	$cekcek=mysql_fetch_array($cek2);
	if($cekcek==NULL){
		$cek=1;
	$idt=$idt;
	}
}} else{
$idt=$ambil2['id_transaksi'];
}
$show=mysql_query("insert into transaksi values ('$idt','$tgl','$p','$ids','0')"); 
$show2=mysql_query("update pemesanan set harga='$harga', status='1' where id_pemesanan='$p'");
if($show && $show2){
header("location:index.php");
}
} else if($a=="dc"){
$show=mysql_query("update pemesanan set status='2' where id_pemesanan='$p'");
if($show){
header("location:index.php");
}
} else if($a=="siap"){
$show3=mysql_query("update transaksi set status='4' where id_transaksi='$p'"); 
$show=mysql_query("select * from pemesanan where id_pemesanan in (select id_pemesanan from transaksi where id_transaksi='$p')");
$ket=$_POST['keterangan'];
while($get=mysql_fetch_array($show)){
$nama=$get['namabarang'];
$tot=$get['harga'];
$out=mysql_query("insert into pengeluaran (id_pegawai, Nama, Tanggal, Keterangan, Total) values ('$iduser','$nama','$tgl','$ket','$tot')");
}

if($show3 && $show && $out){
header("location:transaksi.php");
}
} else if($a=="fin"){
$show=mysql_query("select * from pemesanan where id_pemesanan in (select id_pemesanan from transaksi where id_transaksi='$p')");

while($get=mysql_fetch_array($show)){
$nama=$get['namabarang'];
$cek=mysql_query("select count(Nama) as tot from warehouse where Nama='$nama'");
$cek2=mysql_fetch_array($cek);
if($cek2['tot']!="0"){
$show2=mysql_query("select * from warehouse where Nama='$nama'");
$ids=$get['id_pemesanan'];
$get2=mysql_fetch_array($show2);
$tot1=$get['jumlah'];
$tot2=$get2['Stok'];
$tot=$tot1+$tot2;
$harga1=$get['harga'];
$harga2=$get2['Harga'];
$harga=$harga1+$harga2;
$satuan=$get['satuan'];
$id=$get2['id_barang'];
$new=mysql_query("update warehouse set Stok=$tot, Harga='$harga' where id_barang='$id'");
} else {
$harga=$get['harga'];
$tot=$get['jumlah'];
$satuan=$get['satuan'];
$jenis=$get['jenis'];
$new=mysql_query("insert into warehouse (Nama, Stok, Jenis, Harga, Satuan) values ('$nama','$tot', '$jenis','$harga','$satuan')");
}
}
$show4=mysql_query("update transaksi set status='6' where id_transaksi='$p'"); 
if($show && $show4 && $new){
header("location:laporan.php");
}
};

?>