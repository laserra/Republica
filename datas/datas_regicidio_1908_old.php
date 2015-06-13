<?php

	// I'm using a separate config file. so pull in those values
	require("../Connections/config.inc.php");
	
	// pull in the file with the database class
	require("../Connections/Database.class.php");
	
	// create the $db object
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	
	// connect to the server
	$db->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Republica 2010 - Datas - Regic&iacute;dio de 1908</title>
<link href="../portal.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
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
    <div id="nav_nxt"><a href="datas_regicidio_1908.php"><img src="../images/datas_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../instituicoes/instituicoes_carbonaria.php"><img src="../images/instituicoes_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../sociedade/sociedade_educacao.php"><img src="../images/sociedade_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><a href="../multimedia/multimedia.php"><img src="../images/multimedia_bt.png" width="144" height="30" border="0" /></a></div>
    <div id="nav_agd"><a href="../breves/breves_musa_republica.php"><img src="../images/arquivo_bt.png" width="154" height="30" /></a></div>
  </div>
  
  
  
  
  <!-- Conteudo de acontecimentos importantes -->
  <div id="news_2">

    <!-- Barra topo news -->
    <div id="top_bar_news_1stHalf">
      <div class="textbox">
        <div class="text_subtitulo_wh">
        <?php 
			$record = $db->query_seccao_name("1");
			echo $record;
		  ?>
        
        </div>
        <div class="text_titulo_barra">
		<?php 
			$record = $db->query_artigo_titulo("1");
			echo $record;
		  ?>
        </div>
      </div>
    </div>
    <!-- Coluna com texto -->
<div id="columnText">
    	<div class="text_lead">
    	  <?php 
			$record = $db->query_artigo_lead("1");
			echo $record;
		  ?>
    	</div>
        <p>
        <div class="text_normal">
        	<?php 
			$record = $db->query_artigo_texto("1");
			echo $record;
		  ?>
        </div>
    </div>
    
    <!-- coluna foto -->
    <div id="columnPhoto">
      <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="408" height="527">
        <param name="movie" value="datas.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="../Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="datas.swf" width="408" height="527">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="../Scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
      </object>
      <div id="columnOutrosArtigos">
  		<div id="outros_artigos_box">
        	<div id="item_outros_artigos">
            	<div class="text_outros_artigos" id="outros_artigos_text">Regicidio de 1908</div><div id="outros_artigos_imagem"></div>			</div>
            </div>
        <div id="outros_artigos_box">
        	<div id="item_outros_artigos">
            	<div class="text_outros_artigos" id="outros_artigos_text">Governo de Acalmação<br />(Ferreira do Amaral)</div><div id="outros_artigos_imagem"></div>			</div>
            </div>
        <div id="outros_artigos_box">
        	<div id="item_outros_artigos">
            	<div class="text_outros_artigos" id="outros_artigos_text">Eleições de Agosto de 1910</div>
            	<div id="outros_artigos_imagem"></div></div>
            </div>
      </div>
    </div>
    
    
    
  </div>
  <!-- Acaba a news -->
  
  <!-- Régua horizontal -->
  <div id="horiz_ruler"><img src="../images/hruler.png"/></div>
  
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
