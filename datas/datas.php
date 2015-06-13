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
<title>Untitled Document</title>
<link href="../portal.css" rel="stylesheet" type="text/css" />
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<div id="Content">



  <!-- Conteudo do cabeçalho - titulo e mes-->
  <div id="header">
    <div id="titulo"><img src="../images/titulo.png" /></div>
    <div id="mes"><img src="../images/mes_corrente.png" /></div>
  </div>
  
    
  <!-- MENU Navegação -->
  <div id="navigation">
  <div id="horiz_ruler_4"><img src="../images/hruler.png" width="882" height="16" /></div>
    <div id="nav_fst"><img src="../images/figuras_bt.png" /></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><img src="../images/datas_bt.png" /></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><img src="../images/instituicoes_bt.png" /></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><img src="../images/sociedade_bt.png" /></div>
    <div id="nav_spacer"><img src="../images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><img src="../images/multimedia_bt.png" width="144" height="30" /></div>
    <div id="nav_agd"><img src="../images/arquivo_bt.png" width="154" height="30" /></div>
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
			$record = $db->query_artigo_titulo($artigo);
			echo $record;
		  ?>
        </div>
      </div>
    </div>
    <div id="top_bar_news_2ndHalf">
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
    </div>
    
    <!-- coluna foto -->
    <div id="columnPhoto">
   	  <img src="../images/atentado.png" />
    </div>
    <div id="columnOutrosArtigos">
   <div class="text_links_breves" id="artigos_breves"><a href="../breves_revolta_31Jan.php">A Revolta de 31 de Janeiro</a></div>
        <div class="text_links_breves" id="artigos_breves"><a href="../breves_musa_republica.php">A musa do busto da República</a></div>
        <div class="text_links_breves" id="artigos_breves"><a href="../breves_bissaya_barreto.php">O Republicanismo de Bissaya Barreto</a></div>
        <div class="text_links_breves" id="artigos_breves"><a href="../breves_cunho_ambientalista.php">O Cunho Ambientalista da I República</a></div>
        <div class="text_links_breves" id="artigos_breves"><a href="../breves_iconografia.php">A iconografia republicana</a></div>
    </div>
    
    
  </div>
  <!-- Acaba a news -->
  
  <!-- Régua horizontal -->
  <div id="horiz_ruler"><img src="../images/hruler.png"/></div>
  
  <!-- Cronologia -->
  <div id="cronologia"><img src="../images/cronologia.png" /></div>
  <!-- Carrossel em Flash -->
  <div id="flash_carrossel">
  	<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="882" height="382">
  	  <param name="movie" value="../flash/carrossel.swf" />
  	  <param name="quality" value="high" />
  	  <param name="wmode" value="opaque" />
  	  <param name="swfversion" value="6.0.65.0" />
  	  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
  	  <param name="expressinstall" value="../Scripts/expressInstall.swf" />
  	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  	  <!--[if !IE]>-->
  	  <object type="application/x-shockwave-flash" data="../flash/carrossel.swf" width="882" height="382">
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
  	  <!--<![endif]-->
    </object>
  </div>
  <!-- Régua horizontal -->
  <div id="horiz_ruler_2"><img src="../images/hruler.png" width="882" height="16" /></div>
  <!-- Fim Contents-->
</div>


<!-- Fim Content-->
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
