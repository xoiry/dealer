<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OLAH DATA MOTOR</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <strong> OLAH DATA MOTOR </strong></td>
 <hr style="border:solid 1px; border-style:dotted;" width="750" align="left" />
<div class="link">
<table width="356" border="0">
  <tr>
    <td width="106"><a style="text-decoration:none;" href="?page=inmotor.html" title="Tambah Motor"><img src="image/add.png" width="16" />&nbsp;Tambah Motor</a></td>
    <td width="24" align="center">|</td>
    <td width="212"><a href="print.php?print=motor" target="_blank" title="Laporan"><img src="image/print_64.png" width="16"  />&nbsp;Cetak Laporan </a></td>
  </tr>
</table>
</div>
<div id="report">
<table width="465"  border="0" cellspacing="1" cellpadding="1">
  <tr align="center" >
    <th>No.  </th>
    <th>Merk Motor  </th>
    <th>warna</th>
    <th>Harga</th>
    <th align="center" width="62">Pilihan</th>
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
   $eksekusi=mysql_query("SELECT * FROM motor LIMIT $posisi,$batas") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
  <tr>
    <td width="28" align="center"><?php echo $no++; ?></td>
    <td width="122"><?php echo "$hasil[merk]"; ?></td>
    <td width="114"><?php echo "$hasil[warna]"; ?></td>
	
	  <? 
	  $hrg=$hasil['harga'];
	  $harga=str_replace(",",".",number_format($hrg));
      ?>
	
    <td width="121">Rp.&nbsp;<?php echo "$harga,-"; ?></td>
    <td align="center"><a href="?page=edmotor.html&kd_motor=<?php echo "$hasil[kd_motor]"; ?>"  title="Ubah">
	<img src="image/Edit-128.png" width="16" /></a>&nbsp;
	<a href="?page=delmotor.html&kd_motor=<?php echo "$hasil[kd_motor]"; ?>" onclick="return confirm('Apakah anda akan menhapus <?php echo "$hasil[merk]"; ?>? ') " title="Hapus"><img src="image/comment_delete-128.png" width="16" /></a></td>
  </tr>
  <? } ?>
</table>
</div>
<div class="paging">

<?
$tampil=mysql_query("SELECT * FROM motor ") or die ("Permintaan Gagal");
$jum_data=mysql_num_rows($tampil);
$jum_hal=ceil($jum_data/$batas);

echo"<br><b>Halaman:</b>&nbsp;";
for($i=1;$i<=$jum_hal;$i++)
if($i != $halaman)
{
echo" <a style=text-decoration:none; href=?page=motor.html&halaman=$i>$i</a>&nbsp;";
}
else
{
echo"<b>$i</b>";
}

?>
</div>
<br/> 
</body>
</html>
