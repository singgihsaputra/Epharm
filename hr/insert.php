<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="e-pharm"; // Database name 
$tbl_name="recruitment"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$id_pendaftaran=$_POST['id_pendaftaran'];
$nama=$_POST['nama'];
$departemen=$_POST['departemen'];
$cv=$_POST['cv'];

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(id_pendaftaran, nama, departemen, cv)VALUES('$id_pendaftaran', '$nama', '$departemen', '$cv')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='index.php'>go</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>