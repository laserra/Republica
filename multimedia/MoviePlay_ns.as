package 
{
	import flash.display.MovieClip;
	import fl.video.*;
	import flash.media.Video;
	import flash.net.NetConnection;
	import flash.net.NetStream;
	import flash.events.NetStatusEvent;
	
	/**
	 * ...
	 * @author Leonel
	 */
	public class MoviePlay_ns extends MovieClip
	{
		//public var videoLoader:FLVPlayback = new FLVPlayback();
		
		public var videoLoader:Video = new Video(458.6, 356);
		
		private var nc:NetConnection = new NetConnection();
		private var ns:NetStream = new NetStream(nc);

		public function MoviePlay_ns():void {
			
			nc.connect(null);
			
			this.addChild(videoLoader);
			
			videoLoader.attachNetStream(ns);
			//videoLoader.activeVideoPlayerIndex=1;
			//videoLoader.width = 458.9;
			//videoLoader.height = 356;
			//videoLoader.source = "filmes/"+location+"/"+file;
			//videoLoader.skin = "SkinOverPlayStopSeekMuteVol.swf";
			//videoLoader.skinBackgroundColor = 0x6A4414;
			//videoLoader.skinBackgroundAlpha = 0.5;
			
			//videoLoader.getVideoPlayer(videoLoader.activeVideoPlayerIndex).smoothing = true;
			//videoLoader.skinAutoHide = true;
			//videoLoader.addEventListener(VideoEvent.COMPLETE, completePlay);
			//this.addChild(videoLoader);
		}
		
		public function loadMovieFile(file:String, location:String):void {
			//trace("LOADMOVIEFILE");
			//videoLoader.source = "filmes/" + location + "/" + file;
			//videoLoader.play();
			
			ns.play("filmes/" + location + "/" + file);
			ns.addEventListener(NetStatusEvent.NET_STATUS, netstat);
			
		}
		
		public function netstat(stats:NetStatusEvent)
		{
			trace(stats.info.code);
		}
		
		public function stopMovie():void {
			trace("STOPMOVIE");
			//videoLoader.stop();
			//videoLoader.seekPercent(0);
			//videoLoader.alpha = 0;
			//videoLoader.closeVideoPlayer(1);
		}
		
		public function enableAlpha():void {
			videoLoader.alpha = 0;
		}
		
		public function disableAlpha():void {
			videoLoader.alpha = 1;
		}
		
		public function removeMC():void {
			//this.removeChild(movieContainer);
		}
	}
	
}