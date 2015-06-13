package 
{
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.events.Event;
	import flash.events.TimerEvent;
	import flash.utils.Timer;
	
	import com.greensock.*; 
	import com.greensock.easing.*;
	

	/**
	 * ...
	 * @author Leonel
	 */
	public class Main extends MovieClip
	{
		private var iniciou:Number = 0; //0-> Não iniciou; 1-> Iniciou
		private var contaFoto:Number=0; //indica a foto a carregar. Inicia com 1 pois carrega duas fotos no inicio
		private var total:Number = 0; //Indica o numero total de fotos
		private var uiActual:Number=0; 	//0->photo1; 1->photo2
		
		//Variáveis do XML
		private var xml_fotosLoader:URLLoader = new URLLoader();
		private var xml_FotosData:XML;
		
		//XML das fotos e texto
		private var xml_ficheiro:XMLList;
		private var xml_titulo:XMLList;
		private var xml_texto:XMLList;
		
		//Controlador do tempo de passagem entre fotos 20s.
		//private var myTimer:Timer=new Timer(5000);
		
		
		public function Main():void {
			init();
		}
		
		private function init():void {
			//myTimer.addEventListener(TimerEvent.TIMER, incrementaFoto);
			carregaFotos();
			bt_forward.addEventListener(MouseEvent.CLICK, incrementaFoto);
			bt_rewind.addEventListener(MouseEvent.CLICK, decrementaFoto);
		}
		
		//Carrega os dados a partir do XML
		private function carregaFotos():void {

			xml_fotosLoader.addEventListener(Event.COMPLETE, loadXMLFotos);
			xml_fotosLoader.load(new URLRequest("transportes.xml"));
			
		}
		
		//Acede aos dados presentes no XML
		function loadXMLFotos(evt:Event):void {
			try {
				xml_FotosData=new XML(evt.target.data);
				
				xml_ficheiro=xml_FotosData.foto.imagem;
				xml_titulo=xml_FotosData.foto.titulo;
				xml_texto=xml_FotosData.foto.texto;

				carregaLista();
				xml_fotosLoader.removeEventListener(Event.COMPLETE, loadXMLFotos);
			} catch (err:Error) {
				trace("Ocorreu um erro: não houve leitura do xml.\n"+err.message);
			}
		}
		
		//Determina o numero de titulos carregados
		//Chama a função para iniciar o slideshow
		private function carregaLista():void {
			total=xml_ficheiro.length();
			iniciaSlideShow();
		}
		
		//Inicializa o slideshow colocando a primeira foto
		function iniciaSlideShow():void {
			photo1.source=xml_ficheiro[0];
			txtTitulo.htmlText=xml_titulo[0];
			txtTexto.htmlText=xml_texto[0];
			
			//myTimer.start();
		}
		
		//Incrementa o numero da foto, fazendo esta mudar
		private function incrementaFoto(evt:MouseEvent){
			var aux_nr:Number = verifica_up_foto();
			
			if(uiActual==0){
				photo2.source=xml_ficheiro[aux_nr];
			}else{
				photo1.source=xml_ficheiro[aux_nr];
			}
			
			if(uiActual==0){
				TweenMax.to(photo1, 0.5, {autoAlpha:0});
				TweenMax.to(photo2, 0.5, {autoAlpha:1});
				txtTitulo.htmlText=xml_titulo[aux_nr];
				txtTexto.htmlText=xml_texto[aux_nr];
				uiActual=1;
			}else{
				TweenMax.to(photo2, 0.5, {autoAlpha:0});
				TweenMax.to(photo1, 0.5, {autoAlpha:1});
				txtTitulo.htmlText=xml_titulo[aux_nr];
				txtTexto.htmlText=xml_texto[aux_nr];
				uiActual=0;
			}
		}
		
		private function decrementaFoto(evt:MouseEvent){
			var aux_nr:Number = verifica_dn_foto();
			
			if(uiActual==0){
				photo2.source=xml_ficheiro[aux_nr];
			}else{
				photo1.source=xml_ficheiro[aux_nr];
			}
			
			if(uiActual==0){
				TweenMax.to(photo1, 0.5, {autoAlpha:0});
				TweenMax.to(photo2, 0.5, {autoAlpha:1});
				txtTitulo.htmlText=xml_titulo[aux_nr];
				txtTexto.htmlText=xml_texto[aux_nr];
				uiActual=1;
			}else{
				TweenMax.to(photo2, 0.5, {autoAlpha:0});
				TweenMax.to(photo1, 0.5, {autoAlpha:1});
				txtTitulo.htmlText=xml_titulo[aux_nr];
				txtTexto.htmlText=xml_texto[aux_nr];
				uiActual=0;
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