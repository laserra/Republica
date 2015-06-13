package 
{
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.events.Event;
	import flash.events.TimerEvent;
	import flash.utils.Timer;
	import flash.display.LoaderInfo;
	import flash.net.navigateToURL;
	
	import com.greensock.*; 
	import com.greensock.easing.*;
	

	/**
	 * ...
	 * @author Leonel
	 */
	public class Main extends MovieClip
	{
		//private var iniciou:Number = 0; //0-> Não iniciou; 1-> Iniciou
		private var contaFoto:Number=0; //indica a foto a carregar. Inicia com 1 pois carrega duas fotos no inicio
		private var total:Number = 0; //Indica o numero total de fotos
		private var uiActual:Number = 0; 	//0->photo1; 1->photo2
		private var media:Array = new Array();
		private var xmlData:LoadXML;
		private var xml_fileName:String;
		private var link:String;
		
		
		public function Main():void {
			init();
		}
		
		private function init():void {
			getXMLFileName();
		}
		
		/**
		 * Carrega o ficheiro XML a partir do PHP
		 */
		private function getXMLFileName():void {
			var varName:String;
			var paramObj:Object = LoaderInfo(this.root.loaderInfo).parameters;
			for (varName in paramObj) {
				xml_fileName = String(paramObj[varName]);
			}
			
			xmlData = new LoadXML(xml_fileName);
			//txXML.appendText(xml_fileName + ".xml");
			xmlData.addEventListener("XMLLOADED", allLoaded, false, 0, true);
		}
		
		private function allLoaded(evt:Event):void {
			trace("ENTROU ALLLOADED");
			var aux:Array = new Array();
			var mediaContents:XML = xmlData.returnXML();
			var items:uint = mediaContents.foto.length();
			
			for (var i:uint = 0; i < items; i++) {
				aux.push(mediaContents.foto[i].imagem.text());
				aux.push(mediaContents.foto[i].descr.text());
				aux.push(mediaContents.foto[i].creditos.text());
				aux.push(mediaContents.foto[i].link.text());
				media.push(aux);
				trace(aux);
				aux = [];
			}
			//trace("ALLLOADED " + media);
			addEvents();
			
			carregaLista();
			
		}
		
		private function addEvents():void {
			bt_forward.buttonMode = true;
			bt_forward.useHandCursor = true;
			bt_forward.addEventListener(MouseEvent.CLICK, incrementaFoto);
			
			bt_rewind.buttonMode = true;
			bt_rewind.useHandCursor = true;
			bt_rewind.addEventListener(MouseEvent.CLICK, decrementaFoto);
		}
		
		
		//Determina o numero de titulos carregados
		//Chama a função para iniciar o slideshow
		private function carregaLista():void {
			total = media.length;
			iniciaSlideShow();
		}
		
		//Inicializa o slideshow colocando a primeira foto
		function iniciaSlideShow():void {
			photo1.source = media[0][0];
			texto_tx.text = media[0][1];
			autor_tx.text = media[0][2];
			
			if (media[0][3] != "") {
				photo1.buttonMode = true;
				photo1.useHandCursor = true;
				photo1.addEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[0][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
			}
		}
		
		//Incrementa o numero da foto, fazendo esta mudar
		private function incrementaFoto(evt:MouseEvent){
			var aux_nr:Number = verifica_up_foto();
			
			if(uiActual==0){
				photo2.source=media[aux_nr][0];
			}else{
				photo1.source=media[aux_nr][0];
			}
			
			if(uiActual==0){
				TweenMax.to(photo1, 0.5, {autoAlpha:0});
				TweenMax.to(photo2, 0.5, {autoAlpha:1});
				texto_tx.text = media[aux_nr][1];
				autor_tx.text = media[aux_nr][2];
				uiActual = 1;
				
				if (media[aux_nr][3] != "") {
					photo2.buttonMode = true;
					photo2.useHandCursor = true;
					photo2.addEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
				}else if (photo2.hasEventListener(MouseEvent.CLICK)) {
					photo2.removeEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
				}
			
			}else{
				TweenMax.to(photo2, 0.5, {autoAlpha:0});
				TweenMax.to(photo1, 0.5, {autoAlpha:1});
				texto_tx.text = media[aux_nr][1];
				autor_tx.text = media[aux_nr][2];
				uiActual = 0;
				
				if (media[aux_nr][3] != "") {
					photo1.buttonMode = true;
					photo1.useHandCursor = true;
					photo1.addEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
					
				}else if (photo1.hasEventListener(MouseEvent.CLICK)) {
					photo1.removeEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
				}
			}
		}
		
		private function decrementaFoto(evt:MouseEvent){
			var aux_nr:Number = verifica_dn_foto();
			
			if(uiActual==0){
				photo2.source=media[aux_nr][0];
			}else{
				photo1.source=media[aux_nr][0];
			}
			
			if(uiActual==0){
				TweenMax.to(photo1, 0.5, {autoAlpha:0});
				TweenMax.to(photo2, 0.5, {autoAlpha:1});
				texto_tx.text = media[aux_nr][1];
				autor_tx.text = media[aux_nr][2];
				uiActual = 1;
				
				if (media[aux_nr][3] != "") {
					photo2.buttonMode = true;
					photo2.useHandCursor = true;
					photo2.addEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
					
				}else if (photo2.hasEventListener(MouseEvent.CLICK)) {
					photo2.removeEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
				}
			}else{
				TweenMax.to(photo2, 0.5, {autoAlpha:0});
				TweenMax.to(photo1, 0.5, {autoAlpha:1});
				texto_tx.text = media[aux_nr][1];
				autor_tx.text = media[aux_nr][2];
				uiActual = 0;
				
				if (media[aux_nr][3] != "") {
					photo1.buttonMode = true;
					photo1.useHandCursor = true;
					photo1.addEventListener(MouseEvent.CLICK, function(evt:MouseEvent) { var url:String = media[aux_nr][3];
																						var request:URLRequest = new URLRequest(url);
																						try { navigateToURL(request, '_self'); }
																						catch (e:Error) { trace("Error occurred!");
																						} } );
					
				}
			}
		}
		
		private function verifica_up_foto():Number{
			contaFoto+=1;

			if ((contaFoto+1)>total) {
				contaFoto=0;
			}
			return contaFoto;
		}
		
		private function verifica_dn_foto():Number{
			contaFoto-=1;

			if ((contaFoto-1)<=0) {
				contaFoto=0;
			}
			return contaFoto;
		}
	}
	
}