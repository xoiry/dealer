
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="image/honda_logo_red.png" type="image/x-icon" />
<title>Admin</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<div align="center">
<body id="layout">
  <div id="body">
   <div id="header2"></div>
   <div id="login">
<table width="498" border="0" align="center">
  <tr>
    <td width="277" align="center"> <span style="color:red"><?php echo $_GET['warn']; ?></span>
</td>
  </tr>
</table>

   
<form action="cek_login.php?op=in" name="login" method="post">
<br />

<table width="341"  border="0" cellspacing="1" cellpadding="1" >
   <tr>
     <th colspan="3">FORM LOGIN </th>
    </tr>
   <tr>
     <td width="126">&nbsp;</td>
     <td colspan="2">&nbsp;</td>
    </tr>
   <tr>
     <td  rowspan="5"><img src="image/icon_admin.png" width="108" height="108" /></td>
     <td width="72"><strong>Username</strong></td>
     <td width="131"><input name="username" type="text" id="username"  size="15"   /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><strong>Password</strong> </td>
     <td><input name="password" type="password" id="password" size="15" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="image" src="image/bg_log.jpg" name="masuk" /></td>
   </tr>
   <tr>
     <td height="38" colspan="2" align="center">&nbsp;</td>
   </tr>
 </table>
</form>
<br />
 <div id="footer" align="center"><font color="#FFFFFF" style="font-size:11px;" >Copyright (c) 2012 UKK SMK MUH SEYEGAN Created by: M. Khairi A.M </font></div>
</body>
</div>
</html>