
<?
//cek data angsuran
include "config/connect.php"; 
$order=mysql_query("SELECT * FROM bayar_cicil where kd_kredit='$_POST[kd_kredit]' ") or die ("Permintaan Gagal");
$hasil=mysql_fetch_array($order);
$cicilan=$hasil['jml_cicil'];
$cek=mysql_num_rows($order);
if($cek =='')
{ $msg="<span style=color:red>Belum ada daftar pembayaran...!</span>"; }
else
{ $msg="" ;}

$ambil=mysql_query("SELECT * FROM beli_kredit where kd_kredit='$_POST[kd_kredit]' ") or die ("Permintaan Gagal");
$data=mysql_fetch_array($ambil);
$lama_cicil=$data['lama_cicil'];

if(isset($_POST['hapus']))
{
include_once "config/connect.php";
mysql_query("DELETE FROM bayar_cicil WHERE kd_kredit='$_POST[kd_kredit]'") or die ("gagal");
mysql_query("DELETE FROM beli_kredit WHERE kd_kredit='$_POST[kd_kredit]'") or die ("gagal");
}


$cek=mysql_query("SELECT sum(jml_cicil) FROM bayar_cicil WHERE  kd_kredit='$_POST[kd_kredit]'");
$detail=mysql_fetch_array($cek);
$total=$detail['sum(jml_cicil)'];
$jumlah=$cicilan*$lama_cicil;
$sisa=$jumlah-$total;

if ($total==0)
{$msg2="-";}
 else if($total >=$jumlah)
{$msg2="<span style=color:blue>Lunas</span>";}
else 
{$msg2="<span style=color:red>Belum lunas</span>";}





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OLAH DATA PELANGGAN</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<strong> OLAH DATA PEMBELIAN KREDIT </strong></td>
<hr style="border:solid 1px; border-style:dotted;" width="950" align="left" />
<div class="link">
<table width="888" border="0">
  <tr>
    <td width="108"><a href="?page=inkredit.html" title="Tambah Data"><img src="image/add.png" width="16" />&nbsp;Tambah Data</a></td>
    <td width="10" align="center">|</td>
    <td width="126"><a href="?page=incicil.html" title="Bayar Angsuran"><img src="image/cash.jpg" width="25" />&nbsp;Bayar angsuran </a></td>
	<td width="10" align="center">|</td>
	<td width="213"><a href="print.php?print=kredit" target="_blank" title="Laporan"><img src="image/print_64.png" width="16" />&nbsp;Cetak Laporan pembelian kredit </a></td>
	<td width="10" align="center">|</td>
	<td width="381"><a href="print.php?print=angsuran " target="_blank" title="Laporan"><img src="image/print_64.png" width="16" />&nbsp;Cetak Laporan Angsuran </a></td>
  </tr>
</table>
</div>
<div id="report">
  <table width="939" border="0" cellspacing="1" cellpadding="1">
    <tr align="center">
      <th>No. </th>
      <th>Tanggal </th>
      <th>Pelanggan</th>
      <th>Merk Motor </th>
      <th>Harga motor </th>
      <th>Lama Cicil </th>
      <th>Uang muka </th>
      <th>Bunga</th>
      <th>Cicilan</th>
      <th>Ket.</th>
      <th align="center" width="43">Pilihan</th>
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
   $eksekusi=mysql_query("SELECT beli_kredit.*,pelanggan.*,motor.* FROM beli_kredit,pelanggan,motor where beli_kredit.kd_cust=pelanggan.kd_cust AND beli_kredit.kd_motor=motor.kd_motor ORDER BY kd_kredit ASC LIMIT $posisi,$batas") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
    <tr>
      <td width="39" align="center"><?php echo $no++; ?></td>
      <td width="67"><?php echo "$hasil[tgl]"; ?></td>
      <td width="72"><?php echo "$hasil[nama]"; ?></td>
      <td width="97"><?php echo "$hasil[merk]"; ?></td>
	  
	   <? 
	  $hrg=$hasil['harga'];
	  $harga=str_replace(",",".",number_format($hrg));
      ?>
      <td width="95">Rp.&nbsp;<?php echo "$harga,-"; ?></td>
      <td width="69"><?php echo "$hasil[lama_cicil]"; ?>&nbsp;X</td>
      <? 
	  $uang=$hasil['uang_muka'];
	  $dp=str_replace(",",".",number_format($uang));
      ?>
      <td width="87">Rp.&nbsp;<?php echo "$dp,-"; ?></td>
      <td width="51"><?php echo "$hasil[bunga]"; ?>&nbsp;%</td>
      <? 
	$cicil=$hasil['cicilan'];
	$cicilan=str_replace(",",".",number_format($cicil));
    ?>
      <td width="136">Rp.&nbsp;<?php echo "$cicilan,-"; ?>&nbsp;/ Bulan</td>
      <td width="145"><?php echo "$hasil[keterangan]"; ?></td>
      <td align="center"> <a href="?page=delkredit.html&kd_kredit=<?php echo "$hasil[kd_kredit]"; ?>" onclick="return confirm('Apakah anda akan menhapus <?php echo "$hasil[nama]"; ?>? ') " title="Hapus"><img src="image/comment_delete-128.png" width="16" /></a></td>
    </tr>
    <? } ?>
  </table>
