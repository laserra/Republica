package 
{
	import flash.display.MovieClip;
	import fl.containers.UILoader;
	import flash.events.Event;
	
	/**
	 * ...
	 * @author Leonel
	 */
	public class ImageLoader extends MovieClip 
	{	
		private var imgLoader:UILoader = new UILoader();
		
		public function ImageLoader(file:String, location:String):void {
			this.imgLoader.source = "imagens/" + location + "/" + file;
			trace("IMAGELOADER "+this.imgLoader.source);
			this.imgLoader.scaleContent = true;
			
			this.x = 0;
			this.y = 0;
			this.imgLoader.width = 458.9;
			this.imgLoader.height = 356;
			
			imgLoader.addEventListener(Event.COMPLETE, completeHandler);
			this.addChild(imgLoader);
		}
		
		public function completeHandler(event:Event) {
			trace("Number of bytes loaded: " + imgLoader.bytesLoaded);
		}

	}
	
}