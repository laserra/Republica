package {
	import flash.display.*
	import flash.events.Event;
	import BubbleTrail
	import flash.geom.Matrix;
	public class BubbleTrailManager extends MovieClip {
		public function BubbleTrailManager():void {
			bubbleDrawBitmapData = new BitmapData(20, 40, false, 0x0000FF)
			bubbleBitmapData = new BitmapData(459, 356, false, 0xff0000)
			bubbleBitmap = new Bitmap(bubbleBitmapData)
			addChild (bubbleBitmap)
			addEventListener(Event.ENTER_FRAME, loop)
			bubbleArray = []
			_bubbleClip = new bubbleClip()
			bubbleMatrix = new Matrix()
		}
		private function loop(event:Event) {
			bubbleBitmapData.lock()
			bubbleBitmapData.fillRect(bubbleBitmapData.rect,0x000033)
			// add a bubble to the mouse location
			if (Math.random()< .5) {
				_bubble = new BubbleTrail(mouseX, mouseY)
				bubbleArray.push(_bubble)
			}
			if (Math.random()< .2) {
				_bubble = new BubbleTrail(Math.random()*459, 356)
				bubbleArray.push(_bubble)
			}
			// render bubbles
			n = bubbleArray.length
			while (n--) {
				_bubble = bubbleArray[n]
				_bubble.manage()
				if (_bubble.kill) {
					_bubble = null
					bubbleArray.splice(n,1)
				}else{
					bubbleMatrix.identity()
					bubbleMatrix.scale(_bubble.bubbleScale,_bubble.bubbleScale)
					bubbleMatrix.translate(_bubble.xLoc,_bubble.yLoc)
					bubbleBitmapData.draw(_bubbleClip, bubbleMatrix)
				}
			}
			bubbleBitmapData.unlock()
		}
		private var bubbleBitmap:Bitmap
		private var bubbleBitmapData:BitmapData
		
		private var bubbleDrawBitmapData:BitmapData
		private var bubbleArray:Array
		private var _bubble:BubbleTrail
		private var _bubbleClip:MovieClip
		private var n:int
		private var bubbleMatrix:Matrix
		
		
	}
}