<?
include"config/connect.php";
if (isset($_POST['no_bayar'])) 
{
$no_bayar=$_POST['no_bayar'];
$query=mysql_query("SELECT * FROM bayar_cicil WHERE no_bayar='$no_bayar'") or die ("gagal");
$hasil=mysql_fetch_array($query);
$nomor=$hasil['no_bayar'];
  if ($no_bayar==$nomor) 
  {
	$msg1="<span style=color:red>Nomor sudah dipakai..!</span>";
	$kode="";
  } 
  else 
  {
  $msg1="<span style=color:green>Ok...Lanjutkan</span>";
  $kode=$no_bayar;
  }
} 
else 
{
	   $msg1="( * Isi bebas sesuai keinginan )";
}


$ambil=mysql_query("SELECT * FROM beli_kredit where kd_kredit='$_POST[kd_kredit]' ") or die ("Permintaan Gagal");
$data=mysql_fetch_array($ambil);
$lama_cicil=$data['lama_cicil'];
$cicilan=$data['cicilan'];

$cek=mysql_query("SELECT sum(jml_cicil) FROM bayar_cicil WHERE  kd_kredit='$_POST[kd_kredit]'");
$detail=mysql_fetch_array($cek);
$total=$detail['sum(jml_cicil)'];
$jumlah=$cicilan*$lama_cicil;

  if($_POST['kd_kredit'])
{
 if($total >= $jumlah)
   { include"msg4.html";}
   else
   {echo"";}
}


if ($_POST['bayar']) {
	    $bayar=$_POST['bayar'];
		$kembali=$bayar-$_POST['jml_cicil'];
		$kembali_string=str_replace(",",".",number_format($kembali));
	}



   
   $no_bayar=$_POST['no_bayar'];
   $tgl=$_POST['tgl'];
   $kd_kredit=$_POST['kd_kredit'];
   $angsuran_ke=$_POST['angsuran_ke'];
   $ket=$_POST['angsuran_ke'];
   
if($_POST['in_cicil'])
{

 

  if($_POST['no_bayar']=='' || $_POST['tgl']=='') 
     { include "msg1.html";  }
     else
	 {
	   
      $query = mysql_query("INSERT INTO bayar_cicil VALUES('$no_bayar','$tgl','$kd_kredit','$angsuran_ke','$_POST[jml_cicil]','$ket')");
      if($query)
       { include "msg2.html"; echo"Untuk melihat data...<a href=?page=kredit.html> Klik disini </a>"; }
	   
     }
}	 
?>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>INPUT MOTOR</title>
<? include"style/style1.html"; ?>
</head>

<body>
<form method="POST" action="<? $_SERVER['PHP_SELF'];?>" >
<table width="400">
  <tr>
    <th colspan="2" bgcolor="#99CCFF"><b>BAYAR ANGSURAN </b></th>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="121">No. Bayar </td>
    <td><input name="no_bayar" type="text" size="10" onChange="this.form.submit();" value="<? echo $kode;?>" style="font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif" />
      <? echo $msg1;?></td>
    </tr>
  <tr>
    <td>Tanggal angsur </td>
    <td><input id="date11"  type="text" name="tgl" size="20" value="<?php echo "$_POST[tgl]"; ?>" /></td>
    </tr>
  <tr>
    <td>Nama Kreditur </td>
    <td>
	<select name="kd_kredit" onChange="this.form.submit();" >
	<option value="" selected="selected">--Pilih--</option>
      <?php
		   include"config/connect.php";
		   $minta = "SELECT beli_kredit.*,pelanggan.* FROM beli_kredit,pelanggan WHERE beli_kredit.kd_cust=pelanggan.kd_cust ";
		   $eksekusi  = mysql_query($minta);
		   while($hasil=mysql_fetch_array($eksekusi))
		   {?>
     	  <option name="kd_kredit" value="<? echo"$hasil[kd_kredit]";?>" <? if ($hasil['kd_kredit']==$_POST['kd_kredit']) { echo"selected=selected";}?> >  <? echo "$hasil[nama]"; ?> </option>
		  <?
		   }
		   ?>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>

	<?
	include"config/connect.php";
	$query=mysql_query("SELECT * FROM bayar_cicil WHERE kd_kredit='$kd_kredit'") or die ("gagal");
	$angsuran=mysql_num_rows($query);
	$angsuran_string=$angsuran+1;
	?>

	
	
	<td> Angsuran ke :<? echo"<b><font color=blue >$angsuran_string<font></b>"; ?> 
	<input type="hidden" name="angsuran_ke" value="<? echo"$angsuran_string";?>"> </td>
    </tr>

  <tr>
    <td>Cicilan yg di bayar </td>
    <td>
	      <?php
		   include"config/connect.php";
		   $minta = "SELECT * FROM beli_kredit WHERE kd_kredit='$_POST[kd_kredit]' ";
		   $eksekusi  = mysql_query($minta);
		   $hasil=mysql_fetch_array($eksekusi);
		   {?>
	      <input  type="text" size="10" disabled="disabled" value="Rp.<?php echo str_replace(",",".",number_format($hasil[cicilan])); ?>,-" />
     	 <input type="hidden" name="jml_cicil" value="<? echo"$hasil[cicilan]"; ?>" >
		  <?
		   }
		   ?>	</td>
    </tr>
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    </tr>
  <tr>
    <td >Bayar</td>
    <td ><input name="bayar" type="text" size="10" id="bayar" value="<? echo $_POST['bayar'];?>" onChange="this.form.submit();"/>
*(6000000 Bukan Rp. 6.000.000 </td>
  </tr>
  <tr>
    <td >Kembali</td>
    <td ><b> <? echo" <font color=blue>Rp.$kembali_string,-</font>";?></b></td>
    </tr>
  <tr>
    <td colspan="2" >*( Berilah tanda (-) bila tidak diisi </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="in_cicil" value="Simpan " class="elipse" />
      <input name="button"  type="button" onClick="self.history.back()"  value="Kembali" class="elipse"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>





