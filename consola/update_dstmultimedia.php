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
<p class="navegacao">&nbsp;</p>
<hr />
<?php 
	include 'conndb.php';
?>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<?php
		$id=$_REQUEST['destaque'];
		
			
	//GRAVAÇÃO DOS DADOS DO FORMULÁRIO
	
		$sql1="UPDATE destaque_multimedia SET valor='$id' WHERE iddestaque=1";
	
	$resultado=mysql_db_query('republic_republica',$sql1);
	if($resultado){
		print('<p class="navegacao">O destaque multimédia foi actualizado com sucesso.</p><br><form id="form2" name="form2" method="post" action="index.php">
			  <label>
			  <div align="center">
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');
	} else {
		print('<p class="navegacao">Ocorreu um erro a actualizar o destaque multimédia. Por favor tente de novo.</p><br><form id="form2" name="form2" method="post" action="edit_dstmultimedia.php">
			  <label>
			  <div align="center">
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