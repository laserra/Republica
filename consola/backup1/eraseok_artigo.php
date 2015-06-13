<?php
session_cache_expire(30);
$cache_expire = session_cache_expire();

session_start();
if(!session_is_registered('user')) :
header('Location: index.php?msg=0');
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<title>Untitled Document</title>
<link href="estilos2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(body.jpg);
}
-->
</style></head>
<body>
<p>&nbsp;</p>
<hr>
<?php 
	include 'conndb.php';
?>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<?php
	$id=$_REQUEST['id'];
	
	$sql="DELETE FROM artigo WHERE idartigo='".$id."'";
	
	$result=mysql_db_query("republic_republica",$sql);
	
	//$registo=mysql_fetch_row($result);
	
	if($result){
		print('O artigo foi eliminado com sucesso.<br><form id="form2" name="form2" method="post" action="list_artigos.php">
			  <label>
			  <div align="center">
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');
	} else {
		print('Ocorreu um erro a apagar este artigo. Verifique a lista e tente de novo.<br><form id="form2" name="form2" method="post" action="list_artigos.php">
			  <label>
			  <div align="center">
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');

	}
	
	mysql_close();
?>
</body>
</html>
