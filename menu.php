<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
* {
	list-style:none;
}
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}

#basic-accordian{
	border:0px ;
	width:150px;
}

.accordion_headings{
	background:#99CC00;
	color:#FFFFFF;
	border:1px solid #FFF;
	cursor:pointer;
	font-weight:bold;
}

.accordion_headings:hover{
	background:#00CCFF;
}

.accordion_child{
background:url(image/konten_midle.png);
}

.header_highlight{
	background:#00CCFF;
}

</style>
<script type="text/javascript" src="style/accordian.pack.js""></script>
</head>
<body onload="new Accordian('basic-accordian',5,'header_highlight');">
<div id="basic-accordian" >
  <div id="test1-header" class="accordion_headings" >..:Main Menu:..</div> 
  <div id="test1-content">
    <div class="accordion_child"><? include"menu_isi.html";?> </div>    
  </div> 
</div>
</body>
</html>
