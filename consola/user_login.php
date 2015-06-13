<?php
	session_start();
	include 'conndb.php';
	
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	
	$sql="SELECT * FROM user WHERE login='".$login."' AND pass='".$pass."'";
	$resultado=mysql_db_query('republic_republica',$sql);
	
	$valores=mysql_fetch_row($resultado);
	
	if($login==$valores[1] && $pass==$valores[2]){
		$_SESSION['user']=$user;
		header("Location:opcoes.php");
	}else{
		header("Location:index.php?msg=0");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<title>República - Administração - User Login</title>
</head>
<body>
</body>
</html>