<?php
include "konekdb.php";
$no=$_GET['no'];
mysql_query("DELETE FROM dariwarehouse WHERE No='$no'");
header("location:order.php");
?>