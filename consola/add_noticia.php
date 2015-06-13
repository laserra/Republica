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
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <?php 
	include 'conndb.php';
?>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<p><a href="opcoes.php"><img src="imagens/home.png" width="222" height="23" border="0" /></a> <a href="list_noticias.php"><img src="imagens/list_noticias.png" width="222" height="23" border="0" /></a></p>
<hr>
<p class="navegacao">Inserir nova noticia</p>
<p class="navegacao"><table width="100%" border="0">
              <tr>
                <th bgcolor="#FF3300" scope="col" class="texto"><img src="imagens/aviso.png" width="32" height="32" /><br />
                  - O ficheiro PHP já deve estar configurado com o nome do ficheiro e o n&uacute;mero do artigo a mostrar.<br />
                - O ficheiro XML já deve estar configurado com as fotos, que ja fez upload</th>
              </tr>
              <tr bgcolor="#FF0000">
            <td colspan="2" class="texto"><strong>Número atribuido a esta not&iacute;cia:</strong> <label>
              <input name="next_artigo" type="text" id="next_artigo" value='<?php 	//verifica o id máximo dos artigos
			//$sql_max_id="SELECT max(idartigo) FROM artigo";
			
			//$rs_max_id=mysql_db_query("republic_republica",$sql_max_id);
			
			//$max_id=mysql_fetch_array($rs_max_id);
			
			//echo $max_id[0];
			
			$tablename 		= "breves";
			$next_increment 	= 0;
			$qShowStatus 		= "SHOW TABLE STATUS LIKE '$tablename'";
			$qShowStatusResult 	= mysql_db_query("republic_republica",$qShowStatus) or die ( "Query fallhou: " . mysql_error() . "<br/>" . $qShowStatus );

			$row = mysql_fetch_assoc($qShowStatusResult);
			$next_increment = $row['Auto_increment'];

			echo $next_increment;
			
			
 ?>' size="2" readonly="readonly"/>
            </label></td>
          </tr>
            </table></p>
<form action="ok_noticia.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="60%" border="0" align="center" cellpadding="4">
          <tr bgcolor="#E9C7C1">
            <td width="9%" class="texto">T&iacute;tulo</td>
            <td class="texto"><span id="sprytextfield1">
              <input name="titulo" type="text" id="titulo" size="80" />
            <span class="textfieldRequiredMsg">Valor obrigatório</span></span></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Lead</td>
            <td class="texto"><span id="sprytextarea1">
              <label>
                <textarea name="lead" cols="80" rows="15" id="lead"></textarea>
              </label>
            <span class="textareaRequiredMsg">Valor obrigatório</span></span></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Texto</td>
            <td class="texto"><span id="sprytextarea2">
              <label>
                <textarea name="texto" cols="80" rows="15" id="texto"></textarea>
              </label>
            <span class="textareaRequiredMsg">Valor obrigatório</span></span></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Autor</td>
            <td class="texto"><input name="autor" type="text" id="autor" size="80" /></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">Link</td>
            <td class="texto"><span id="sprytextfield2">
              <input name="link" type="text" id="link" size="80" />
            <span class="textfieldRequiredMsg">Valor obrigatório</span></span></td>
          </tr>
          <tr bgcolor="#E9C7C1">
            <td class="texto">XML para slideshow de fotos</td>
            <td class="texto"><span id="sprytextfield3">
              <input name="xml" type="text" id="xml" size="80" />
            <span class="textfieldRequiredMsg">Valor obrigatório</span></span></td>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
