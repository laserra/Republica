<?php

	// I'm using a separate config file. so pull in those values
	require("../Connections/config.inc.php");
	
	// pull in the file with the database class
	require("../Connections/Database.class.php");
	
	// create the $db object
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	
	// connect to the server
	$db->connect();
	
	$artigo=23;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Republica 2010 - Institui&ccedil;&otilde;es - <?php 
			$record = $db->query_artigo_titulo($artigo);
			echo $record;
		  ?></title>
<link href="../portal.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
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
    <div id="nav_nxt"><a href="instituicoes_carbonaria.php"><img src="../images/instituicoes_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../sociedade/sociedade_educacao.php"><img src="../images/sociedade_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><a href="../multimedia/multimedia.php?id=<?php 
			$record = $db->query_multimedia_destaque();
			echo $record;
		  ?>"><img src="../images/multimedia_bt.png" width="144" height="30" border="0" /></a></div>
    <div id="nav_agd"><a href="../breves/breves.php"><img src="../images/arquivo_bt.png" width="154" height="30" border="0" /></a></div>
  </div>
  
  
  
  
  <!-- Conteudo de acontecimentos importantes -->
  <div id="news_2">

    <!-- Barra topo news -->
    <div id="top_bar_news_instituicoes">
      <div class="textbox">
        <div class="text_subtitulo_wh">
		<?php
			$record = $db->query_seccao_artigo($artigo);
			echo $record;
		?>
        </div>
        <div class="text_titulo_barra">
		<?php 
			$record = $db->query_artigo_titulo($artigo);
			echo $record;
		  ?>
        </div>
      </div>
    </div>
    <!-- Coluna com texto -->
<div id="columnText">
    	<div class="text_lead">
    	  <?php 
			$record = $db->query_artigo_lead($artigo);
			echo $record;
		  ?>
    	</div>
        <p>
        <div class="text_normal">
        	<?php 
			$record = $db->query_artigo_texto($artigo);
			echo $record;
		  ?>
        </div>
         <p>
        <div class="text_autor">
        	<?php 
			$record = $db->query_artigo_autor($artigo);
			echo $record;
		  ?>
        </div>
    </div>
    
    <!-- coluna foto -->
    <div id="columnPhoto">
      <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="408" height="527">
        <param name="movie" value="artigos_slideshow.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="../Scripts/expressInstall.swf" />
         <param name="FlashVars" value="media=<?php $record = $db->query_artigo_xml($artigo);echo $record; ?>" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="artigos_slideshow.swf" width="408" height="527">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="../Scripts/expressInstall.swf" />
           <param name="FlashVars" value="media=<?php $record = $db->query_artigo_xml($artigo);echo $record; ?>" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
      <div id="columnOutrosArtigos">
  		<?php 
			$record = $db->query_artigo_lista($artigo);
			echo $record;
		  ?>
    </div>
    
  </div>
  <div id="horiz_ruler"><img src="../images/hruler.png"/></div>
  <div class="footer_text" id="horiz_ruler_2"><center>Todos os direitos reservados. O Almanaque da República é um produto da Lusa elaborado com o apoio da Comissão Nacional para as Comemorações do Centenário da República.</center></div>
  
  <!-- Cronologia -->
  <!-- Carrossel em Flash -->
  <!-- Régua horizontal -->
  <!-- Fim Contents-->
</div>


<!-- Fim Content-->
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
