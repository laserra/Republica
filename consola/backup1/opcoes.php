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
<title></title>
<link href="estilos2.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-image: url(body.jpg);
	text-align: center;
}
-->
</style></head>
<body>
<p><img src="imagens/titulo.png" width="605" height="51" /></p><p class="navegacao"><strong>Administração</strong> - <a href="logout.php"><strong><img src="imagens/exit.png" alt="Sair" border="0"/></strong></a></p>
<hr />
<p class="navegacao"><strong>Escolha a acção pretendida</strong></p>
<p class="navegacao">&nbsp;</p>
<p class="navegacao">ARTIGOS</p>
<table width="472" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td align="center" valign="middle"><a href="add_artigo.php"><img src="imagens/add_artigos.png" width="222" height="23" border="0" /></a></td>
    <td align="center" valign="middle"><a href="list_artigos.php"><img src="imagens/list_artigos.png" width="222" height="23" border="0" /></a></td>
  </tr>
</table>
<p class="navegacao">NOTICIAS LUSA</p>
<table width="472" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td align="center" valign="middle"><a href="add_noticia.php"><img src="imagens/add_noticias.png" width="222" height="23" border="0" /></a></td>
    <td align="center" valign="middle"><a href="list_noticias.php"><img src="imagens/list_noticias.png" width="222" height="23" border="0" /></a></td>
  </tr>
</table>
<p>MULTIMÉDIA</p>
<table width="472" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td align="center" valign="middle"><a href="add_multimedia.php"><img src="imagens/add_multimedia.png" width="222" height="23" border="0" /></a></td>
    <td align="center" valign="middle"><a href="list_multimedia.php"><img src="imagens/list_multimedia.png" width="222" height="23" border="0" /></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><a href="edit_dstmultimedia.php"><img src="imagens/add_destaque.png" width="222" height="23" border="0" /></a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>