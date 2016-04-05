<?php
$server = "localhost";
$user = "root";
$password = "";
$mysql_connect = mysql_connect($server,$user,$password) or die ("MySQL ndak konek");
$db_connect = mysql_select_db("e-pharm") or die ("DB ndak konek");
?>