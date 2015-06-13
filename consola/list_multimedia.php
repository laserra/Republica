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
<title>Listar Artigos</title>
<link href="estilos2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(body.jpg);
}
-->
</style>
<link href="texto.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
	include 'conndb.php';
?>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<p><a href="opcoes.php"><img src="imagens/home.png" width="222" height="23" border="0" /></a> <a href="add_multimedia.php"><img src="imagens/add_multimedia.png" width="222" height="23" border="0" longdesc="add_multimedia.php" /></a></p>
<hr>
<p class="navegacao">Escolha a multimedia a alterar</p>
<table width="90%" border="0" cellpadding="4">
  <tr>
  	<!-- <td bgcolor="#9BB1BF" class="texto_white"><div align="center">ID</div></td> -->
    <td width="9%" bgcolor="#9BB1BF" class="texto_white"><div align="center">ID Multimedia</div></td>
    <td width="11%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Titulo</div></td>
    <td width="17%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Imagem</div></td>
    <td width="41%" bgcolor="#9BB1BF" class="texto_white"><div align="center">XML</div></td>
    <td width="6%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Editar</div></td>
    <td width="7%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Apagar</div></td>
  </tr>
  <?php
  	//Vai buscar todos os motores guardados na BD
  	$sql="SELECT idmultimedia, titulo, imagem, xml FROM multimedia ORDER BY idmultimedia DESC";
	
	$resultado=mysql_db_query("republic_republica",$sql);
	
	if($resultado){
		$linha=0;
		while($registo=mysql_fetch_array($resultado)){
			$linha++;
		    $id=$registo['idmultimedia'];
			
			$titulo=$registo['titulo'];
			$imagem=$registo['imagem'];
			$xml=$registo['xml'];
			
			if(($linha%2)==0){
				echo('<tr>
							<td bgcolor="#32CCFF" class="texto">'.$id.'</td>
							<td bgcolor="#32CCFF" class="texto">'.$titulo.'</td>
							<td bgcolor="#32CCFF" class="texto"><img src="http://www.republica2010.com/multimedia/'.$imagem.'"></td>
							<td bgcolor="#32CCFF" class="texto">'.$xml.'</td>
							
							<td bgcolor="#32CCFF" align=center><a href="edit_multimedia.php?id='.$id.'">
									<img src="imagens/edit_2.png" border=0></a></td>
									
							<td bgcolor="#32CCFF" align=center><a href="erase_multimedia.php?id='.$id.'">
									<img src="imagens/apagar.png" border=0></a></td>
					  </tr>');
				}else{
					echo('<tr>
							<td bgcolor="#E9C7C1" class="texto">'.$id.'</td>
							<td bgcolor="#E9C7C1" class="texto">'.$titulo.'</td>
							<td bgcolor="#E9C7C1" class="texto"><img src="http://www.republica2010.com/multimedia/'.$imagem.'"></td>
							<td bgcolor="#E9C7C1" class="texto">'.$xml.'</td>
							
							<td bgcolor="#E9C7C1" align=center>
								<a href="edit_multimedia.php?id='.$id.'"><img src="imagens/edit_2.png" border=0></a></td>
								
							<td bgcolor="#E9C7C1" align=center><a href="erase_multimedia.php?id='.$id.'">
								<img src="imagens/apagar.png" border=0></a></td>
					  </tr>');
					
				}
		}
		echo('</table>');
	} else {
		print("Não há registos");
	}
	mysql_close();
	
	
  ?>
</table>

</body>
</html>
