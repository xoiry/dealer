<style type="text/css">
body{
margin:auto;
padding:0px;
font-family:Calibri;
font-size:12px;
background: #1E5799; /* old browsers */
background: -moz-linear-gradient(top, #1E5799 0%, #1E5799 40%, #1477C9 100%, #2989D8 100%, #1477C9 100%, #7db9e8 100%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1E5799), color-stop(40%,#1E5799), color-stop(100%,#1477C9), color-stop(100%,#2989D8), color-stop(100%,#1477C9), color-stop(100%,#7db9e8)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1E5799', endColorstr='#7db9e8',GradientType=0 ); /* ie */
}
div{
width:21cm;
height:29.7cm;
margin:auto;
padding:0px;
background:#FFFFFF;
margin-top:20px;
box-shadow: 5px 5px 7px #222;
-moz-box-shadow: 5px 5px 7px #222;
-webkit-box-shadow: 5px 5px 7px #222
}
h1{
margin:10px 0px 5px 0px;
text-align:center
}
table
{
margin:auto;
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
td{
padding:0px 5px 0px 5px
}
th{
background:#A4A4A4;
padding:1px 5px 1px 5px
}
div img{
margin-top:20px
}
a img{
float:right;
border:0px;
width:25px;
margin:0px 10px auto auto
}
hr{
width:90%;
margin:0px auto 20px auto
}
</style>

<a href="#" onClick="window.print();" title="Cetak laporan"><img src="image/print.png"/></a>
<div>
<div style="text-align:center"><img src="image/11587_mm1279253998.jpg" >
<?php
include "config/connect.php";
include"fungsi_print.php"; 
 $print=$_GET['print'];
   if ($print=="motor") {
     echo"<h1>Laporan Data Motor Dealer Merdeka Tahun 2012</h1><hr/>";
	 show_print_motor();
   } else if ($print=="pelanggan") {
     echo"<h1>Laporan Data  Pelanggan Dealer Merdeka Tahun 2012</h1><hr/>";
	 show_print_pelanggan();
   } else if ($print=="cash") {
     echo"<h1>Laporan Data Pembelian Cash Dealer Merdeka Tahun 2012</h1><hr/>";
	 show_print_cash();
   } else if ($print=="kredit") {
     echo"<h1>Laporan Data Pembelian Motor Kredit Tahun 2012</h1><hr/>";
	 show_print_kredit();
   } else if ($print=="angsuran") {
     echo"<h1>Laporan Data Angsuran Pembelian Kredit Tahun 2011</h1><hr/>";
     show_print_angsuran();
   }else if ($print=="angsur_detail") {
     echo"<h1> Angsuran Pembelian Kredit Tahun 2011</h1><hr/>";
     show_print_angsur_detail();
   }
?>
</div>