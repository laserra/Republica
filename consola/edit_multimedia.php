<?php
session_cache_expire(30);
$cache_expire = session_cache_expire();

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
<title>Editar Artigo</title>
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
<p><a href="opcoes.php"><img src="imagens/home.png" width="222" height="23" border="0" /></a> <a href="list_multimedia.php"><img src="imagens/list_multimedia.png" width="222" height="23" border="0" /></a></p>
<hr>

<?php
	$id=$_REQUEST['id'];
	
	$sql="SELECT * FROM multimedia WHERE idmultimedia=".$id;
	
	$result=mysql_db_query("republic_republica",$sql);
	
	$registo=mysql_fetch_row($result);
	
	print("<span class='navegacao'>Editar Multimédia: ".$registo[1]."</span>");
?>
<form action="update_multimedia.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table bgcolor="#E9C7C1" width="60%" border="0" align="center" cellpadding="4">
          <tr>
            <td width="60%" class="texto">Titulo</td>
            <td width="40%" class="texto"><label>
              <input name="titulo" type="text" id="titulo" value="<?php echo $registo[1]?>" size="80"/>
            </label></td>
          </tr>
          <tr>
            <td class="texto">Imagem</td>
            <td class="texto"><label>
              <input name="dia" type="text" id="dia" value="<?php echo $registo[3]?>" size="80" />
            </label></td>
          </tr>
          <tr>
            <td class="texto">XML</td>
            <td class="texto"><input name="xml" type="text" id="xml" value="<?php echo $registo[4]?>" size="80" /></td>
          </tr>
          <!--<tr>
            <td class="texto">Fotografia</td>
            <td bgcolor="#FFFF00" class="texto"><label><span class="style4">Foto actual: <?php echo $registo[24]?>
            <input type="hidden" name="edt_foto" id="edt_foto" value='<?php echo $registo[24]?>'/>
            <br />
            </span> 
                <input type="file" name="foto" id="foto"/>
            </label>
            <label></label></td>
          </tr> -->
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