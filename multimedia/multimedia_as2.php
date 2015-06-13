<?php

	// I'm using a separate config file. so pull in those values
	require("../Connections/config.inc.php");
	
	// pull in the file with the database class
	require("../Connections/Database.class.php");
	
	// create the $db object
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	
	// connect to the server
	$db->connect();
	
	$playlist=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rep&uacute;blica 2010 - Multim&eacute;dia</title>
<link href="../portal_as2.css" rel="stylesheet" type="text/css" />
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
    <div id="nav_fst"><a href="../figuras/figuras_d_manuel_ii.php"><img src="../images/figuras_bt.png" width="120" height="30" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../datas/datas_regicidio_1908.php"><img src="../images/datas_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../instituicoes/instituicoes_carbonaria.php"><img src="../images/instituicoes_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="../sociedade/sociedade_educacao.php"><img src="../images/sociedade_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><a href="multimedia.php?id=<?php 
			$record = $db->query_multimedia_destaque();
			echo $record;
		  ?>"><img src="../images/multimedia_bt.png" width="144" height="30" border="0" /></a></div>
    <div id="nav_agd"><a href="../noticiaslusa/nlusa.php"><img src="../images/arquivo_bt.png" width="154" height="30" border="0" /></a></div>
  </div>
  
  
  
  
  <!-- Conteudo de acontecimentos importantes -->
  <div id="news_2">
    <div id="horiz_ruler_2">
      <div id="news_">
        <div id="top_bar_news_fullWidth"><img src="../images/multimedia_badge.png" /></div>
        <div id="flash_carrossel">
          <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="881" height="650">
            <param name="movie" value="multimedia_as2.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="transparent" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="../Scripts/expressInstall.swf" />
            <param name="FlashVars" value="media=<?php $record = $db->query_multimedia_xml($playlist);
		echo $record; ?>" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="multimedia_as2.swf" width="881" height="650">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="../Scripts/expressInstall.swf" />
              <param name="FlashVars" value="media=<?php $record = $db->query_multimedia_xml($playlist);
		echo $record; ?>" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
        <div class="text_maismultimedia_wh" id="top_bar_news_maismultimedia"></div>
        
        <!-- ================================ LINHA 1 ==================================== -->
        <div id="multimedia_row">
        <!-- ================================ ITEM ESQUERDA ==================================== -->
          <div id="item_multimedia_left">
          <div id="subitem_multimedia_foto"><img src="<?php $record = $db->query_multimedia_imagem(17);
		echo $record; ?>" /></div>
            <div class="texto_arial_10"  id="subitem_multimedia_brown">VÍDEOS
              <p class="text_titulo"><a href="multimedia.php?id=17" class="text_titulo"><?php $record = $db->query_multimedia_titulo(17);
		echo $record; ?></a> </p>
              <div id="btn_link_multimedia_2lines"><a href="multimedia.php?id=17"><img src="../images/btn_multimedia.png" /></a></div>
            </div>
          </div>
          
          <!-- ================================ ITEM CENTRO ==================================== -->
          <div id="item_multimedia_center">
          	<div id="subitem_multimedia_foto"><img src="<?php $record = $db->query_multimedia_imagem(16);
		echo $record; ?>" /></div>
            <div class="texto_arial_10" id="subitem_multimedia_purple">FOTOS
              <p class="text_titulo"><a href="multimedia.php?id=16" class="text_titulo"><?php $record = $db->query_multimedia_titulo(16);
		echo $record; ?></a></p>
              <div id="btn_link_multimedia_2lines"><a href="multimedia.php?id=16"><img src="../images/btn_multimedia.png" /></a></div>
            </div>
          </div>
          
          <!-- ================================ ITEM DIREITA ==================================== -->
          <div id="item_multimedia_right">
          <div id="subitem_multimedia_foto"><img src="<?php $record = $db->query_multimedia_imagem(5);
		echo $record; ?>" /></div>
            <div id="subitem_multimedia_brown" class="texto_arial_10">FOTOS
              <p class="text_titulo"><a href="multimedia.php?id=5" class="text_titulo"><?php $record = $db->query_multimedia_titulo(5);
		echo $record; ?></a></p>
              <div id="btn_link_multimedia"><a href="multimedia.php?id=5"><img src="../images/btn_multimedia.png" border="0" /></a></div>
            </div>
          </div>
        </div>
        <!-- ================================ TERMINA LINHA 1 ==================================== -->
        
        <!-- LINHA 2-->
   
        <!-- LINHA 3-->
        
       
        <!-- Régua horizontal -->
        <div id="horiz_ruler_"><img src="../images/hruler.png" width="882" height="16" /></div>
        <div class="footer_text" id="horiz_ruler_2"><center>Todos os direitos reservados. O Almanaque da República é um produto da Lusa elaborado com o apoio da Comissão Nacional para as Comemorações do Centenário da República.</center></div>
        <!-- Fim Contents-->
      </div>
    </div>
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
