<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<title></title>
<link href="estilos2.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	/* background-image: url(body.jpg); */
	text-align: center;
}
-->
</style></head>
<body>
<?php
$login=$_GET['msg'];
// check for valid user
if(session_is_registered('user')){
	header("Location:opcoes.php");
} else{
	if($login==0){
		echo("<p class='topico'>Necessita de introduzir a sua identificação!</p>");
	}
print('<form id="form1" name="form1" method="post" action="user_login.php">
<table width="100" border="0" cellpadding="4" align="center">
<tr>
<td class="texto"><strong>Utilizador:</strong></td>
<td><label>
<input type="text" name="login" id="login" />
</label></td>
</tr>
<tr>
<td class="texto"><strong>Password:</strong></td>
<td><label>
<input type="password" name="pass" id="pass" />
</label></td>
</tr>
</table>
<p>
<input type="submit" name="button" id="button" value="Apagar" />
<input type="submit" name="button2" id="button2" value="Entrar" />
</p>
</form>');
}
?> 
</body>
</html>