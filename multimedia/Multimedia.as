package 
{
	import flash.display.MovieClip;
	import flash.display.LoaderInfo;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	import flash.display.Loader;
	import flash.net.URLRequest;
	
	/**
	 * ...
	 * @author Leonel
	 */
	public class Multimedia extends MovieClip 
	{
		private var xmlData:LoadXML;// = new LoadXML("media_igreja.xml");
		private var extSWF:LoadExtSWF;
		private var media:Array = new Array();
		
		private var currentMedia:Number = 0;
		private var filme:MoviePlay=new MoviePlay();
		private var imagem:ImageLoader;
		private var carregouFilme:uint = 0;
		
		private var xml_fileName:String;
		
		
		
		public function Multimedia():void {
			init();
		}
		
		private function init():void {
			getXMLFileName();
			addChild(filme);
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
			var aux:Array = new Array();
			var mediaContents:XML = xmlData.returnXML();
			var items:uint = mediaContents.entry.length();
			//trace("LENGHT "+mediaContents.entry.length());
			
			for (var i:uint = 0; i < items; i++) {
				aux.push(mediaContents.entry[i].type.text());
				aux.push(mediaContents.entry[i].file.text());
				aux.push(mediaContents.entry[i].width.text());
				aux.push(mediaContents.entry[i].height.text());
				aux.push(mediaContents.entry[i].location.text());
				aux.push(mediaContents.entry[i].title);
				aux.push(mediaContents.entry[i].text);
				aux.push(mediaContents.entry[i].link.text());
				media.push(aux);
				aux = [];
			}
			trace("ALLLOADED " + media);
			addEvents();
			selectMedia();
		}
		
		private function addEvents():void {
			if (media.length == 1) {
				bt_forward.visible = false;
				bt_rewind.visible = false;
			}else {
				bt_forward.addEventListener(MouseEvent.CLICK, nextMedia);
				bt_rewind.addEventListener(MouseEvent.CLICK, prevMedia);
			}
			
		}
		
		private function selectMedia():void {
			//trace("SELECTMEDIA "+media[currentMedia][0]);
			var aux:Number = Number(media[currentMedia][0]);
			
			switch(aux) {
				case 1://Imagem
					tipo_tx.text = "FOTO";
					carregaImagem();
					break;
				case 2://Filme
					tipo_tx.text = "VIDEO";
					carregaFilme();
					break;
				case 3://SWF
					tipo_tx.text = "MEDIA";
					carregaSWF();
					break;
				default:
					break;
			}
			
		}
		
		private function populateText():void {
			//trace(media[currentMedia][5]+"///"+media[currentMedia][6]);
			txtTitulo.text=String(media[currentMedia][5]);
			txtTexto.text=String(media[currentMedia][6]);
			
		}
		private function carregaImagem():void {
			//trace("CARREGAIMAGEM "+media[currentMedia][1]);
			filme.x = 0;
			filme.y = -360;
			imagem = new ImageLoader(media[currentMedia][1], media[currentMedia][4]);
			imagem.x = 0;
			imagem.y = 148.5;
			this.addChild(imagem);
			populateText();
		}
		
		private function carregaFilme():void {
			//trace("CARREGAFILME " + media[currentMedia][1]);
			filme.x = 0;
			filme.y = 148.5;
			filme.loadMovieFile(media[currentMedia][1], media[currentMedia][4]);
			//filme.disableAlpha();
			populateText();
		}
		
		private function carregaSWF():void {
			//trace("CARREGASWF " + media[currentMedia][1]);
			filme.x = 0;
			filme.y = -360;
			//extSWF = new LoadExtSWF(media[currentMedia][1], media[currentMedia][4]);//file, location
			//this.addChild(extSWF);
			//extSWF.width = 881;
			//extSWF.height=356;
			populateText();
			
			var loader:Loader = new Loader();
			var request:URLRequest = new URLRequest("swfs/"+media[currentMedia][4]+"/"+media[currentMedia][1]);
            loader.load(request);
			loader.scaleX = 0.978;
			//loader.scaleY = 0.547;
            addChild(loader);
		}
		
		private function nextMedia(evt:MouseEvent):void {
			var aux:Number = Number(media[currentMedia][0]);
			switch(aux) {
				case 1://Imagem
					//trace("NEXTMEDIA IMAGEM");
					this.removeChild(imagem);
					imagem = null;
					break;
				case 2://Filme
					//trace("NEXTMEDIA FILME");
					filme.stopMovie();
					//filme.enableAlpha();
					break;
				case 3://SWF
					//trace("NEXTMEDIA SWF");
					this.removeChild(extSWF);
					extSWF = null;
					break;
				default:
					break;
			}
			
			currentMedia++;
			
			verificaNumMedia();
			
		}
		
		private function prevMedia(evt:MouseEvent):void {
			var aux:Number = Number(media[currentMedia][0]);
			switch(aux) {
				case 1://Imagem
					//trace("PREVIOUSMEDIA IMAGEM");
					this.removeChild(imagem);
					imagem = null;
					break;
				case 2://Filme
					//trace("PREVIOUSMEDIA FILME");
					this.filme.stopMovie();
					//filme.enableAlpha();
					//this.filme.removeMC();
					break;
				case 3://SWF
					//trace("PREVIOUSMEDIA SWF");
					this.removeChild(extSWF);
					extSWF = null;
					break;
				default:
					break;
			}
			
			currentMedia--;
			
			verificaNumMedia();
		}
		
		private function verificaNumMedia():void {
			//trace("VERIFICANUMMEDIA "+currentMedia+"/"+(media.length-1));
			if (currentMedia > (media.length - 1) || currentMedia < 0) {
				//trace("VERIFICAMEDIA 1");
				currentMedia = 0;
				selectMedia();
			}else {
				//trace("VERIFICAMEDIA 2");
				selectMedia();
			}
		}
	}
	
}