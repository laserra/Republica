<?php

	// I'm using a separate config file. so pull in those values
	require("../Connections/config.inc.php");
	
	// pull in the file with the database class
	require("../Connections/Database.class.php");
	
	// create the $db object
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	
	// connect to the server
	$db->connect();
	
	$event=$_GET['data'];
	$artigo=$_GET['art'];
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rep&uacute;blica 2010 - Not&iacute;cias Lusa</title>
<link href="../portal.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" >
</head>

<body>
<div id="Content">



  <!-- Conteudo do cabeçalho - titulo e mes-->
  <div id="header">
    <div id="titulo"><a href="../index.php"><img src="../images/titulo.png" border="0" /></a></div>
    <div id="mes"><img src="../images/mes_corrente.png" /></div>
  </div>
  
    
  <!-- MENU Navegação -->
  <div id="navigation">
  <div id="horiz_ruler_4"><img src="../images/hruler.png" width="882" height="16" /></div>
    <div id="nav_fst"><a href="../figuras/figuras_d_manuel_ii.php"><img src="../images/figuras_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../datas/datas_regicidio_1908.php"><img src="../images/datas_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../instituicoes/instituicoes_simbolos.php"><img src="../images/instituicoes_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../sociedade/sociedade_educacao.php"><img src="../images/sociedade_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><a href="../multimedia/multimedia.php?id=<?php 
			$record = $db->query_multimedia_destaque();
			echo $record;
		  ?>"><img src="../images/multimedia_bt.png" width="144" height="30" /></a></div>
    <div id="nav_agd"><a href="nlusa.php"><img src="../images/arquivo_bt.png" width="154" height="30" border="0" /></a></div>
  </div>
  
  
  
  
  <!-- Conteudo de acontecimentos importantes -->
  <div id="news_2">
    <!-- Barra topo news -->
    <div id="top_bar_news_fullWidth_breves"><img src="../images/breves_badge.png" /></div>
    <!-- Coluna com texto -->
<div id="columnText_breves_list">
    	<div class="artigos_breves_list">
    	  <?php 
			$record = $db->query_breves_listagrande();
			echo $record;
		  ?>
    	</div>
    </div>
  </div>
  <!-- Acaba a news -->
  
  <!-- Régua horizontal -->
  <div id="horiz_ruler"><img src="../images/hruler.png"/></div>
  <div class="footer_text" id="horiz_ruler_2"><center>Todos os direitos reservados. O Almanaque da República é um produto da Lusa elaborado com o apoio da Comissão Nacional para as Comemorações do Centenário da República.</center></div>
  
  <!-- Cronologia -->
  <!-- Carrossel em Flash -->
  <!-- Régua horizontal -->
  <!-- Fim Contents-->
</div>


<!-- Fim Content-->
</div>
</body>
</html>
