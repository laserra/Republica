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
<title>Adicionar artigos</title>
<link href="estilos2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(body.jpg);
}
-->
</style></head>

<body>
  <?php 
	include 'conndb.php';
?>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<p><a href="opcoes.php"><img src="imagens/home.png" width="222" height="23" border="0" /></a> <a href="list_artigos.php"><img src="imagens/list_artigos.png" width="222" height="23" border="0" /></a></p>
<hr>
<span class="navegacao">Inserir novo artigo</span>
<form action="ok_artigo.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="60%" border="0" align="center" cellpadding="4">
          <tr bgcolor="#E9C7C1">
            <td width="9%" class="texto">Seccao</td>
            <td colspan="2" class="texto"><label>
            <?php
				
				$sql1="SELECT * FROM seccao";
				
				$lista1=mysql_db_query("republic_republica",$sql1);
				
				print('<select name="id_seccao" id="id_seccao">
						<option value="0" selected="selected">Escolher Opção</option>');
				while($registo=mysql_fetch_array($lista1)){
					print('<option value="'.$registo["idseccao"].'">'.$registo["nome"].'</option>');
				};
				print('</select>');

			?>
            </label></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">T&iacute;tulo</td>
            <td colspan="2" class="texto"><input name="titulo" type="text" id="titulo" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Lead</td>
            <td colspan="2" class="texto"><label>
              <textarea name="lead" cols="80" rows="15" id="lead"></textarea>
            </label></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Texto</td>
            <td colspan="2" class="texto"><label>
              <textarea name="texto" cols="80" rows="15" id="texto"></textarea>
            </label></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Data</td>
            <td colspan="2" class="texto"><input name="dia" type="text" id="dia" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Autor</td>
            <td colspan="2" class="texto"><input name="autor" type="text" id="autor" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Link</td>
            <td colspan="2" class="texto"><input name="link" type="text" id="link" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">XML para slideshow de fotos</td>
            <td colspan="2" class="texto"><input name="xml" type="text" id="xml" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td rowspan="6" bgcolor="#99CCCC" class="texto">Fotos</td>
            <td bgcolor="#99CCCC" class="texto">Foto Normal</td>
            <td bgcolor="#99CCCC" class="texto"><input type="file" name="foto6" id="foto6"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td bgcolor="#99CCCC" class="texto">Foto Grande (390x269)</td>
            <td bgcolor="#99CCCC" class="texto"><input type="file" name="foto1" id="foto1"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td bgcolor="#99CCCC" class="texto">Foto M&eacute;dia (318x116)</td>
            <td bgcolor="#99CCCC" class="texto"><input type="file" name="foto2" id="foto2"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td bgcolor="#99CCCC" class="texto">Foto Pequena (155x122)</td>
            <td bgcolor="#99CCCC" class="texto"><input type="file" name="foto3" id="foto3"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td width="48%" bgcolor="#99CCCC" class="texto">Miniatura Multim&eacute;dia (133x113)</td>
            <td width="43%" bgcolor="#99CCCC" class="texto"><input type="file" name="foto4" id="foto4"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td bgcolor="#99CCCC" class="texto">Miniatura Artigos (77x56)</td>
            <td width="43%" bgcolor="#99CCCC" class="texto"><input type="file" name="foto5" id="foto5"/></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td bgcolor="#99CCCC" class="texto"><label>
              <input name="next_artigo" type="text" id="next_artigo" value='<?php 	//verifica o id máximo dos artigos
			//$sql_max_id="SELECT max(idartigo) FROM artigo";
			
			//$rs_max_id=mysql_db_query("republic_republica",$sql_max_id);
			
			//$max_id=mysql_fetch_array($rs_max_id);
			
			//echo $max_id[0];
			
			$tablename 		= "artigo";
			$next_increment 	= 0;
			$qShowStatus 		= "SHOW TABLE STATUS LIKE '$tablename'";
			$qShowStatusResult 	= mysql_db_query("republic_republica",$qShowStatus) or die ( "Query fallhou: " . mysql_error() . "<br/>" . $qShowStatus );

			$row = mysql_fetch_assoc($qShowStatusResult);
			$next_increment = $row['Auto_increment'];

			echo $next_increment;
			
			
 ?>' size="2" readonly="readonly"/>
            </label></td>
          </tr>
        </table>
            <p>
              <label>
              <input type="submit" name="button" id="button" value="Guardar" />
              </label>
              <label>
              <input type="reset" name="button2" id="button2" value="Apagar Formul&aacute;rio" />
              </label>
  </p>
</form>


</body>
</html>
