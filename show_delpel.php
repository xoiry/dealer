<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?
   include_once "config/connect.php";
    mysql_query("DELETE FROM pelanggan WHERE kd_cust='$_GET[kd_cust]'");
	include"show_pel.php";
?>
</body>
</html>
