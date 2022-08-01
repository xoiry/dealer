<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OLAH DATA PEMBELIAN CASH</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<strong> OLAH DATA PEMBELIAN CASH</strong></td>
<hr style="border:solid 1px; border-style:dotted;" width="750" align="left" />
<div class="link">
<table width="356" border="0">
  <tr>
    <td width="106"><a href="?page=incash.html" title="Tambah Data"><img src="image/add.png" width="16" />&nbsp;Tambah Data</a></td>
    <td width="24" align="center">|</td>
    <td width="212"><a href="print.php?print=cash" target="_blank" title="Laporan"><img src="image/print_64.png" width="16" />&nbsp;Cetak Laporan </a></td>
  </tr>
</table>
</div>
<div id="report">
<table width="400" border="0" cellspacing="1" cellpadding="1">
  <tr align="center">
    <th>No.  </th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Total Bayar </th>
    <th>Ket</th>
    <th align="center" width="55">Pilihan</th>
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
   $eksekusi=mysql_query("SELECT beli_cash.*,pelanggan.nama FROM beli_cash,pelanggan where beli_cash.kd_cust=pelanggan.kd_cust ORDER BY kd_cash ASC LIMIT $posisi,$batas") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
  <tr>
    <td width="28" align="center"><?php echo $no++; ?></td>
    <td width="88"><?php echo "$hasil[tgl]"; ?></td>
    <td width="61"><?php echo "$hasil[nama]"; ?></td>
    <td width="79">Rp.&nbsp;<?php echo "$hasil[total_bayar]"; ?>,-</td>
    <td width="68"><?php echo "$hasil[ket]"; ?></td>
    <td align="center">
	<a href="?page=delcash.html&kd_cash=<?php echo "$hasil[kd_cash]"; ?>" onclick="return confirm('Apakah anda akan menhapus data  <?php echo "$hasil[nama]"; ?>? ') " title="Hapus"><img src="image/comment_delete-128.png" width="16" /></a></td>
  </tr>
  <? } ?>
</table>
</div>
</form>
<div class="paging">
<?
$tampil=mysql_query("SELECT * FROM beli_cash ") or die ("Permintaan Gagal");
$jum_data=mysql_num_rows($tampil);
$jum_hal=ceil($jum_data/$batas);

echo"<br><b>Halaman:</b>&nbsp;";
for($i=1;$i<=$jum_hal;$i++)
if($i != $halaman)
{
echo" <a style=text-decoration:none; href=?page=cash.html&halaman=$i>$i</a>&nbsp;";
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
