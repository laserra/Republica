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
		//$link=$_POST['link'];
		$php_file=$_POST['link'];
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
		
		set_time_limit(120);
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
			
			
			//GRAVAÇÃO DAS FOTOS PARA SLIDESHOW
			$DIR_DATAS="../datas/imagens/";
			$DIR_FIGURAS="../figuras/imagens/";
			$DIR_INSTITUICOES="../instituicoes/imagens/";
			$DIR_SOCIEDADE="../sociedade/imagens/";
			
			$TEMP_DIR="";
			
			switch($idseccao){
				case 1:
					$TEMP_DIR=$DIR_DATAS;
					break;
				case 2:
					$TEMP_DIR=$DIR_FIGURAS;
					break;
				case 3:
					$TEMP_DIR=$DIR_INSTITUICOES;
					break;
				case 4:
					$TEMP_DIR=$DIR_SOCIEDADE;
					break;
				default:
					break;
					
			}
			
			$slide1=$_FILES['foto7']['tmp_name'];
			$slide2=$_FILES['foto8']['tmp_name'];
			$slide3=$_FILES['foto9']['tmp_name'];
			$slide4=$_FILES['foto10']['tmp_name'];
			$slide5=$_FILES['foto11']['tmp_name'];
			$slide6=$_FILES['foto12']['tmp_name'];
			$slide7=$_FILES['foto13']['tmp_name'];
			$slide8=$_FILES['foto14']['tmp_name'];
			$slide9=$_FILES['foto15']['tmp_name'];
			$slide10=$_FILES['foto16']['tmp_name'];
			$slide11=$_FILES['foto17']['tmp_name'];
			$slide12=$_FILES['foto18']['tmp_name'];
			
			$slide1_name=$_FILES['foto7']['name'];
			$slide2_name=$_FILES['foto8']['name'];
			$slide3_name=$_FILES['foto9']['name'];
			$slide4_name=$_FILES['foto10']['name'];
			$slide5_name=$_FILES['foto11']['name'];
			$slide6_name=$_FILES['foto12']['name'];
			$slide7_name=$_FILES['foto13']['name'];
			$slide8_name=$_FILES['foto14']['name'];
			$slide9_name=$_FILES['foto15']['name'];
			$slide10_name=$_FILES['foto16']['name'];
			$slide11_name=$_FILES['foto17']['name'];
			$slide12_name=$_FILES['foto18']['name'];
			
			//IMAGEM SLIDESHOW 1
			if(($slide1 <> "none")&&($slide1_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto7']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto7']['tmp_name'], $TEMP_DIR.$_FILES['foto7']['name']) or die ("O upload 1º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 2
			if(($slide2 <> "none")&&($slide2_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto8']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto8']['tmp_name'], $TEMP_DIR.$_FILES['foto8']['name']) or die ("O upload 2º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 3
			if(($slide3 <> "none")&&($slide3_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto9']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto9']['tmp_name'], $TEMP_DIR.$_FILES['foto9']['name']) or die ("O upload 3º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 4
			if(($slide4 <> "none")&&($slide4_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto10']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto10']['tmp_name'], $TEMP_DIR.$_FILES['foto10']['name']) or die ("O upload 4º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 5
			if(($slide5 <> "none")&&($slide5_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto11']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto11']['tmp_name'], $TEMP_DIR.$_FILES['foto11']['name']) or die ("O upload 5º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 6
			if(($slide6 <> "none")&&($slide6_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto12']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto12']['tmp_name'], $TEMP_DIR.$_FILES['foto12']['name']) or die ("O upload 6º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 7
			if(($slide7 <> "none")&&($slide7_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto13']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto13']['tmp_name'], $TEMP_DIR.$_FILES['foto13']['name']) or die ("O upload 7º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 8
			if(($slide8 <> "none")&&($slide8_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto14']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto14']['tmp_name'], $TEMP_DIR.$_FILES['foto14']['name']) or die ("O upload 8º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 9
			if(($slide9 <> "none")&&($slide9_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto15']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto15']['tmp_name'], $TEMP_DIR.$_FILES['foto15']['name']) or die ("O upload 9º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 10
			if(($slide10 <> "none")&&($slide10_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto16']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto16']['tmp_name'], $TEMP_DIR.$_FILES['foto16']['name']) or die ("O upload 10º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 11
			if(($slide11 <> "none")&&($slide11_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto17']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto17']['tmp_name'], $TEMP_DIR.$_FILES['foto17']['name']) or die ("O upload 11º ficheiro de slideshow falhou!");
			}
			
			//IMAGEM SLIDESHOW 12
			if(($slide12 <> "none")&&($slide12_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['foto18']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['foto18']['tmp_name'], $TEMP_DIR.$_FILES['foto18']['name']) or die ("O upload 12º ficheiro de slideshow falhou!");
			}
			
			//UPLOAD DO FICHEIRO PHP
			
			$URLPHP_DATAS="http://www.republica2010.com/datas/";
			$URLPHP_FIGURAS="http://www.republica2010.com/figuras/";
			$URLPHP_INSTITUICOES="http://www.republica2010.com/instituicoes/";
			$URLPHP_SOCIEDADE="http://www.republica2010.com/sociedade/";
			
			$DIRPHP_DATAS="../datas/";
			$DIRPHP_FIGURAS="../figuras/";
			$DIRPHP_INSTITUICOES="../instituicoes/";
			$DIRPHP_SOCIEDADE="../sociedade/";
			
			$TEMP_DIRPHP="";
			$TEMP_URLPHP="";
			
			switch($idseccao){
				case 1:
					$TEMP_URLPHP=$URLPHP_DATAS;
					$TEMP_DIRPHP=$DIRPHP_DATAS;
					break;
				case 2:
					$TEMP_URLPHP=$URLPHP_FIGURAS;
					$TEMP_DIRPHP=$DIRPHP_FIGURAS;
					break;
				case 3:
					$TEMP_URLPHP=$URLPHP_INSTITUICOES;
					$TEMP_DIRPHP=$DIRPHP_INSTITUICOES;
					break;
				case 4:
					$TEMP_URLPHP=$URLPHP_SOCIEDADE;
					$TEMP_DIRPHP=$DIRPHP_SOCIEDADE;
					break;
				default:
					break;
					
			}
			
			$php_name=$_FILES['link']['name'];
			$php_tmp_name=$_FILES['link']['tmp_name'];
			
			
			
			if(($php_tmp_name <> "none")&&($php_name<>"")){
				$complete_link=$TEMP_URLPHP.$php_name;
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['link']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['link']['tmp_name'], $TEMP_DIRPHP.$_FILES['link']['name']) or die ("O upload do ficheiro PHP falhou!");
			}else{
				print('<b>Ocorreu um erro a gravar o ficheiro PHP. Tente novamente!</b>');
			}
			
			//UPLOAD DO FICHEIRO XML
			$DIRXML_DATAS="../datas/";
			$DIRXML_FIGURAS="../figuras/";
			$DIRXML_INSTITUICOES="../instituicoes/";
			$DIRXML_SOCIEDADE="../sociedade/";
			
			$TEMP_DIRXML="";
			
			switch($idseccao){
				case 1:
					$TEMP_DIRXML=$DIRXML_DATAS;
					break;
				case 2:
					$TEMP_DIRXML=$DIRXML_FIGURAS;
					break;
				case 3:
					$TEMP_DIRXML=$DIRXML_INSTITUICOES;
					break;
				case 4:
					$TEMP_DIRXML=$DIRXML_SOCIEDADE;
					break;
				default:
					break;
					
			}
			
			$xml_name=$_FILES['xml']['name'];
			$xml_tmp_name=$_FILES['xml']['tmp_name'];
			
			
			
			if(($xml_tmp_name <> "none")&&($xml_name<>"")){
				//$dest="upload\\".$source_name;
				if(!is_uploaded_file($_FILES['xml']['tmp_name']))
				{
					die("ERRO: Ficheiro inválido");
				}
			
				move_uploaded_file($_FILES['xml']['tmp_name'], $TEMP_DIRXML.$_FILES['xml']['name']) or die ("O upload do ficheiro PHP falhou!");
			}else{
				print('<b>Ocorreu um erro a gravar o ficheiro PHP. Tente novamente!</b>');
			}
			
	//GRAVAÇÃO DOS DADOS DO FORMULÁRIO
	
		$sql="INSERT INTO artigo( idseccao, idfoto, titulo, lead, texto, data, link, autor, xml) VALUES ('$id_seccao', '$id_foto', '$titulo', '$lead', '$texto', '$dia', '$complete_link', '$autor', '$xml_name') ";
	
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
