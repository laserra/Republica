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
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administra��o</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<p><a href="opcoes.php"><img src="imagens/home.png" width="222" height="23" border="0" /></a> <a href="add_artigo.php"><img src="imagens/add_artigos.png" width="222" height="23" border="0" longdesc="add_artigo.php" /></a></p>
<hr>
<p class="navegacao">Escolha o artigo a alterar</p>
<table width="90%" border="0" cellpadding="4">
  <tr>
  	<!-- <td bgcolor="#9BB1BF" class="texto_white"><div align="center">ID</div></td> -->
    <td width="9%" bgcolor="#9BB1BF" class="texto_white"><div align="center">ID Artigo</div></td>
    <td width="9%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Sec��o</div></td>
    <td width="11%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Titulo</div></td>
    <td width="17%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Lead</div></td>
    <td width="41%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Texto</div></td>
    <td width="6%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Editar</div></td>
    <td width="7%" bgcolor="#9BB1BF" class="texto_white"><div align="center">Apagar</div></td>
  </tr>
  <?php
  	//Vai buscar todos os motores guardados na BD
  	$sql="SELECT idartigo, idseccao, titulo, lead, texto FROM artigo ORDER BY idartigo DESC";
	
	$resultado=mysql_db_query("republic_republica",$sql);
	
	if($resultado){
		$linha=0;
		while($registo=mysql_fetch_array($resultado)){
			$linha++;
		    $id=$registo['idartigo'];
			
			//Vai buscar o indice correspondente ao numero de cilindros de um motor
			$sql_nomeSec="SELECT nome FROM seccao WHERE idseccao=".$registo['idseccao'];
			$query_nomeSec=mysql_db_query("republic_republica",$sql_nomeSec);
			$valor_nomeSec=mysql_fetch_row($query_nomeSec);
			
			//Busca a descri��o dos cilindros consoante o indice guardado na tabela dos motores
			//$sql_cilindros="SELECT descr FROM tb_cilindros WHERE id='".$valor_indice[0]."'";
			//$valor=mysql_db_query("motofao_suzuki",$sql_cilindros);
			//$descr=mysql_fetch_row($valor);
			
			$seccao=$valor_nomeSec[0];
			$titulo=$registo['titulo'];
			$lead=$registo['lead'];
			$texto=$registo['texto'];
			
			if(($linha%2)==0){
				echo('<tr>
							<td bgcolor="#32CCFF" class="texto">'.$id.'</td>
							<td bgcolor="#32CCFF" class="texto">'.$seccao.'</td>
							<td bgcolor="#32CCFF" class="texto">'.$titulo.'</td>
							<td bgcolor="#32CCFF" class="texto">'.$lead.'</td>
							<td bgcolor="#32CCFF" class="texto">'.$texto.'</td>
							
							<td bgcolor="#32CCFF" align=center><a href="edit_artigo.php?id='.$id.'">
									<img src="imagens/edit_2.png" border=0></a></td>
									
							<td bgcolor="#32CCFF" align=center><a href="erase_artigo.php?id='.$id.'">
									<img src="imagens/apagar.png" border=0></a></td>
					  </tr>');
				}else{
					echo('<tr>
							<td bgcolor="#E9C7C1" class="texto">'.$id.'</td>
							<td bgcolor="#E9C7C1" class="texto">'.$seccao.'</td>
							<td bgcolor="#E9C7C1" class="texto">'.$titulo.'</td>
							<td bgcolor="#E9C7C1" class="texto">'.$lead.'</td>
							<td bgcolor="#E9C7C1" class="texto">'.$texto.'</td>
							
							<td bgcolor="#E9C7C1" align=center>
								<a href="edit_artigo.php?id='.$id.'"><img src="imagens/edit_2.png" border=0></a></td>
								
							<td bgcolor="#E9C7C1" align=center><a href="erase_artigo.php?id='.$id.'">
								<img src="imagens/apagar.png" border=0></a></td>
					  </tr>');
					
				}
		}
		echo('</table>');
	} else {
		print("N�o h� registos");
	}
	mysql_close();
	
	
  ?>
</table>

</body>
</html>
