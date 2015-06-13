<?php
# Name: Database.class.php
# File Description: MySQL Class to allow easy and clean access to common mysql commands
# Author: ricocheting
# Web: http://www.ricocheting.com/
# Update: 2009-12-17
# Version: 2.2.2
# Copyright 2003 ricocheting.com


/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



//require("config.inc.php");
//$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);


###################################################################################################
###################################################################################################
###################################################################################################
class Database {


var $server   = ""; //database server
var $user     = ""; //database login name
var $pass     = ""; //database login password
var $database = ""; //database name
var $pre      = ""; //table prefix


#######################
//internal info
var $error = "";
var $errno = 0;

//number of rows affected by SQL query
var $affected_rows = 0;

var $link_id = 0;
var $query_id = 0;


#-#############################################
# desc: constructor
function Database($server, $user, $pass, $database, $pre=''){
	$this->server=$server;
	$this->user=$user;
	$this->pass=$pass;
	$this->database=$database;
	$this->pre=$pre;
}#-#constructor()


#-#############################################
# desc: connect and select database using vars above
# Param: $new_link can force connect() to open a new link, even if mysql_connect() was called before with the same parameters
function connect($new_link=false) {
	$this->link_id=@mysql_connect($this->server,$this->user,$this->pass,$new_link);

	if (!$this->link_id) {//open failed
		$this->oops("Could not connect to server: <b>$this->server</b>.");
		}

	if(!@mysql_select_db($this->database, $this->link_id)) {//no database
		$this->oops("Could not open database: <b>$this->database</b>.");
		}

	// unset the data so it can't be dumped
	$this->server='';
	$this->user='';
	$this->pass='';
	$this->database='';
}#-#connect()


#-#############################################
# desc: close the connection
function close() {
	if(!@mysql_close($this->link_id)){
		$this->oops("Connection close failed.");
	}
}#-#close()


#-#############################################
# Desc: escapes characters to be mysql ready
# Param: string
# returns: string
function escape($string) {
	if(get_magic_quotes_runtime()) $string = stripslashes($string);
	return @mysql_real_escape_string($string,$this->link_id);
}#-#escape()


#-#############################################
# Desc: executes SQL query to an open connection
# Param: (MySQL query) to execute
# returns: (query_id) for fetching results etc
function query($sql) {
	// do query
	$this->query_id = @mysql_query($sql, $this->link_id);

	if (!$this->query_id) {
		$this->oops("<b>MySQL Query fail:</b> $sql");
		return 0;
	}
	
	$this->affected_rows = @mysql_affected_rows($this->link_id);

	return $this->query_id;
}#-#query()


#-#############################################
# desc: fetches and returns results one line at a time
# param: query_id for mysql run. if none specified, last used
# return: (array) fetched record(s)
function fetch_array($query_id=-1) {
	// retrieve row
	if ($query_id!=-1) {
		$this->query_id=$query_id;
	}

	if (isset($this->query_id)) {
		$record = @mysql_fetch_assoc($this->query_id);
	}else{
		$this->oops("Invalid query_id: <b>$this->query_id</b>. Records could not be fetched.");
	}

	return $record;
}#-#fetch_array()


#-#############################################
# desc: returns all the results (not one row)
# param: (MySQL query) the query to run on server
# returns: assoc array of ALL fetched results
function fetch_all_array($sql) {
	$query_id = $this->query($sql);
	$out = array();

	while ($row = $this->fetch_array($query_id, $sql)){
		$out[] = $row;
	}

	$this->free_result($query_id);
	return $out;
}#-#fetch_all_array()


#-#############################################
# desc: frees the resultset
# param: query_id for mysql run. if none specified, last used
function free_result($query_id=-1) {
	if ($query_id!=-1) {
		$this->query_id=$query_id;
	}
	if($this->query_id!=0 && !@mysql_free_result($this->query_id)) {
		$this->oops("Result ID: <b>$this->query_id</b> could not be freed.");
	}
}#-#free_result()


#-#############################################
# desc: does a query, fetches the first row only, frees resultset
# param: (MySQL query) the query to run on server
# returns: array of fetched results
function query_first($query_string) {
	$query_id = $this->query($query_string);
	$out = $this->fetch_array($query_id);
	$this->free_result($query_id);
	return $out;
}#-#query_first()


###############################################
##                  ARTIGOS                  ##
###############################################

#-#############################################
# desc: vai buscar a imagem GRANDE dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_grande($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotogrande FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="imagens_artigos/'.$out_sql_foto['fotogrande'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar a imagem MEDIA dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_media($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotomedia FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="imagens_artigos/'.$out_sql_foto['fotomedia'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar a imagem PEQUENA dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_pequena($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotopequena FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="imagens_artigos/'.$out_sql_foto['fotopequena'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar a imagem MULTIMEDIA dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_multimedia($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotomultimedia FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="http://www.republica2010.com/imagens_artigos/'.$out_sql_foto['fotomultimedia'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar a imagem ARTIGOS dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_artigos($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotoartigos FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="imagens_artigos/'.$out_sql_foto['fotoartigos'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar a imagem NORMAL dando o artigo
# param: numero do artigo
# returns: codigo html
function query_artigo_foto_normal($num_artigo){
	$sql_idfoto = "SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idfoto=$this->query($sql_idfoto);
	$out_sql_idfoto=$this->fetch_array($query_sql_idfoto);
	
	if($sql_idfoto){
	
		$sql_foto="SELECT fotonormal FROM ".TABLE_FOTO." WHERE idfoto=".$out_sql_idfoto['idfoto'];
		$query_sql_foto=$this->query($sql_foto);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		$this->free_result($query_sql_idfoto);
		$this->free_result($query_sql_foto);
		
		$out='<img src="imagens_artigos/'.$out_sql_foto['fotonormal'].'"/>';
		return $out;
	}
}

#-#############################################
# desc: vai buscar o nome da secção do artigo
# param: numero do artigo
# returns: nome da seccção
function query_artigo_seccao($num_artigo){
	$sql_idseccao = "SELECT idseccao FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_idseccao=$this->query($sql_idseccao);
	$out_sql_idseccao=$this->fetch_array($query_sql_idseccao);
	
	if($sql_idseccao){
	
		$sql_seccao="SELECT nome FROM ".TABLE_SECCAO." WHERE idseccao=".$out_sql_idseccao['idseccao'];
		$query_sql_seccao=$this->query($sql_seccao);
		$out_sql_seccao=$this->fetch_array($query_sql_seccao);
		
		$this->free_result($query_sql_idseccao);
		$this->free_result($query_sql_seccao);
		
		$out=$out_sql_seccao['nome'];
		return $out;
		
	}
}

#-#############################################
# desc: vai buscar o titulo de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_titulo($num_artigo){
	$sql = "SELECT titulo FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['titulo'];
	return $out;
}

