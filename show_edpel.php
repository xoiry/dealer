<?

if($_POST['edpel'])
{ 
   if($_POST['kd_cust']=='' || $_POST['nama']=='' ||  $_POST['alamat']=='' || $_POST['telepon']=='' || $_POST['hp']=='' || $_POST['no_ktp']=='' || $_POST['kk']=='' || $_POST['slp_gaji']=='' || $_POST['ket']=='')
   {include"msg1.html";}
   else
   {
   include "config/connect.php";
   $query=mysql_query("UPDATE pelanggan SET kd_cust='$_POST[kd_cust]',nama='$_POST[nama]',alamat='$_POST[alamat]',telepon='$_POST[telepon]' ,hp='$_POST[hp]',no_ktp='$_POST[no_ktp]',kk='$_POST[kk]',slp_gaji='$_POST[slp_gaji]',ket='$_POST[ket]'WHERE kd_cust='$_POST[kd_cust]' " ) ;
   if($query)
   {include"msg3.html"; echo"Untuk melihat data...<a href=?page=pel.html> Klik disini </a>";}
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
<table width="426" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <th colspan="2">EDIT DATA PELANGGAN </th>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  
    <?
   include "config/connect.php";
   $eksekusi=mysql_query("SELECT * FROM pelanggan WHERE kd_cust='$_GET[kd_cust]'") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
  
  <tr>
    <td width="170">Kode</td>
    <td width="305"><input type="text" disabled="disabled" size="8" value="<?php echo "$hasil[kd_cust]"; ?>" />
      <input type="hidden" name="kd_cust" value="<?php echo "$hasil[kd_cust]"; ?>"  /></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama" size="15" value="<?php echo "$hasil[nama]"; ?>" /></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><input type="text" name="alamat" size="30" value="<?php echo "$hasil[alamat]"; ?>" /></td>
  </tr>
  <tr>
    <td>Telepon</td>
    <td><input type="text" name="telepon" size="12" value="<?php echo "$hasil[telepon]"; ?>" /></td>
  </tr>
  <tr>
    <td>HP</td>
    <td><input type="text" name="hp" size="12" value="<?php echo "$hasil[hp]"; ?>" /></td>
  </tr>
  <tr>
    <td>No.KTP</td>
    <td><input type="text" name="no_ktp" size="20" value="<?php echo "$hasil[no_ktp]"; ?>" /></td>
  </tr>
  <tr>
    <td>KK</td>
    <td><input type="text" name="kk" size="15" value="<?php echo "$hasil[kk]"; ?>" /></td>
  </tr>
  <tr>
    <td>Slip Gaji </td>
    <td><input type="text" name="slp_gaji" size="15" value="<?php echo "$hasil[slp_gaji]"; ?>" /></td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td><textarea name="ket" cols="20" rows="4"><?php echo "$hasil[ket]"; ?></textarea></td>
  </tr>
  <? } ?>
  <tr>
    <td colspan="2">*( Berilah tanda (-) bila tidak diisi </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="edpel" value="Ubah" class="elipse" />
      <input name="button" type="button"  value="Kembali" onclick="self.history.back()" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
