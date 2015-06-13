<?php
	
	// I'm using a separate config file. so pull in those values
	require("Connections/config.inc.php");
	
	// pull in the file with the database class
	require("Connections/Database.class.php");
	
	// create the $db object
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	
	// connect to the server
	$db->connect();
	
	//CODIGOS ARTIGOS
	$not_left=32;
	$not_center=35;
	$not_right=29;
	$not_below=28;
	
	//CODIGOS CSS
	//2 COLUNAS
	$css_left="boximagem_2col_red_left";
	$css_below="boximagem_2col_purple_below";
	
	//1 COLUNA
	$css_right="boximagem_1col_green";
	$css_center="boximagem_1col_brown";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="google-site-verification" content="jcrxIjXZuTz8ou8zPJdUCGrenDbdm1MsfJ9xZ78-2x0" />
<title>Lusa - Comemora&ccedil;&atilde;o do Centen&aacute;rio da Rep&uacute;blica</title>
<link href="portal.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #fed6b0;
}
-->
</style>
<link rel="shortcut icon" href="favicon.ico" >
<meta name="Description" content="A Ag&ecirc;ncia Lusa junta-se &agrave;s comemora&ccedil;&otilde;es do Centen&aacute;rio da Rep&uacute;blica Portuguesa com um site comemorativo onde se cruzam muitas hist&oacute;rias, naquele que foi um acontecimento que mudou a face de Portugal." />
<meta name="Keywords" content="rep&uacute;blica republica comemora&ccedil;&otilde;es portugal implanta&ccedil;&atilde;o hist&oacute;rias monarquia republicano outubro exercito regicidio centen&aacute;rio ma&ccedil;onaria carbonaria revolu&ccedil;&atilde;o coroa d. manuel d. carlos monarquico parlamento" />
</head>
<body>
<div id="Content">



  <!-- Conteudo do cabeçalho - titulo e mes-->
  <div id="header">
    <div id="titulo"><a href="index.php"><img src="images/titulo.png" width="605" height="51" border="0" /></a></div>
    <div id="mes"><img src="images/mes_corrente.png"/></div>
  </div>
  
    
  <!-- MENU Navegação -->
  <div id="navigation">
  <div id="horiz_ruler_4"><img src="images/hruler.png" width="882" height="16" /></div>
    <div id="nav_fst"><a href="figuras/figuras_joserelvas.php"><img src="images/figuras_bt.png" width="120" height="30" border="0" /></a></div>
    <div id="nav_spacer"><img src="images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="datas/datas_setubal.php"><img src="images/datas_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="instituicoes/instituicoes_carbonaria.php"><img src="images/instituicoes_bt.png" border="0" /></a></div>
    <div id="nav_spacer"><img src="images/spacer.png" width="25" height="10" /></div>
    <div id="nav_nxt"><a href="sociedade/sociedade_futebol.php"><img src="images/sociedade_bt.png" width="120" height="30" border="0" /></a></div>
    <div id="nav_spacer"><img src="images/spacer.png" width="25" height="10" /></div>
    <div id="nav_mltm"><a href="multimedia/multimedia.php?id=<?php 
			$record = $db->query_multimedia_destaque();
			echo $record;
		  ?>"><img src="images/multimedia_bt.png" width="144" height="30" border="0" /></a></div>
    <div id="nav_agd"><a href="noticiaslusa/nlusa.php"><img src="images/arquivo_bt.png" width="154" height="30" border="0" /></a></div>
  </div>
  
  
  
  
  <!-- Conteudo de acontecimentos importantes -->
  <div id="news">
  
  	<!-- =============================== ARTIGOS ========================================================== -->
   
    <!-- =========================================== COLUNA ESQUERDA ====================================== -->
    <div id="columnLeft">
    
      <!-- IMAGEM -->	
      <div id="<?php echo $css_left; ?>"><a href="<?php $record = $db->query_artigo_link($not_left); echo $record; ?>" border=0>
      <?php 
		$record = $db->query_artigo_foto_grande($not_left);
		echo $record;
	  ?>
      </a>
       <!-- TEXTO -->
        <div class="textbox">
        	<!-- SECÇÃO -->
          <div class="text_subtitulo_paginic"><a href="<?php $record = $db->query_artigo_link($not_left); echo $record; ?>" class="text_subtitulo_paginic">
		  <?php 
			$record = $db->query_artigo_seccao($not_left);
			echo $record;
		  ?>
          </a>
      </div>
      	  <!-- TÍTULO -->
          <div class="text_titulo_principal"><a href="<?php $record = $db->query_artigo_link($not_left); echo $record; ?>" class="text_titulo_principal">
		  <?php 
			$record = $db->query_artigo_titulo($not_left);
			echo $record;
		  ?>
          </a>
          </div>
        </div>
      </div>
      <!-- LEAD ARTIGO -->
      <div class="text_photo_2col"><a href="<?php $record = $db->query_artigo_link($not_left); echo $record; ?>">
      <?php 
			$record = $db->query_artigo_lead($not_left);
			echo $record;
		?>
        </a>
      </div>
    </div>
    
    <!-- ============================================ COLUNA CENTRO =============================================-->
    <div id="columnMain">
      
      <!-- IMAGEM -->
      <div id="<?php echo $css_center; ?>">
          <a href="<?php $record = $db->query_artigo_link($not_center); echo $record; ?>" border=0>
			  <?php 
                $record = $db->query_artigo_foto_pequena($not_center);
                echo $record;
              ?>
          </a>
          <!-- SECÇÃO -->
          <div class="text_subtitulo_paginic"><a href="<?php $record = $db->query_artigo_link($not_center); echo $record; ?>" class="text_subtitulo_paginic">
          <?php 
			$record = $db->query_artigo_seccao($not_center);
			echo $record;
		  ?>
          </a>
        </div>
        
        <!-- TITULO -->
        <div class="text_titulo"><a href="<?php $record = $db->query_artigo_link($not_center); echo $record; ?>" class="text_titulo_principal">
		<?php 
			$record = $db->query_artigo_titulo($not_center);
			echo $record;
		  ?>
		</a>
      </div>
      </div>
      
      <!-- LEAD TEXTO -->
      <div class="text_photo_1col"><a href="<?php $record = $db->query_artigo_link($not_center); echo $record; ?>">
	  <?php 
			$record = $db->query_artigo_lead($not_center);
			echo $record;
		?></a>
      </div>
    </div>
    
    <!-- ============================================ COLUNA DIREITA ============================================= -->
    <div id="columnRight">
    
      <!-- IMAGEM -->
      <div id="<?php echo $css_right; ?>"><a href="<?php $record = $db->query_artigo_link($not_right); echo $record; ?>" border=0>
		  <?php 
            $record = $db->query_artigo_foto_pequena($not_right);
            echo $record;
          ?>
      </a>
       	<!-- SECÇÃO -->
        <div class="text_subtitulo_paginic"><a href="<?php $record = $db->query_artigo_link($not_right); echo $record; ?>" class="text_subtitulo_paginic">
          <?php 
			$record = $db->query_artigo_seccao($not_right);
			echo $record;
		  ?>
          </a>
        </div>
        
        <!-- TITULO -->
        <div class="text_titulo"><a href="<?php $record = $db->query_artigo_link($not_right); echo $record; ?>" class="text_titulo_principal">
		<?php 
			$record = $db->query_artigo_titulo($not_right);
			echo $record;
		  ?>
          </a>
          </div>
      </div>
      <div class="text_photo_1col"><a href="<?php $record = $db->query_artigo_link($not_right); echo $record; ?>">
	  <?php 
			$record = $db->query_artigo_lead($not_right);
			echo $record;
		?></a>
        </div>
    </div>
    
    <!-- ============================================ COLUNA INFERIOR ============================================= -->
    <div id="column2Across">
    <!-- IMAGEM -->
      <div id="<?php echo $css_below; ?>"><a href="<?php $record = $db->query_artigo_link($not_below); echo $record; ?>" border=0>
	  <?php 
		$record = $db->query_artigo_foto_media($not_below);
		echo $record;
	  ?>
      </a>
      <!-- SECÇÃO -->
        <div class="text_subtitulo_paginic"><a href="<?php $record = $db->query_artigo_link($not_below); echo $record; ?>" class="text_subtitulo_paginic">
		<?php 
			$record = $db->query_artigo_seccao($not_below);
			echo $record;
		  ?>
          </a>
      </div>
      <!-- LEAD TEXTO -->
        <div class="text_titulo"><a href="<?php $record = $db->query_artigo_link($not_below); echo $record; ?>" class="text_titulo_principal">
          <?php 
			$record = $db->query_artigo_titulo($not_below);
			echo $record;
		  ?>
          </a>
        </div>
      </div>
      <div class="text_photo_2col_318px"><a href="<?php $record = $db->query_artigo_link($not_below); echo $record; ?>">
	  <?php 
			$record = $db->query_artigo_lead($not_below);
			echo $record;
		?></a>
        </div>
    </div>
    
    <!-- ================================================== FIM ARTIGO ============================================== -->
    
    <!-- Coluna da Comissão -->
    <div id="column_comission">
      <object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="155" height="584">
        <param name="movie" value="flash/agenda.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="flash/agenda.swf" width="155" height="584">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
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
  </div>
  <!-- Acaba a news -->
  
  <!-- Régua horizontal -->
  <div id="horiz_ruler"><img src="images/hruler.png" /></div>
  
  <!-- Cronologia -->
  <div id="cronologia"><img src="images/cronologia_nh.png" width="65" height="25" /></div>
  <!-- Carrossel em Flash -->
  <div id="flash_carrossel">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="880" height="382">
      <param name="movie" value="flash/carrossel.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="flash/carrossel.swf" width="880" height="382">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
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
  <div id="horiz_ruler_2"><img src="images/hruler.png" width="882" height="16" /></div>
<!-- Fim News-->
<div id="flash_carrossel2">
  <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="882" height="148">
    <param name="movie" value="flash/carrossel2.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="flash/carrossel2.swf" width="882" height="148">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
<!-- Régua horizontal -->
  <div id="horiz_ruler_2"><img src="images/hruler.png" width="882" height="16" /></div>
  <div class="footer_text" id="horiz_ruler_2"><center>Todos os direitos reservados. O Almanaque da República é um produto da
Lusa elaborado como apoio da Comissão Nacional para as Comemorações do
Centenário da República.</center></div>
</div>
</div>

<!-- Fim Content-->
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
swfobject.registerObject("FlashID3");
//-->
</script>
</body>
</html>
<?php
	// and when finished, remember to close connection
	$db->close();
?>