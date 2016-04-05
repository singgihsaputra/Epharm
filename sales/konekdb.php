<?php
$server = "localhost";
$user = "root";
$password = "";
$mysql_connect = mysql_connect($server,$user,$password) or die ("MySQL ndak konek");
$db_connect = mysql_select_db("e-pharm") or die ("DB ndak konek");

//$server = "mysql.idhostinger.com";
//$user = "u389361009_inti";
//$password = "pintusurga00";
//$mysql_connect = mysql_connect($server,$user,$password) or die ("MySQL ndak konek");
//$db_connect = mysql_select_db("u389361009_pharm") or die ("DB ndak konek");

?>