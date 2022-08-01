<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>


</head>

<body >


<? include"config/connect.php"; 
 $motor=mysql_num_rows(mysql_query("SELECT*FROM motor")); 
 $pelanggan=mysql_num_rows(mysql_query("SELECT*FROM pelanggan"));
 $beli_cash=mysql_num_rows(mysql_query("SELECT*FROM beli_cash"));
 $beli_kredit=mysql_num_rows(mysql_query("SELECT*FROM beli_kredit"));

?> 

<div id="report">
<table width="950" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" style="background:TRANSPARENT;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="background:TRANSPARENT;" align="center"><font size="+2">DATA STATISTIK</font></td>
  </tr>
  <tr>
    <td colspan="3" style="background:TRANSPARENT;">&nbsp;</td>
    </tr>
  
  <tr>
    <td width="460" style="background:TRANSPARENT;" align="right">Jumlah motor </td>
    <td width="21" style="background:TRANSPARENT;" align="center">:</td>
    <td width="467" style="background:TRANSPARENT;"><b><? echo"$motor"; ?></b>&nbsp;Unit</td>
  </tr>
  <tr>
    <td colspan="3" style="background:TRANSPARENT;"><hr width="500" style="border-style:dotted"; /></td>
    </tr>
  <tr>
    <td style="background:TRANSPARENT;" align="right">Jumlah pelanggan </td>
    <td style="background:TRANSPARENT;" align="center">:</td>
    <td style="background:TRANSPARENT;"><b><? echo"$pelanggan"; ?></b>&nbsp;Orang</td>
  </tr>
  <tr>
    <td colspan="3" style="background:TRANSPARENT;"><hr width="500" style="border-style:dotted"; /></td>
    </tr>
  <tr>
    <td style="background:TRANSPARENT;" align="right">Jumlah pembelian cash </td>
    <td style="background:TRANSPARENT;" align="center">:</td>
    <td style="background:TRANSPARENT;"><b><? echo"$beli_cash"; ?></b>&nbsp;Pelanggan</td>
  </tr>
  <tr>
    <td colspan="3" style="background:TRANSPARENT;"><hr width="500" style="border-style:dotted"; /></td>
    </tr>
  <tr>
    <td style="background:TRANSPARENT;" align="right">Jumlah pembelian kredit</td>
    <td style="background:TRANSPARENT;" align="center">:</td>
    <td style="background:TRANSPARENT;"><b><? echo"$beli_kredit"; ?></b>&nbsp;Pelanggan</td>
  </tr>
  <tr>
    <td colspan="3" align="right" style="background:TRANSPARENT;"><hr width="500" style="border-style:dotted"; /></td>
  </tr>
  <tr>
    <td style="background:TRANSPARENT;" align="right">&nbsp;</td>
    <td style="background:TRANSPARENT;">&nbsp;</td>
    <td style="background:TRANSPARENT;">&nbsp;</td>
  </tr>
  <tr>
    <td style="background:TRANSPARENT;" align="right">&nbsp;</td>
    <td style="background:TRANSPARENT;">&nbsp;</td>
    <td style="background:TRANSPARENT;">&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
