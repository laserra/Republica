package 
{
	import flash.display.MovieClip;
	
	/**
	 * ...
	 * @author Leonel
	 */
	public class LoadExtSWF extends MovieClip 
	{
		import flash.net.URLRequest;
		import flash.display.Loader;
		import flash.events.Event;
		import flash.events.ProgressEvent;
		
		public function LoadExtSWF(file:String, location:String):void {
			var mLoader:Loader = new Loader();
			var mRequest:URLRequest = new URLRequest("swfs/"+location+"/"+file);
			mLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, onCompleteHandler);
			mLoader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, onProgressHandler);
			mLoader.load(mRequest);
		}
		
		function onCompleteHandler(loadEvent:Event)
		{
			addChild(loadEvent.currentTarget.content);
		}
		
		function onProgressHandler(mProgress:ProgressEvent)
		{
			var percent:Number = mProgress.bytesLoaded/mProgress.bytesTotal;
			trace(percent);
		}
	}
	
}