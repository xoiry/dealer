<?php
include"config/connect.php";

    if (isset($_POST['kd_cash'])) {
	    $kd_cash=$_POST['kd_cash'];
		$query=mysql_query("SELECT * FROM beli_cash WHERE kd_cash='$kd_cash'") or die ("gagal");
		$hasil=mysql_fetch_array($query);
		$nomor=$hasil['kd_cash'];
		   if ($kd_cash==$nomor) {
			  $msg1="<span style=color:red>Coba nomor lain...!</span>";
			  $det_cash="";
		   } else {
			  $msg1="<span style=color:green>Ok...Lanjutkan</span>";
			  $det_cash=$kd_cash;
		   }
	} else {
	   $msg1="( * Isi bebas sesuai keinginan )";
	}
	



//Menyimpan ke detail cash

   if (isset($_POST['in_detail']))
    {
        $kd_motor=$_POST['kd_motor'];
		$query=mysql_query("SELECT * FROM motor WHERE kd_motor='$_POST[kd_motor]'") or die(" ra iso" );
		$data=mysql_fetch_array($query);
		$harga=$data['harga'];
	    $jumlah=$_POST['jumlah'];
		$sub_total=$harga*$jumlah;
       mysql_query("INSERT INTO det_cash VALUES('','$_POST[kd_cash]','$_POST[kd_motor]','$jumlah','$sub_total')") or die ("gagal");
	}
	
	$cek=mysql_query("SELECT sum(sub_total) FROM det_cash WHERE kd_cash='$_POST[kd_cash]'");
    $detail=mysql_fetch_array($cek);
    $total_harga=$detail['sum(sub_total)'];
    $total_harga_string=str_replace(",",".",number_format($total_harga));	
	
 if (isset($_POST['delete'])) {
	  $id=$_POST['id'];
	  $query=mysql_query("DELETE FROM det_cash WHERE kd_det='$id'");
	  $cek=mysql_query("SELECT sum(sub_total) FROM det_cash WHERE kd_cash='$_POST[kd_cash]'");
      $detail=mysql_fetch_array($cek);
      $total_harga=$detail['sum(sub_total)'];
      $total_harga_string=str_replace(",",".",number_format($total_harga));
	}	


if (isset($_POST['bayar'])) {
	    $bayar=$_POST['bayar'];
		$kembali=$bayar-$total_harga;
		$kembali_string=str_replace(",",".",number_format($kembali));
	}	
	
	
