<?
include"config/connect.php";
if (isset($_POST['kd_motor'])) 
{
$kd_motor=$_POST['kd_motor'];
$query=mysql_query("SELECT * FROM motor WHERE kd_motor='$kd_motor'") or die ("gagal");//database
$hasil=mysql_fetch_array($query);
$nomor=$hasil['kd_motor'];//database
  if ($kd_motor==$nomor) 
  {
	$msg1="<span style=color:red>Nomor sudah dipakai..!</span>";
	$kode="";
  } 
  else 
  {
  $msg1="<span style=color:green>Ok...Lanjutkan</span>";
  $kode=$kd_motor;
  }
} 
else 
{
	   $msg1="( * Isi bebas sesuai keinginan )";
}



if($_POST['in_motor'])
{ 
   if($_POST['kd_motor']=='' || $_POST['merk']=='' ||  $_POST['warna']=='' || $_POST['harga']=='')
   {include"msg1.html";}
   else
   {
   include"config/connect.php";
   $query = mysql_query("INSERT INTO motor VALUES('$_POST[kd_motor]','$_POST[merk]','$_POST[warna]','$_POST[harga]')");
   if($query)
   {include"msg2.html"; echo"Untik melihat data....<a href=?page=motor.html> Klik di sini </a>";}
}  
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INPUT MMOTOR</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="POST" action="<? $_SERVER['PHP_SELF'];?>" >
<table width="400" border="0" cellspacing="1" cellpadding="1" >
  <tr>
    <th colspan="2" bgcolor="#99CCFF"><b>INPUT DATA MOTOR </b></th>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="100">Kode Motor </td>
    <td><input name="kd_motor" type="text" size="10" onchange="this.form.submit();" value="<? echo $kode;?>" style="font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif" />
      <? echo $msg1;?></td>
  </tr>
  <tr>
    <td>Merk Motor  </td>
    <td><input type="text" name="merk" size="30" /></td>
  </tr>
  <tr>
    <td>Warna</td>
    <td><input type="text" name="warna" size="15" /></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" size="20" /> 
    *(16000000 bukan Rp. 16.000.000 </td>
  </tr>
  <tr>
    <td colspan="2" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="in_motor" value="Simpan" class="elipse" />
      <input name="button" type="button" onclick="self.history.back()" value="Kembali" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>





