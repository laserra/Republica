package
{
	import flash.net.URLLoader
	import flash.net.URLRequest
	import flash.xml.XMLDocument;
	import flash.errors.*;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	
	public class LoadXML extends EventDispatcher
	{
		private var loader : URLLoader;
		private var mainXML : XML;
		
		public function LoadXML(file:String) {
			loader = new URLLoader();
			loader.addEventListener(Event.COMPLETE, onComplete);
			loader.load(new URLRequest(file));
		}
		
		private function onComplete(evt:Event)
		{
			try
			{
				mainXML = new XML(loader.data)
				//trace(mainXML);
				dispatchEvent(new Event("XMLLOADED"));
				
			} catch(e:Error)
			{
				trace("Error: " + e.message)
			}
		}
		
		public function returnXML():XML {
			return mainXML;
		}
	}
} 