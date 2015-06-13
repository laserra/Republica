package {
	import flash.display.*
	public class BubbleTrail {
		public function BubbleTrail(__x:Number,__y:Number) {
			xLoc = __x
			yLoc = __y
			kill = false
			xVelocity = Math.random()*4-2
			yVelocity = -.5
			
			bubbleScale = Math.random() + .2
			life = 70 * bubbleScale
		}
		public function manage():void {
			xLoc+=xVelocity
			yLoc += yVelocity
			yVelocity *= 1.05
			xVelocity*=.95
			life--
			if (life < 1) {
				kill = true
			}
		}
		public var xLoc:Number
		public var yLoc:Number
		public var xVelocity:Number
		public var yVelocity:Number
		public var life:int
		public var kill:Boolean
		public var bubbleScale:Number 
	}
}