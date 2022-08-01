<?php
//Fungsi_print.php

//Print motor
function show_print_motor() { ?>
<table width="398"  border="0" cellspacing="1" cellpadding="1">
  <tr align="center" >
    <th>No.  </th>
    <th>Merk Motor  </th>
    <th>warna</th>
    <th>Harga</th>
  </tr>
    <?
   include "config/connect.php";
   $no='1'; 
   $eksekusi=mysql_query("SELECT * FROM motor") or die ("Permintaan Gagal");
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
  </tr>
  <? } ?>
</table>

<?php }
//Print pelanggan
function show_print_pelanggan() { ?>
  <table width="645" border="0" cellspacing="1" cellpadding="1">
    <tr align="center">
      <th>No.</th>
      <th>Nama </th>
      <th>alamat</th>
      <th>Telp.</th>
      <th>HP</th>
      <th>No. KTP </th>
      <th>KK</th>
      <th>Slip. Gaji </th>
      <th>Ket.</th>
    </tr>
    <?
   include "config/connect.php";
   $no='1';
   $eksekusi=mysql_query("SELECT * FROM pelanggan") or die ("Permintaan Gagal");
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
    </tr>
    <? } ?>
  </table>
<?php }


//Print cash
function show_print_cash() { ?>
  <table width="523" border="0" cellspacing="1" cellpadding="1">
    <tr align="center">
      <th>No. </th>
      <th>Tanggal</th>
      <th>Pelanggan</th>
      <th>Total Bayar </th>
      <th>Ket.</th>
    </tr>
    <?
   include "config/connect.php";
   $no='1';
   $eksekusi=mysql_query("SELECT beli_cash.*,pelanggan.nama FROM beli_cash,pelanggan where beli_cash.kd_cust=pelanggan.kd_cust ORDER BY kd_cash ASC") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
    <tr>
      <td width="32" align="center"><?php echo $no++; ?></td>
      <td width="95"><?php echo "$hasil[tgl]"; ?></td>
      <td width="133"><?php echo "$hasil[nama]"; ?></td>
      <td width="152">Rp.&nbsp;<?php echo "$hasil[total_bayar]"; ?>,-</td>
      <td width="95"><?php echo "$hasil[ket]"; ?></td>
    </tr>
    <? } ?>
</table>
<?php }


//Print kredit
function show_print_kredit() { ?>
  <table width="767" border="0" cellspacing="1" cellpadding="1">
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
    </tr>
    <?
   include "config/connect.php";
   $no='1'; 
   $eksekusi=mysql_query("SELECT beli_kredit.*,pelanggan.*,motor.* FROM beli_kredit,pelanggan,motor where beli_kredit.kd_cust=pelanggan.kd_cust AND beli_kredit.kd_motor=motor.kd_motor ORDER BY kd_kredit ASC") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
    <tr>
      <td width="28" align="center"><?php echo $no++; ?></td>
      <td width="69"><?php echo "$hasil[tgl]"; ?></td>
      <td width="74"><?php echo "$hasil[nama]"; ?></td>
      <td width="113"><?php echo "$hasil[merk]"; ?></td>
      <? 
	  $hrg=$hasil['harga'];
	  $harga=str_replace(",",".",number_format($hrg));
      ?>
      <td width="94">Rp.&nbsp;<?php echo "$harga,-"; ?></td>
      <td width="50"><?php echo "$hasil[lama_cicil]"; ?>&nbsp;X</td>
      <? 
	  $uang=$hasil['uang_muka'];
	  $dp=str_replace(",",".",number_format($uang));
      ?>
      <td width="113">Rp.&nbsp;<?php echo "$dp,-"; ?></td>
      <td width="43"><?php echo "$hasil[bunga]"; ?>&nbsp;%</td>
      <? 
	$cicil=$hasil['cicilan'];
	$cicilan=str_replace(",",".",number_format($cicil));
    ?>
      <td width="155">Rp.&nbsp;<?php echo "$cicilan,-"; ?>&nbsp;/ Bulan</td>
    </tr>
    <? } ?>
</table>
<? }

//Print angsuran
function show_print_angsuran() { ?>
<table width="770" border="0" cellspacing="1" cellpadding="1">
  <tr>
      <td style="background:transparent; " colspan="8"><b>DATA ANGSURAN PEMBELIAN KREDIT</b> </td>
  </tr>
    <tr align="center">
      <th>No.</th>
      <th>No. Bayar </th>
      <th>Tanggal </th>
      <th>Pelanggan</th>
      <th>Lama cicil</th>
      <th>Angsuran ke </th>
      <th>Cicilan</th>
      <th width="177">Keterangan</th>
  </tr>
    <?
   include "config/connect.php";
   $no='1'; 
   $eksekusi=mysql_query("SELECT bayar_cicil.*,beli_kredit.*,pelanggan.* FROM bayar_cicil,beli_kredit,pelanggan where bayar_cicil.kd_kredit=beli_kredit.kd_kredit AND beli_kredit.kd_cust=pelanggan.kd_cust ORDER BY no_bayar ASC") or die ("Permintaan Gagal");
   while($hasil=mysql_fetch_array($eksekusi))
   {
  ?>
    <tr>
      <td width="32" align="center"><?php echo $no++; ?></td>
      <td width="62" align="center"><?php echo "$hasil[no_bayar]"; ?></td>
      <td width="87"><?php echo "$hasil[tgl]"; ?></td>
      <td width="82"><?php echo "$hasil[nama]"; ?></td>
      <td width="58"><?php echo "$hasil[lama_cicil]"; ?> X </td>
      <td width="68"><?php echo "$hasil[angsuranke]"; ?></td>
      <? 
	  $hrg=$hasil['jml_cicil'];
	  $harga=str_replace(",",".",number_format($hrg));
      ?>
      <td width="179">Rp.&nbsp;<?php echo "$harga,-"; ?>/ Bulan</td>
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

</table>
<? }

//Print angsuran detail
function show_print_angsur_detail() { ?>


<?
include "config/connect.php"; 
$order=mysql_query("SELECT * FROM bayar_cicil where kd_kredit='$_GET[kd_kredit]' ") or die ("Permintaan Gagal");
$hasil=mysql_fetch_array($order);
$cicilan=$hasil['jml_cicil'];
$cek=mysql_num_rows($order);
if($cek =='')
{ $msg="<span style=color:red>Silahkan pilih nama pelanggan terlebih dahulu...!</span>"; }
else
{ $msg="" ;}

$ambil=mysql_query("SELECT * FROM beli_kredit where kd_kredit='$_GET[kd_kredit]' ") or die ("Permintaan Gagal");
$data=mysql_fetch_array($ambil);
$lama_cicil=$data['lama_cicil'];

$cek=mysql_query("SELECT sum(jml_cicil) FROM bayar_cicil WHERE  kd_kredit='$_GET[kd_kredit]'");
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


  <table width="782" border="0" cellspacing="1" cellpadding="1">
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
   $eksekusi=mysql_query("SELECT * FROM bayar_cicil where kd_kredit='$_GET[kd_kredit]' ") or die ("Permintaan Gagal");
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
  </table>
<? } ?>


