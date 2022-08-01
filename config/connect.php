<?
$host="localhost";
$user="root";
$pas="";
$database="dealer";
mysql_connect($host,$user,$pas)
or die("Tidak connect".mysql_error());
mysql_select_db($database);
?>