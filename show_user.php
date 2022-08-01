<? 
if($_POST['ubah'])
{ 
   if($_POST['user']=='' || $_POST['pass']=='' )
   {include"msg1.html";}
   else
   {
   include"config/connect.php";
   $query = mysql_query("UPDATE user SET user='$_POST[user]',pass='$_POST[pass]' WHERE level='admin' " ) or die ("gagal");
   if($query)
   {include"msg3.html";}
}  
}  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>

<body>
<br />
<form action="<? $_SERVER['PHP_SELF']; ?>" method="post">

<table width="441" border="0" cellspacing="5">
<?
    include "config/connect.php";
   $eksekusi=mysql_query("SELECT * FROM user WHERE level='admin'") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
?>
  <tr>
    <th colspan="3" align="left">UBAH PASSWORD </th>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="150" rowspan="5" align="center"><img src="image/icon_admin.png" width="150" height="150" /></td>
    <td>Username</td>
    <td><input type="text" name="user" value="<?php echo "$hasil[user]"; ?>" size="20" style="color:#0000FF;" /></td>
    </tr>
  <tr>
    <td width="134">Password</td>
    <td width="198"><input type="text" name="pass" value="<?php echo "$hasil[pass]"; ?>" size="20" style="color:#0000FF;" /></td>
    </tr>
  <tr>
    <td colspan="2">*(Ganti dengan user &amp; password yang baru </td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit"   name="ubah" value="Ubah" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
	<? } ?>
</table>
</form>
<br />
</body>
</html>
