<?php

Class Color {
	public $red, $green, $blue;
	static $verbose = FALSE;

	function __construct( array $kwargs ) {
		if (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue'])) {
			$this->red = (int)$kwargs['red'];
			$this->green = (int)$kwargs['green'];
			$this->blue = (int)$kwargs['blue'];
		}
		else if (isset($kwargs['rgb'])) {
			$this->red = (int)(($kwargs['rgb'] >> 16) & 0xFF);
			$this->green = (int)(($kwargs['rgb'] >> 8) & 0xFF);
			$this->blue = (int)($kwargs['rgb'] & 0xFF);
		}
		if (self::$verbose)
			echo $this . "constructed.\n";
	}

	function __destruct() {
		if (self::$verbose)
			echo $this . "destructed.\n";
	}

	function __toString() {
		return (sprintf('Color( red: %3d, green: %3d, blue: %3d ) ', $this->red, $this->green, $this->blue));
	}

	static function doc() {
		return (file_get_contents('Color.doc.txt') . "\n");
	}

	function add($kwargs) {
		$new_color = new Color(array(
			'red' => $this->red + $kwargs->red,
			'green' => $this->green + $kwargs->green,
			'blue' => $this->blue + $kwargs->blue));
		return ($new_color);
	}

	function sub($kwargs) {
		$new_color = new Color(array(
			'red' => $this->red - $kwargs->red,
			'green' => $this->green - $kwargs->green,
			'blue' => $this->blue - $kwargs->blue));
		return ($new_color);
	}

	function mult($arg) {
		$new_color = new Color(array(
			'red' => $this->red * $arg,
			'green' => $this->green * $arg,
			'blue' => $this->blue * $arg));
		return ($new_color);
	}
}
?>
