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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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

		$nome=$_POST['titulo'];
		$lead=$_POST['lead'];
		$texto=$_POST['texto'];
		$autor=$_POST['autor'];
		$link=$_POST['link'];
		$xml=$_POST['xml'];
		
		//$id_artigo=$_POST['next_artigo'];
			
	//GRAVAÇÃO DOS DADOS DO FORMULÁRIO
	
$sql=" INSERT INTO breves( nome, lead, texto, link, autor, xml) VALUES ('$nome', '$lead', '$texto', '$link', '$autor', '$xml') ";
	
	$resultado=mysql_db_query('republic_republica',$sql);
	
	if($resultado){
		print('<form id="form2" name="form2" method="post" action="list_noticias.php">
			  <label>
			  <div align="center">
			  	<strong>O artigo foi inserido com sucesso!</strong><p>
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');
	} else {
		print('<form id="form2" name="form2" method="post" action="list_noticias.php">
			  <label>
			  <div align="center">
			  	Ocorreu um erro a inserir este artigo. Verifique a lista e tente de novo.<p>
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');

	}
	
	//mysql_free_result($resultado);
	mysql_close();
?>
</body>
</html>
