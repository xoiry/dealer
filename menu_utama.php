<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("location:index.php?warn=Untuk masuk sistem, anda harus login lagi...");
	exit;
}
 include"config/connect.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="image/honda_logo_red.png"  type="image/x-icon" />
<title>Admin</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<div align="center">
<body id="layout">
<div id="body">
<div id="header"></div>
<div id="nav"><? include"menu_nav.html" ; ?></div>

<div id="katalogall">
<div id="katalogheader" class="headerkatalog"></div>
<div id="katalogmiddle" align="left">
    <? 
	$page=$_GET['page'];
	$page=str_replace(".html","",$page);
	$file="show_$page.php";
	if(!file_exists($file))
	{
	include("show_home.php");
	}
	else
	{
	include("show_$page.php");
	}
	?>
</div>
<div id="katalogfooter"></div>
</div>

<div align="center"  id="footer"><font color="#FFFFFF" style="font-size:11px;" >Copyright (c) 2012 UKK SMK MUH SEYEGAN Created by: M. Khairi A.M </font></div>
</div>
</body>
</div>
</html>