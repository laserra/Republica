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
<title>Apagar artigo</title>
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
<hr>

<p>
  <?php
	$id=$_REQUEST['id'];
	
	$sql="SELECT * FROM artigo WHERE idartigo='".$id."'";
	
	$result=mysql_db_query("republic_republica",$sql);
	
	$registo=mysql_fetch_row($result);
	
	print("<span class='navegacao'>Tem a certeza que quer apagar o artigo com a seguinte referência: ".$registo[3]."</span>");
?>
</p>
<table width="10%" border="0" align="center" cellpadding="4">
  <tr>
    <td bgcolor="#FFFF00">
    <form action="eraseok_artigo.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label>
  <div align="center"><img src="imagens/aviso.png" width="32" height="32" align="absmiddle" />
    <input type="submit" name="button" id="button" value="Sim" />
  </div>
  </label>
  <label></label>
  <div align="center"></div>

</form>
</td>
  </tr>
  <tr bgcolor="#009933">
    <td><form id="form2" name="form2" method="post" action="list_artigos.php">
      <label>
      <div align="center">
        <input type="submit" name="button2" id="button2" value="Voltar" />
      </div>
      </label>
            </form>      <label></label></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>