#-#############################################
# desc: vai buscar o link de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: link do artigo
function query_artigo_link($num_artigo){
	$sql="SELECT link FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['link'];
	return $out;
}

#-#############################################
# desc: vai buscar a lead de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_lead($num_artigo){
	$sql = "SELECT lead FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['lead'];
	return $out;
}

#-#############################################
# desc: vai buscar o titulo de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_texto($num_artigo){
	$sql = "SELECT texto FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['texto'];
	return $out;
}

#-#############################################
# desc: vai buscar o autor de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_autor($num_artigo){
	$sql = "SELECT autor FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['autor'];
	return $out;
}

#-#############################################
# desc: vai buscar o xml de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_xml($num_artigo){
	$sql = "SELECT xml FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['xml'];
	return $out;
}

#-#############################################
# desc: vai buscar a data de um artigo dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_artigo_data($num_artigo){
	$sql = "SELECT data FROM ".TABLE_ARTIGO." WHERE idartigo='".$num_artigo."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['data'];
	return $out;
}

function query_artigo_lista($num_artigo){
	$sql_seccao = "SELECT idseccao FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_seccao=$this->query($sql_seccao);
	$out_seccao=$this->fetch_array($query_seccao);
		
	//$this->free_result($query_sql);
		
	$seccao=$out_seccao['idseccao'];
	
	$sql ="SELECT titulo, link, idfoto FROM ".TABLE_ARTIGO." WHERE idartigo <> ".$num_artigo." AND idseccao=".$seccao;
	$query_sql=$this->query($sql);
	
	$valores='';
	
	while($registo=$this->fetch_array($query_sql)){
		$titulo=$registo['titulo'];
		$link=$registo['link'];
		$foto=$registo['idfoto'];
		
		$sql_foto_artigo="SELECT fotoartigos FROM ".TABLE_FOTO." WHERE idfoto=".$foto;
		$query_sql_foto=$this->query($sql_foto_artigo);
		$out_sql_foto=$this->fetch_array($query_sql_foto);
		
		//$this->free_result($out_sql_foto);
		
		$imagem=$out_sql_foto['fotoartigos'];
		
		$valores=$valores.'<div id="outros_artigos_box"><div id="item_outros_artigos">
							<div class="text_outros_artigos" id="outros_artigos_text"><a href="'.$link.'">'.$titulo.'</a></div>
							<div id="outros_artigos_imagem"><img src="/imagens_artigos/'.$imagem.'"></div>
							</div></div>';
	}
	$this->free_result($query_sql);
	
	return $valores;
}


