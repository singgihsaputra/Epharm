<?php 
include('../koneksi.php');
$p=$_GET['p'];
$a=$_GET['a'];
if($a=="acc"){
$cek=NULL;
while($cek==NULL ){
	$idt=rand(111111, 999999);
	$cek2=mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$idt'");
	$cekcek=mysql_fetch_array($cek2);
	if($cekcek==NULL){
		$cek=1;
	$idt=$idt;
	}
}
$show=mysql_query("insert into transaksi values ('$idt','$tgl','$p','$ids','0')"); 
$show2=mysql_query("update pemesanan set status='1' where id_pemesanan='$p'");
if($show && $show2){
header("location:index.php");
}
} else {
$show=mysql_query("update pemesanan set status='2' where id_pemesanan='$p'");
if($show){
header("location:index.php");
}
};

?>