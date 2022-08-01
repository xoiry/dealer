<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OLAH DATA PELANGGAN</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<strong> OLAH DATA PELANGGAN </strong></td>
<hr style="border:solid 1px; border-style:dotted;" width="850" align="left" />
<div class="link">
<table width="425" border="0">
  <tr>
    <td width="132"><a href="?page=inpel.html" title="Tambah Pelanggan"><img src="image/add.png" width="16" />&nbsp;Tambah Pelanggan </a></td>
    <td width="23" align="center">|</td>
    <td width="256"><a href="print.php?print=pelanggan" target="_blank" title="Laporan"><img src="image/print_64.png" width="16" />&nbsp;Cetak Laporan </a></td>
  </tr>
</table>
</div>
<div id="report">
<table width="725" border="0" cellspacing="1" cellpadding="1">
  <tr align="center">
    <th>No.</th>
    <th>Nama  </th>
    <th>alamat</th>
    <th>Telp.</th>
    <th>HP</th>
    <th>No. KTP </th>
    <th>KK</th>
    <th>Slip. Gaji </th>
    <th>Ket.</th>
    <th align="center" width="75">Pilihan</th>
  </tr>
    <?
	   $batas=5;
   $halaman=$_GET['halaman'];
   if(empty($halaman))
   {
   $posisi=0;
   $halaman=1;
   }
   else
   {
   $posisi=($halaman-1)*$batas;
   }
   include "config/connect.php";
   $no=$posisi+1; 
   $eksekusi=mysql_query("SELECT * FROM pelanggan LIMIT $posisi,$batas") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
  <tr>
    <td width="25" align="center"><?php echo $no++; ?></td>
    <td width="77"><?php echo "$hasil[nama]"; ?></td>
    <td width="73"><?php echo "$hasil[alamat]"; ?></td>
    <td width="61"><?php echo "$hasil[telepon]"; ?></td>
    <td width="57"><?php echo "$hasil[hp]"; ?></td>
    <td width="69"><?php echo "$hasil[no_ktp]"; ?></td>
    <td width="61"><?php echo "$hasil[kk]"; ?></td>
    <td width="101"><?php echo "$hasil[slp_gaji]"; ?></td>
    <td width="93"><?php echo "$hasil[ket]"; ?></td>
    <td align="center"><a href="?page=edpel.html&kd_cust=<?php echo "$hasil[kd_cust]"; ?>"  title="Ubah">
	<img src="image/Edit-128.png" width="16" /></a>&nbsp;
	<a href="?page=delpel.html&kd_cust=<?php echo "$hasil[kd_cust]"; ?>" onclick="return confirm('Apakah anda akan menhapus <?php echo "$hasil[nama]"; ?>? ') " title="Hapus"><img src="image/comment_delete-128.png" width="16" /></a></td>
  </tr>
  <? } ?>
</table>
</div>
<div class="paging">
<?
$tampil=mysql_query("SELECT * FROM pelanggan ") or die ("Permintaan Gagal");
$jum_data=mysql_num_rows($tampil);
$jum_hal=ceil($jum_data/$batas);

echo"<br><b>Halaman:</b>&nbsp;";
for($i=1;$i<=$jum_hal;$i++)
if($i != $halaman)
{
echo" <a href=?page=pel.html&halaman=$i>$i</a>&nbsp;";
}
else
{
echo"<b>$i</b>";
}

?>
</div>
</body>
</html>