###############################################
##                  SECCAO                   ##
###############################################

#-#############################################
# desc: vai buscar o nome da seccao de um artigo
# param: numero do artigo
# returns: titulo do artigo
function query_seccao_name($num_seccao){
	$sql = "SELECT nome FROM ".TABLE_SECCAO." WHERE idseccao=".$num_seccao;
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['nome'];
	return $out;
}

function query_seccao_artigo($num_artigo){
	$sql = "SELECT idseccao FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	//$this->free_result($query_sql);
		
	$out=$out_sql['idseccao'];
	
	$sql_name="SELECT nome FROM ".TABLE_SECCAO." WHERE idseccao=".$out;
	$query_name=$this->query($sql_name);
	$out_name=$this->fetch_array($query_name);
	
	$result=$out_name['nome'];
	return $result;
}

function query_seccao_id($num_artigo){
	$sql="SELECT idseccao FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
	
	$out=$out_sql['idseccao'];
	return $out;
}

function query_fotopequena_id($num_artigo){
	$sql="SELECT idfoto FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
	
	$out=$out_sql['idfoto'];
	return $out;
}

###############################################
##                  BREVES                   ##
###############################################
function query_breves_titulo($num_breves){
	$sql = "SELECT nome FROM ".TABLE_BREVES." WHERE idbreves='".$num_breves."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['nome'];
	return $out;
}

function query_breves_lead($num_breves){
	$sql = "SELECT lead FROM ".TABLE_BREVES." WHERE idbreves='".$num_breves."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['lead'];
	return $out;
}

function query_breves_texto($num_breves){
	$sql = "SELECT texto FROM ".TABLE_BREVES." WHERE idbreves='".$num_breves."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['texto'];
	return $out;
}

#-#############################################
# desc: vai buscar o autor de uma breve dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_breves_autor($num_breves){
	$sql = "SELECT autor FROM ".TABLE_BREVES." WHERE idbreves='".$num_breves."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['autor'];
	return $out;
}

#-#############################################
# desc: vai buscar a lista com nome, link e excerto da lead de uma noticia
# param: numero do artigo
# returns: titulo do artigo
function query_breves_listagrande(){
	$sql ="SELECT nome, link, lead FROM ".TABLE_BREVES;
	$query_sql=$this->query($sql);
	
	$valores='';
	
	while($registo=$this->fetch_array($query_sql)){
		$nome=$registo['nome'];
		$link=$registo['link'];
		$lead=substr($registo['lead'],0,200);
		$valores=$valores.'<div class="text_links_breves" id="artigos_breves_list"><a href="'.$link.'"><div class="text_links_breves_biglist">'.$nome.'</div><br>'.$lead.'...</div><p>';
	}
	$this->free_result($query_sql);
	
	return $valores;
}

function query_breves_lista($artigo){
	$sql ="SELECT nome, link FROM ".TABLE_BREVES." WHERE idbreves <> ".$artigo;
	$query_sql=$this->query($sql);
	
	$valores='';
	
	while($registo=$this->fetch_array($query_sql)){
		$nome=$registo['nome'];
		$link=$registo['link'];
		$valores=$valores.'<div class="text_links_breves" id="artigos_breves"><a href="'.$link.'">'.$nome.'</a></div>';
	}
	$this->free_result($query_sql);
	
	return $valores;
}
#-#############################################
# desc: vai buscar o xml de uma noticia dando o numero desse artigo
# param: numero do artigo
# returns: titulo do artigo
function query_breves_xml($num_breves){
	$sql = "SELECT xml FROM ".TABLE_BREVES." WHERE idbreves='".$num_breves."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['xml'];
	return $out;
}

#-#############################################
#    MULTIMEDIA
#-#############################################
function query_multimedia_destaque(){
	$sql = "SELECT valor FROM ".TABLE_DESTAQUE." WHERE iddestaque=1";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['valor'];
	return $out;
}

function query_multimedia_titulo($valor){
	$sql = "SELECT titulo FROM ".TABLE_MULTIMEDIA." WHERE idmultimedia='".$valor."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['titulo'];
	return $out;
}

function query_multimedia_imagem($valor){
	$sql = "SELECT imagem FROM ".TABLE_MULTIMEDIA." WHERE idmultimedia='".$valor."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['imagem'];
	return $out;
}

function query_multimedia_link($valor){
	$sql = "SELECT link FROM ".TABLE_MULTIMEDIA." WHERE idmultimedia='".$valor."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['link'];
	return $out;
}

