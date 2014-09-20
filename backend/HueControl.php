<?php
require( 'hue/hue.php' );

class HueControl
{
	private $hue;
	public function __construct()
	{
		$bridge = '10.0.1.2';
		$key = "newdeveloper";
		$hue = new Hue( $bridge, $key );
		$this->hue = $hue;
	}

	public function reset()
	{
		for ($i = 1; $i < 4; $i++) 
		{
			$command = array();
			$command['on'] = false;
			$command['hue'] = 0;
			$command['bri'] = 100;
			$command['sat'] = 255;
			$command['alert'] = "none";
			$command['effect'] = "none";
			$command['colormode'] = "hs";
			$light = $this->hue->lights()[$i]->setLight($command);
		}
	}

	//lightNumber = int van 1 t/m 3
	//colorHue = Hue of the light. This is a wrapping value between 0 and 65535. 
	//Both 0 and 65535 are red, 25500 is green and 46920 is blue.
	public function setColor($lightNumber, $colorHue)
	{
		$light = $this->hue->lights()[$lightNumber];
		$command = array();
		$command['hue'] = $colorHue;
		$light->setLight($command);
	}

	//lightNumber = int van 1 t/m 3
	public function turnOff($lightNumber)
	{
		$light = $this->hue->lights()[$lightNumber];
		$command = array();
		$command['on'] = false;
		$light->setLight($command);
	}

	//lightNumber = int van 1 t/m 3
	public function turnOn($lightNumber)
	{
		$light = $this->hue->lights()[$lightNumber];
		$command = array();
		$command['on'] = true;
		$light->setLight($command);
	}
}
?>