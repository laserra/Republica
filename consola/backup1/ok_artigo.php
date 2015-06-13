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

		$idseccao=$_POST['id_seccao'];
		$titulo=$_POST['titulo'];
		$lead=$_POST['lead'];
		$texto=$_POST['texto'];
		$dia=$_POST['dia'];
		$autor=$_POST['autor'];
		$link=$_POST['link'];
		$xml=$_POST['xml'];
		
		//$id_artigo=$_POST['next_artigo'];
		
		$tablename 		= "foto";
		$next_increment 	= 0;
		$qShowStatus 		= "SHOW TABLE STATUS LIKE '$tablename'";
		$qShowStatusResult 	= mysql_db_query("republic_republica",$qShowStatus) or die ( "Query fallhou: " . mysql_error() . "<br/>" . $qShowStatus );

		$row = mysql_fetch_assoc($qShowStatusResult);
		$next_increment = $row['Auto_increment'];
		
		$id_foto=$next_increment;
		
		
		//$sql_max_id_foto="SELECT max(idfoto) FROM foto";
			
		//$rs_max_foto_id=mysql_db_query("republic_republica",$sql_max_id_foto);
			
		//$max_id_foto=mysql_fetch_array($rs_max_foto_id);
			
		//echo $max_id_foto[0]+1;
		
		//$id_foto=(int)$max_id_foto[0]+1;
		
		//echo ($id_foto);
		
	//GRAVAÇÃO DA IMAGEM
		
		set_time_limit(60);
		$uploadDir="../imagens_artigos/";
		//$path=(dirname($_FILES['foto']['tmp_name']))."\\upload\\";
		
		$source1=$_FILES['foto1']['tmp_name'];
		$source2=$_FILES['foto2']['tmp_name'];
		$source3=$_FILES['foto3']['tmp_name'];
		$source4=$_FILES['foto4']['tmp_name'];
		$source5=$_FILES['foto5']['tmp_name'];
		$source6=$_FILES['foto6']['tmp_name'];
		
		$source_name1=$_FILES['foto1']['name'];
		$source_name2=$_FILES['foto2']['name'];
		$source_name3=$_FILES['foto3']['name'];
		$source_name4=$_FILES['foto4']['name'];
		$source_name5=$_FILES['foto5']['name'];
		$source_name6=$_FILES['foto6']['name'];
		
		//IMAGEM 1
		if(($source_name1 <> "none")&&($source_name1<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto1']['tmp_name']))
			{
				die("ERROR: Not a valid file upload");
			}
			
			move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadDir.$_FILES['foto1']['name']) or die ("O upload do ficheiro 1 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
		
		//IMAGEM 2
		if(($source_name2 <> "none")&&($source_name2<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto2']['tmp_name']))
			{
				die("ERRO: Ficheiro inválido");
			}
			
			move_uploaded_file($_FILES['foto2']['tmp_name'], $uploadDir.$_FILES['foto2']['name']) or die ("O upload do ficheiro 2 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
		
		//IMAGEM 3
		if(($source_name3 <> "none")&&($source_name3<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto3']['tmp_name']))
			{
				die("ERRO: Ficheiro inválido");
			}
			
			move_uploaded_file($_FILES['foto3']['tmp_name'], $uploadDir.$_FILES['foto3']['name']) or die ("O upload do ficheiro 3 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
			
		//IMAGEM 4
		if(($source_name4 <> "none")&&($source_name4<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto4']['tmp_name']))
			{
				die("ERRO: Ficheiro inválido");
			}
			
			move_uploaded_file($_FILES['foto4']['tmp_name'], $uploadDir.$_FILES['foto4']['name']) or die ("O upload do ficheiro 4 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
			
		//IMAGEM 5
		if(($source_name5 <> "none")&&($source_name5<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto5']['tmp_name']))
			{
				die("ERRO: Ficheiro inválido");
			}
			
			move_uploaded_file($_FILES['foto5']['tmp_name'], $uploadDir.$_FILES['foto5']['name']) or die ("O upload do ficheiro 5 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
			
		//IMAGEM 6
		if(($source_name6 <> "none")&&($source_name6<>"")){
		//	$dest="upload\\".$source_name;
			if(!is_uploaded_file($_FILES['foto6']['tmp_name']))
			{
				die("ERRO: Ficheiro inválido");
			}
			
			move_uploaded_file($_FILES['foto6']['tmp_name'], $uploadDir.$_FILES['foto6']['name']) or die ("O upload do ficheiro 6 falhou!");
			

			}else {
				echo("Directório sem direitos de escrita.<br>");
			}
			
			
			//Inserção das Fotos
			
			$sql_insert_foto="INSERT INTO foto(fotogrande, fotopequena, fotomedia, fotomultimedia, fotoartigos, fotonormal) VALUES ('$source_name1','$source_name3', '$source_name2', '$source_name4', '$source_name5', '$source_name6')";
			
			$rs_foto=mysql_db_query('republic_republica',$sql_insert_foto);
			
			if($rs_foto){
				print('<b>Fotos inseridas com sucesso!</b>');
			}else{
				print('<b>Ocorreu um erro a gravar as fotos. Tente novamente!</b>');
			}
			
	//GRAVAÇÃO DOS DADOS DO FORMULÁRIO
	
		$sql="INSERT INTO artigo( idseccao, idfoto, titulo, lead, texto, data, link, autor, xml) VALUES ('$id_seccao', '$id_foto', '$titulo', '$lead', '$texto', '$dia', '$link', '$autor', '$xml') ";
	
	$resultado=mysql_db_query('republic_republica',$sql);
	
	if($resultado){
		print('<form id="form2" name="form2" method="post" action="list_artigos.php">
			  <label>
			  <div align="center">
			  	<strong>O artigo foi inserido com sucesso!</strong><p>
				<input type="submit" name="button2" id="button2" value="Voltar" />
			  </div>
			  </label>
            </form>');
	} else {
		print('<form id="form2" name="form2" method="post" action="list_artigos.php">
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
