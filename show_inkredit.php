<?
include"config/connect.php";
if (isset($_POST['kd_kredit'])) 
{
$kd_kredit=$_POST['kd_kredit'];
$query=mysql_query("SELECT * FROM beli_kredit WHERE kd_kredit='$kd_kredit'") or die ("gagal");
$hasil=mysql_fetch_array($query);
$nomor=$hasil['kd_kredit'];
  if ($kd_kredit==$nomor) 
  {
	$msg1="<span style=color:red>Nomor sudah dipakai..!</span>";
	$kode="";
  } 
  else 
  {
  $msg1="<span style=color:green>Ok...Lanjutkan</span>";
  $kode=$kd_kredit;
  }
} 
else 
{
	   $msg1="( * Isi bebas sesuai keinginan )";
}

//Penghitungan
   include"config/connect.php";
   $query=mysql_query("SELECT * FROM motor WHERE kd_motor='$_POST[kd_motor]'") or die("gagal" );
   $data=mysql_fetch_array($query);
   $harga=$data['harga'];


   if($_POST['lama_cicil'] == 48)
   {
   $um=0.1*$harga;
   $sisa=$harga-$um;
   $cicil=$sisa/48;
   $bunga=4*0.3*$cicil;
   $bunga_string='30';
   $cicilan=$cicil+$bunga;
   }
   else if($_POST['lama_cicil'] == 36)
   {
   $um=0.1*$harga;
   $sisa=$harga-$um;
   $cicil=$sisa/36;
   $bunga=3*0.25*$cicil;
   $bunga_string='25';
   $cicilan=$cicil+$bunga;
   }
   else if($_POST['lama_cicil'] == 24)
   {
   $um=0.1*$harga;
   $sisa=$harga-$um;
   $cicil=$sisa/24;
   $bunga=2*0.2*$cicil;
   $bunga_string='20';
   $cicilan=$cicil+$bunga; 
   }
   else if($_POST['lama_cicil'] == 12)
   {
   $um=0.1*$harga;
   $sisa=$harga-$um;
   $cicil=$sisa/12;
   $bunga=1*0.1*$cicil;
   $bunga_string='10';
   $cicilan=$cicil+$bunga; 
   }
   else
   {
   $um='0';
   $bunga_string='0';
   $cicilan='0'; 
   }
   
if(isset($_POST['kd_motor']))
{$uang_muka=0.1*$harga;}
else
{$uang_muka='0';}   
   
if ($_POST['bayar']) {
	    $bayar=$_POST['bayar'];
		$kembali=$bayar-$uang_muka;
		$kembali_string=str_replace(",",".",number_format($kembali));
	}	


   
   $kd_kredit=$_POST['kd_kredit'];
   $tgl=$_POST['tgl'];
   $kd_cust=$_POST['kd_cust'];
   $kd_motor=$_POST['kd_motor'];
   $lama_cicil= $_POST['lama_cicil'];
   $ket=$_POST['ket'];
   
if($_POST['in_kredit'])
{
  if($_POST['kd_kredit']=='' || $_POST['tgl']=='') 
     { include "msg1.html";  }
     else
	 {
	   
      $query = mysql_query("INSERT INTO beli_kredit VALUES('$kd_kredit','$tgl','$kd_cust','$kd_motor','$lama_cicil','$um','$bunga_string','$cicilan','$ket')");
      if($query)
       { include "msg2.html"; echo"Penambahan data berhasil....<a href=?page=kredit.html> Lihat </a>"; }
	   
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
    <th colspan="3" bgcolor="#99CCFF"><b>INPUT DATA PEMBELIAN KREDIT </b></th>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="121">Kode kredit </td>
    <td colspan="2"><input name="kd_kredit" type="text" size="10" onChange="this.form.submit();" value="<? echo $kode;?>" style="font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif" />
      <? echo $msg1;?></td>
  </tr>
  <tr>
    <td>Tanggal kredit </td>
    <td colspan="2"><input id="date11"  type="text" name="tgl" size="20" value="<?php echo "$_POST[tgl]"; ?>" /></td>
  </tr>
  <tr>
    <td>Nama pelanggan </td>
    <td width="81"><select name="kd_cust">
      <option value="" selected="selected">--Pilih--</option>
      <?php
		   include"config/connect.php";
		   $minta = "SELECT*FROM pelanggan ORDER BY kd_cust";
		   $eksekusi  = mysql_query($minta);
		   while($hasil=mysql_fetch_array($eksekusi))
		   {?>
      <option value="<? echo"$hasil[kd_cust]";?>" <? if ($hasil['kd_cust']==$_POST['kd_cust']) { echo"selected=selected";}?>><? echo"$hasil[nama]"; ?> </option>
      "; 
		  
      <? 
		   }
		   ?>
    </select></td>
    <td width="182"><div class="link"><a href="?page=inpel.html" target="_blank">Pelanggan baru</a></div></td>
  </tr>
  <tr>
    <td>Merk motor </td>
    <td colspan="2">
	<select name="kd_motor" onChange="this.form.submit();">
	<option value="" selected="selected">--Pilih--</option>
        <?php
		   include"config/connect.php";
		   $minta = "SELECT*FROM motor ORDER BY kd_motor";
		   $eksekusi  = mysql_query($minta);
		   while($hasil=mysql_fetch_array($eksekusi))
		   {?>
     	  <option value="<? echo"$hasil[kd_motor]";?>" <? if ($hasil['kd_motor']==$_POST['kd_motor']) { echo"selected=selected";}?>><? echo"$hasil[merk]"; ?> </option>"; 
		  <? 
		   }
		   ?>
      </select></td>
  </tr>

  <tr>
    <td> Lama cicilan </td>
    <td colspan="2"><input type="radio" name="lama_cicil" value="12" <? if($_POST['lama_cicil']==12 ) { echo"checked=checked";}?> />
      12x
        <input type="radio" name="lama_cicil" value="24" <? if($_POST['lama_cicil']==24 ) { echo"checked=checked";}?> />
24x
<input type="radio" name="lama_cicil" value="36" <? if($_POST['lama_cicil']==36 ) { echo"checked=checked";}?> />
36x
<input type="radio" name="lama_cicil" value="48" <? if($_POST['lama_cicil']==48 ) { echo"checked=checked";}?> />
48x</td>
  </tr>
  
  <tr>
    <td >Keterangan</td>
    <td colspan="2" ><textarea  name="ket" cols="20" rows="4" ><? echo"$_POST[ket]"; ?></textarea></td>
  </tr>
  <tr>
    <td >Uang muka </td>
    <td colspan="2" ><b><font color="blue">Rp.&nbsp;<?  echo str_replace(",",".",number_format($uang_muka));?>,-</font></b> </td>
  </tr>
  <tr>
    <td >Bayar</td>
    <td colspan="2" ><input name="bayar" type="text" size="10" id="bayar" value="<? echo $_POST['bayar'];?>"  onChange="this.form.submit();"/>
*(6000000 Bukan Rp. 6.000.000 </td>
  </tr>
  <tr>
    <td >Kembali</td>
    <td colspan="2" ><b> <? echo" <font color=blue>Rp.$kembali_string,-</font>";?></b></td>
  </tr>
  <tr>
    <td colspan="3" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="in_kredit" value="Simpan" class="elipse" />
      <input name="button"  type="button" onClick="self.history.back()"  value="Kembali" class="elipse" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>





