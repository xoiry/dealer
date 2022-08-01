<?

include"config/connect.php";

    if (isset($_POST['kd_cust'])) {
	    $kd_cust=$_POST['kd_cust'];
		$query=mysql_query("SELECT * FROM pelanggan WHERE kd_cust='$kd_cust'") or die ("gagal");//database
		$hasil=mysql_fetch_array($query);
		$nomor=$hasil['kd_cust'];//database
		   if ($kd_cust==$nomor) {
			  $msg1="<span style=color:red>Nomor sudah dipakai..!</span>";
			  $kode="";
		   } else {
			  $msg1="<span style=color:green>Ok...Lanjutkan</span>";
			  $kode=$kd_cust;
		   }
	} else {
	   $msg1="( * Isi bebas sesuai keinginan )";
	}
	




if($_POST['in_pel'])
{ 
   if($_POST['kd_cust']=='' || $_POST['nama']=='' ||  $_POST['alamat']=='' || $_POST['telepon']=='' || $_POST['hp']=='' || $_POST['no_ktp']=='' || $_POST['kk']=='' || $_POST['slp_gaji']=='' || $_POST['ket']=='')
   {include"msg1.html";}
   else
   {
   include"config/connect.php";
   $query = mysql_query("INSERT INTO pelanggan VALUES('$_POST[kd_cust]','$_POST[nama]','$_POST[alamat]','$_POST[telepon]','$_POST[hp]','$_POST[no_ktp]','$_POST[kk]','$_POST[slp_gaji]','$_POST[ket]')");
   if($query)
   { include"msg2.html"; echo"Untuk melihat data ....<a href=?page=pel.html> Klik disini </a>";}
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
<table width="403">
  <tr>
    <th colspan="2" bgcolor="#99CCFF" ><b>INPUT DATA PELANGGAN </b></th>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="144">Kode Pelanggan </td>
    <td width="247"><input name="kd_cust" type="text" size="10" onchange="this.form.submit();" value="<? echo $kode;?>" style="font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif" />
      <? echo $msg1;?></td>
  </tr>
  <tr>
    <td>Nama  </td>
    <td><input type="text" name="nama" size="15" /></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><input type="text" name="alamat" size="30" /></td>
  </tr>
  <tr>
    <td>Telepon</td>
    <td><input type="text" name="telepon" size="15" /></td>
  </tr>
  <tr>
    <td>HP</td>
    <td><input type="text" name="hp" size="15" /></td>
  </tr>
  <tr>
    <td>No.Ktp</td>
    <td><input type="text" name="no_ktp" size="20" /></td>
  </tr>
  <tr>
    <td>No. KK</td>
    <td><input type="text" name="kk" size="15" /></td>
  </tr>
  <tr>
    <td>Slip Gaji / Jumlah per bulan </td>
    <td><input type="text" name="slp_gaji" size="15" /></td>
  </tr>
  <tr>
    <td>ket</td>
    <td><textarea name="ket" cols="20" rows="4"></textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" >*( Berilah tanda (-) bila tidak diisi </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="in_pel" value="Simpan" class="elipse" />
      <input name="button" type="button"  value="Kembali" onclick="self.history.back()" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>