function query_multimedia_xml($valor){
	$sql = "SELECT xml FROM ".TABLE_MULTIMEDIA." WHERE idmultimedia='".$valor."'";
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
		
	$this->free_result($query_sql);
		
	$out=$out_sql['xml'];
	return $out;
}

#-#############################################
# desc: vai buscar outros artigos com titulo e imagem para além do corrente
# param: numero do artigo
# returns: titulo do artigo
function query_outros_artigos($num_artigo){
	$sql_seccao="SELECT idseccao FROM ".TABLE_ARTIGO." WHERE idartigo=".$num_artigo;
	$query_sql_seccao=$this->query($sql_seccao);
	$out_sql_seccao=$this->fetch_array($query_sql_seccao);
	
	$aux=$out_sql_seccao['idseccao'];
	
	$sql = "SELECT idartigo FROM ".TABLE_ARTIGO." WHERE idseccao=".$aux." ORDER BY idartigo ASC";
	
	//$artigos=fetch_all_array($sql);
	
	$query_sql=$this->query($sql);
	$out_sql=$this->fetch_array($query_sql);
	
	echo('<table>');
		while($registo=$this->fetch_array($query_sql)){
			//if($row['idartigo']!=$num_artigo){
				echo ('<tr>');
				$titulo=$registo[3];
				$link=$registo[7];
				$foto=$registo[2];
				
				echo($titulo);
				echo($link);
				echo($foto);
				
				/*$sql_foto="SELECT fotopequena FROM ".TABLE_FOTO." WHERE idfoto=".$foto;
				$query_sql_foto=$this->query($sql_foto);
				$out_sql_foto=$this->fetch_array($query_sql_foto);
				$foto=$out_sql_foto['fotopequena'];
				echo('<td class="texto"><a href="'.$link.'" border=0>'.$titulo.'</a></td><td><a href="'.$link.'" border=0>'.$foto.'</a></td></tr>');*/
				
			//}
		}
	echo('</table>');
	
	$this->free_result($query_sql);
		
	$out=$out_sql['nome'];
	return $out;
}





#-#############################################
# desc: does an update query with an array
# param: table (no prefix), assoc array with data (doesn't need escaped), where condition
# returns: (query_id) for fetching results etc
function query_update($table, $data, $where='1') {
	$q="UPDATE `".$this->pre.$table."` SET ";

	foreach($data as $key=>$val) {
		if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
		elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
		else $q.= "`$key`='".$this->escape($val)."', ";
	}

	$q = rtrim($q, ', ') . ' WHERE '.$where.';';

	return $this->query($q);
}#-#query_update()


#-#############################################
# desc: does an insert query with an array
# param: table (no prefix), assoc array with data
# returns: id of inserted record, false if error
function query_insert($table, $data) {
	$q="INSERT INTO `".$this->pre.$table."` ";
	$v=''; $n='';

	foreach($data as $key=>$val) {
		$n.="`$key`, ";
		if(strtolower($val)=='null') $v.="NULL, ";
		elseif(strtolower($val)=='now()') $v.="NOW(), ";
		else $v.= "'".$this->escape($val)."', ";
	}

	$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";

	if($this->query($q)){
		//$this->free_result();
		return mysql_insert_id($this->link_id);
	}
	else return false;

}#-#query_insert()


#-#############################################
# desc: throw an error message
# param: [optional] any custom error to display
function oops($msg='') {
	if($this->link_id>0){
		$this->error=mysql_error($this->link_id);
		$this->errno=mysql_errno($this->link_id);
	}
	else{
		$this->error=mysql_error();
		$this->errno=mysql_errno();
	}
	?>
		<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
		<tr><th colspan=2>Database Error</th></tr>
		<tr><td align="right" valign="top">Message:</td><td><?php echo $msg; ?></td></tr>
		<?php if(strlen($this->error)>0) echo '<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>'.$this->error.'</td></tr>'; ?>
		<tr><td align="right">Date:</td><td><?php echo date("l, F j, Y \a\\t g:i:s A"); ?></td></tr>
		<tr><td align="right">Script:</td><td><a href="<?php echo @$_SERVER['REQUEST_URI']; ?>"><?php echo @$_SERVER['REQUEST_URI']; ?></a></td></tr>
		<?php if(strlen(@$_SERVER['HTTP_REFERER'])>0) echo '<tr><td align="right">Referer:</td><td><a href="'.@$_SERVER['HTTP_REFERER'].'">'.@$_SERVER['HTTP_REFERER'].'</a></td></tr>'; ?>
		</table>
	<?php
}#-#oops()


}//CLASS Database
###################################################################################################

?>