</div>
<div class="paging">
<?
$tampil=mysql_query("SELECT * FROM beli_kredit ") or die ("Permintaan Gagal");
$jum_data=mysql_num_rows($tampil);
$jum_hal=ceil($jum_data/$batas);

echo"<br><b>Halaman:</b>&nbsp;";
for($i=1;$i<=$jum_hal;$i++)
if($i != $halaman)
{
echo" <a  href=?page=kredit.html&halaman=$i>$i</a>&nbsp;";
}
else
{
echo"<b>$i</b>";
}

?>

</div>
<br/>
<div id="report">
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <table width="782" border="0" cellspacing="1" cellpadding="1">
  <tr>
      <td colspan="6" style="background:transparent; "><b>DATA ANGSURAN PEMBELIAN KREDIT</b></td>
      </tr>
    <tr >
      <td colspan="3" style="background:transparent; ">Tampilkan berdasarkan nama pelanggan
        <select name="kd_kredit" onchange="this.form.submit();" >
          <option value="" selected="selected">--Pilih--</option>
          <?php
		   include"config/connect.php";
		   $minta = "SELECT pelanggan.*,beli_kredit.* FROM pelanggan,beli_kredit WHERE pelanggan.kd_cust=beli_kredit.kd_cust ";
		   $eksekusi  = mysql_query($minta);
		   while($hasil=mysql_fetch_array($eksekusi))
		   {?>
          <option value="<? echo"$hasil[kd_kredit]";?>" <? if ($hasil['kd_kredit']==$_POST['kd_kredit']) { echo"selected=selected";}?> ?kd_kredit="<? echo $hasil[kd_kredit] ;?>"><? echo"$hasil[nama]"; ?> </option>
          <? 
		   }
		   ?>
        </select></td>
      <td style="background:transparent; "><div class="link"><a href="print.php?print=angsur_detail&kd_kredit=<? echo "$_POST[kd_kredit]" ;?> " target="_blank" title="Laporan"><img src="image/print_64.png" width="16" />&nbsp;Cetak Laporan </a></div></td>
      <td colspan="2" style="background:transparent; "><? echo"$msg"; ?></td>
      </tr>
    <tr align="center">
      <th>No.</th>
      <th>No. Bayar </th>
      <th width="172">Tanggal </th>
      <th width="108">Angsuran ke </th>
      <th>Cicilan</th>
      <th width="211">Keterangan</th>
      </tr>
    <?
   include "config/connect.php";
   $no='1'; 
   $eksekusi=mysql_query("SELECT * FROM bayar_cicil where kd_kredit='$_POST[kd_kredit]' ") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
    <tr align="center">
      <td width="26" ><?php echo $no++; ?></td>
      <td width="88"><?php echo "$hasil[no_bayar]"; ?></td>
      <td><?php echo "$hasil[tgl]"; ?></td>
      <td><?php echo "$hasil[angsuranke]"; ?></td>
      <? 
	  $hrg=$hasil['jml_cicil'];
	  $harga=str_replace(",",".",number_format($hrg));
      ?>
      <td width="156">Rp.&nbsp;<?php echo "$harga,-"; ?></td>
      <td>Pembayaran ke&nbsp;<font color="#0033FF"><?php echo $hasil['ket.']; ?></font>&nbsp;telah dibayar</td>
      <? 
	  $uang=$hasil['uang_muka'];
	  $dp=str_replace(",",".",number_format($uang));
      ?>
      <? 
	$cicil=$hasil['cicilan'];
	$cicilan=str_replace(",",".",number_format($cicil));
    ?>
    </tr>
	<? } ?>
    <tr>
      <td colspan="3" style="background:transparent;"><b>Jumlah yang harus terbayar : Rp.<font color="#0000FF"><?php echo str_replace(",",".",number_format($jumlah)); ?>,-</font></b></td>
      <td colspan="2" style="background:transparent;"><b>Sisa yang belum di bayar : Rp.<font color="#0000FF"><?php echo str_replace(",",".",number_format($sisa)); ?>,-</font></b></td>
      <td style="background:transparent;"><b>Status :<span style="background:transparent; "><? echo"$msg2"; ?></span></b></td>
    </tr>

    <tr>
      <td height="20" colspan="4" style="background:transparent;">*(Apabila pelanggan telah melunasi pembelian , data boleh di hapus &nbsp; <b>>>>>>></b> </td>
      <td style="background:transparent;">
	  <a href="?page=delkredit.html&kd_kredit=<?php echo "$_POST[kd_kredit]"; ?>" onclick="return confirm('Apakah anda akan menhapus data ini dari daftar ? ') " title="Hapus"><img src="image/hapus.png" /></a></td>
      <td style="background:transparent;">	  </td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>
