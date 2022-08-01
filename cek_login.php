<?php
session_start();

$userid = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
include"config/connect.php";
   $query=mysql_query("SELECT * FROM user WHERE user='$userid' AND pass='$psw'");
   $cek=mysql_num_rows($query);
   $data=mysql_fetch_array($query);
   $user=$data['user'];
   $pass=$data['pass'];
   $level=$data['level'];
    if($cek=='1'){
        $_SESSION['userid'] = $user;
		$_SESSION['level']  = $level;
		   if ($level=='admin') {
            header("location:menu_utama.php");
			exit;
		   } else {
		    header("location:index_user.php");
			exit;
		   }
    }else{
        header("location:index.php?warn=Username atau password salah....");
    }
}else if($op=="out"){
    unset($_SESSION['userid']);
	unset($_SESSION['level']);
    header("location:index.php?warn=Anda telah keluar dari sistem admin....");
}
?>
