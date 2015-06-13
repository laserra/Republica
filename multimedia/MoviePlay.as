package 
{
	import flash.display.MovieClip;
	import fl.video.*;
	
	/**
	 * ...
	 * @author Leonel
	 */
	public class MoviePlay extends MovieClip
	{
		public var videoLoader:FLVPlayback = new FLVPlayback();
		
		
		public function MoviePlay():void {
			this.addChild(videoLoader);
			//videoLoader.activeVideoPlayerIndex=1;
			videoLoader.width = 458.9;
			videoLoader.height = 356;
			//videoLoader.source = "filmes/"+location+"/"+file;
			videoLoader.skin = "SkinOverPlayStopSeekMuteVol.swf";
			videoLoader.skinBackgroundColor = 0x6A4414;
			videoLoader.skinBackgroundAlpha = 0.5;
			
			videoLoader.getVideoPlayer(videoLoader.activeVideoPlayerIndex).smoothing = true;
			videoLoader.skinAutoHide = true;
			//videoLoader.addEventListener(VideoEvent.COMPLETE, completePlay);
			this.addChild(videoLoader);
		}
		
		public function loadMovieFile(file:String, location:String):void {
			trace("LOADMOVIEFILE");
			//videoLoader.source = "filmes/" + location + "/" + file;
			videoLoader.play("filmes/" + location + "/" + file);
		}
		
		public function stopMovie():void {
			trace("STOPMOVIE");
			videoLoader.stop();
			videoLoader.seekPercent(0);
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