if (isset($_POST['simpan_beli'])) 
{
     $kd_cash=$_POST['kd_cash'];
	 $tgl=$_POST['tgl'];
	 $kd_cust=$_POST['kd_cust'];
	 
	   if ($kd_cash=='' || $tgl =='' || $kd_cust=='' ) 
	   {
	       include "msg1.html";  echo"Untuk membatalkan proses...<a href=?page=cash.html>klik disini</a>";
	   } 
	   else 
	   {
	    $query=mysql_query("INSERT INTO beli_cash VALUES
			   ('$kd_cash','$tgl','$kd_cust','$total_harga_string','Lunas')");
		  if ($query) 
		  {
		     include "msg2.html"; echo"Untuk melihat data...<a href=?page=cash.html>klik disini</a>";
		  } 

	   }
}	
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>INPUT MMOTOR</title>

<? include"style/style1.html"; ?>
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>

  <table width="817" height="269" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td height="105" colspan="2">
	<form  method="post" action="<?php $_SERVER['PHP_SELF'];?>" >
	<table width="438" border="0" cellspacing="1" cellpadding="1">
      
      <tr>
        <th colspan="3">PENDAFTARAN BELI CASH </th>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td width="136">Kode</td>
        <td colspan="2"><input name="kd_cash" type="text" size="15" onchange="this.form.submit();" value="<? echo $det_cash;?>" style="font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif" />
          <? echo $msg1;?></td>
        </tr>
      <tr>
        <td>Tanggal</td>
        <td colspan="2"><input id="date11"  type="text" name="tgl" size="20" value="<?php echo "$_POST[tgl]"; ?>" /></td>
        </tr>
      <tr>
        <td>Nama Pelanggan </td>
        <td width="85">
		<select name="kd_cust"  onChange="this.form.submit(); ">
		<option value="" selected="selected">--Pilih--</option>
            <?php
		   include"config/connect.php";
		   $minta = "SELECT*FROM pelanggan ORDER BY kd_cust";
		   $eksekusi  = mysql_query($minta);
		   while($hasil=mysql_fetch_array($eksekusi))
		   { ?>
        <option value="<? echo"$hasil[kd_cust]"; ?>" <? if ($hasil['kd_cust']==$_POST['kd_cust']) { echo"selected=selected";}?> ><? echo"$hasil[nama]"; ?> </option>
		
		<?
		   }
		 ?>
        </select></td>
        <td width="205"><div class="link"><a href="?page=inpel.html&view=insert" target="_blank">Pelanggan baru</a></div></td>
      </tr>
      <tr>
        <td colspan="3" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">&nbsp;</td>
      </tr>
    </table>
	</form><br />	</td>
    </tr>
	
	
 <tr>
    <th colspan="2">KERANJANG PEMBELIAN </th>
 </tr>	
 
 
  <tr>
    <td width="275" rowspan="6">
	
	
	  <form name="form2" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
	    <input type="hidden" name="kd_cash" value="<? echo $_POST['kd_cash'];?>">
	  <input type="hidden" name="tgl" value="<? echo $_POST['tgl'];?>">
	  <input type="hidden" name="kd_cust" value="<? echo $_POST['kd_cust'];?>">

	  <table width="275" border="0" cellspacing="1" cellpadding="1">
      
      <tr>
        <th colspan="2">TENTUKAN JUMLAH MOTOR YANG DI BELI</th>
        </tr>
      <tr>
        <td width="95">Merk motor </td>
        <td width="171">	   
		  <select name="kd_motor">
	      <option id="date11" value="" selected="selected">--Pilih--</option>
	       <?php
	       $query=mysql_query("SELECT * FROM motor");
		   while ($data=mysql_fetch_array($query)) {
		        echo"<option value=$data[kd_motor]>$data[merk]</option>";
		   }
	       ?>
	     </select></td>
      </tr>
      <tr>
        <td>Jumlah beli </td>
        <td><input type="text" name="jumlah" size="8" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="in_detail" value="Tambahkan ke daftar >>" /></td>
        </tr>
    </table>
    </form>	</td>
    <td height="62" align="right"><div id="report">
      <table width="432" border="0" cellspacing="1" cellpadding="1">
        <tr align="center">
          <th>No. </th>
          <th>Merk motor </th>
          <th>Jumlah beli </th>
          <th>Harga motor </th>
          <th>Sub total </th>
          <th align="center" width="43">Pilihan</th>
        </tr>
	 <?php
	  $order="SELECT det_cash.*,motor.merk,motor.harga FROM det_cash,motor WHERE kd_cash='$kd_cash' and
	          det_cash.kd_motor=motor.kd_motor";
	  $query=mysql_query($order) or die ("gagal");
	  $no='1';
	  
	   while ($data=mysql_fetch_array($query)) {
	    $kd_det=$data['kd_det'];
	    $merk=$data['merk'];
		$jumlah_beli=$data['jumlah'];
		$harga=$data['harga'];
		$harga_string=str_replace(",",".",number_format($harga));
		$subtotal=$data['sub_total'];
		$subtotal_string=str_replace(",",".",number_format($subtotal));
		?>
		
        <tr>
          <td width="28" align="center"><?php echo $no++; ?></td>
          <td width="70"><?php echo $merk; ?></td>
          <td width="64"><?php echo "$jumlah_beli"; ?></td>
          <td width="87">Rp <?php echo "$harga_string,-"; ?> </td>
          <td width="119">Rp <?php echo $subtotal_string; ?>,-</td>
          <td align="center">
		  
		  <form action="<? $_SERVER['../PHP_SELF'];?>" method="post">
		<!-Penyimpan data sementara->
	    <input type="hidden" name="kd_cash" value="<? echo $_POST['kd_cash'];?>">
	    <input type="hidden" name="tgl" value="<? echo $_POST['tgl'];?>">
	    <input type="hidden" name="kd_cust" value="<? echo $_POST['kd_cust'];?>">
	    <input type="hidden" name="id" value="<? echo "$kd_det";?>" />
	    <input type="submit" name="delete" value="X" id="delete" style="margin:0px 0px 0px 10px; padding:0px; font-size:11px; font-weight:bold; color:red; background:transparent; cursor:pointer; border:1px solid transparent" title="Hapus" />
		</form>		  </td>
        </tr>
        <? } ?>
      </table>
    </div></td>
  </tr>
  <tr>
    <td align="right"><b>Total Harga :<font color="blue"> Rp <? echo $total_harga_string;?> ,-</font></b></td>
  </tr>
  <tr>
    <td  align="right">
	
	
	    <form action="" name="bayar" method="post">
		<!-Penyimpan data sementara->
	    <input type="hidden" name="kd_cash" value="<? echo $_POST['kd_cash'];?>">
	    <input type="hidden" name="tgl" value="<? echo $_POST['tgl'];?>">
	    <input type="hidden" name="kd_cust" value="<? echo $_POST['kd_cust'];?>">
		<input type="hidden" name="total_bayar" value="<? echo $total_harga ;?>">
	
	<table width="322" style="margin-bottom:10px">
      <tr>
        <td> <span class="style1">Bayar</span>
          <input name="bayar" type="text" size="10" id="bayar" value="<? echo $_POST['bayar'];?>" onchange="this.form.submit();" />
          *(6000000 Bukan Rp. 6.000.000 </td>
		 </tr>
    </table>
	  </form>	</td>
  </tr>
  <tr>
    <td align="right"><b>Kembali :<font color="blue"> Rp <? echo"$kembali_string,-";?></font> </b></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="535" align="right">
	<form name="simpan_resep" id="simpan_resep" method="post" action="">
	  <input type="hidden" name="kd_cash" value="<? echo $_POST['kd_cash'];?>">
	  <input type="hidden" name="tgl" value="<? echo $_POST['tgl'];?>">
	  <input type="hidden" name="kd_cust" value="<? echo $_POST['kd_cust'];?>">
	  <input type="submit" name="simpan_beli" value="Simpan Pembelian">
	   <input type="reset" name="reset" value="Pembelian  Baru">
	</form>	</td>
  </tr>
</table>
</body>
</html>





