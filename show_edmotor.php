<?

if($_POST['edmotor'])
{ 
   if($_POST['kd_motor']=='' || $_POST['merk']=='' ||  $_POST['warna']=='' || $_POST['harga']=='')
   {include"msg1.html";}
   else
   {
   include "config/connect.php";
   $query=mysql_query("UPDATE motor SET kd_motor='$_POST[kd_motor]',merk='$_POST[merk]',warna='$_POST[warna]',harga='$_POST[harga]' WHERE kd_motor='$_POST[kd_motor]' " ) ;
   if($query)
   { include"msg3.html"; echo"Untuk melihat data....<a href=?page=motor.html> Klik disini </a>";}
}  
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="POST" action="<? $_SERVER['PHP_SELF'];?>" >
<table width="426" border="0">
  <tr>
    <TH colspan="2" bgcolor="#0099FF">EDIT DATA MOTOR </TH>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  
    <?
   include "config/connect.php";
   $eksekusi=mysql_query("SELECT * FROM motor WHERE kd_motor='$_GET[kd_motor]'") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
  
  <tr>
    <td width="170">Kode Motor </td>
    <td width="305"><input type="text" disabled="disabled" name="kd_motor" size="8" value="<?php echo "$hasil[kd_motor]"; ?>" />
	<input type="hidden" name="kd_motor" value="<?php echo "$hasil[kd_motor]"; ?>"  /></td>
  </tr>
  <tr>
    <td>Merk</td>
    <td><input type="text" name="merk" size="20"  value="<?php echo "$hasil[merk]"; ?>"/></td>
  </tr>
  <tr>
    <td>Warna</td>
    <td><input type="text" name="warna" size="10"  value="<?php echo "$hasil[warna]"; ?>"/></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" size="9" value="<?php echo "$hasil[harga]"; ?>" />
      *(16000000 bukan Rp. 16.000.000 </td>
  </tr>
  <? } ?>
  <tr>
    <td colspan="2" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="edmotor" value="Ubah" class="elipse" />
      <input name="button" type="button" onclick="self.history.back()" value="Kembali" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
