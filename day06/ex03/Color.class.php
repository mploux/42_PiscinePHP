<?php
class Color
{
	public static $verbose = false;

	public $red =	0;
	public $green = 0;
	public $blue =	0;

	public static function doc()
	{
		return (file_get_contents("./Color.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$rgb = $kwargs['rgb'];
			$this->red = (intval($rgb) & 0xff0000) >> 16;
			$this->green = (intval($rgb) & 0xff00) >> 8;
			$this->blue = (intval($rgb) & 0xff);
		}
		else
		{
			if (array_key_exists('red', $kwargs))
				$this->red = intval($kwargs['red']);
			if (array_key_exists('green', $kwargs))
				$this->green = intval($kwargs['green']);
			if (array_key_exists('blue', $kwargs))
				$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose)
			print($this." constructed.".PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this." destructed.".PHP_EOL);
	}

	public function add(Color $rhs)
	{
		return new Color(array(
			'red' => ($this->red + $rhs->red),
			'green' => ($this->green + $rhs->green),
			'blue' => ($this->blue + $rhs->blue)));
	}

	public function sub(Color $rhs)
	{
		return new Color(array(
			'red' => ($this->red - $rhs->red),
			'green' => ($this->green - $rhs->green),
			'blue' => ($this->blue - $rhs->blue)));
	}

	public function mult($f)
	{
		return new Color(array(
			'red' => ($this->red * $f),
			'green' => ($this->green * $f),
			'blue' => ($this->blue * $f)));
	}

	public function __toString()
	{
		return ("Color( red: ".
			str_pad($this->red, 3, ' ', STR_PAD_LEFT).", green: ".
			str_pad($this->green, 3, ' ', STR_PAD_LEFT).", blue: ".
			str_pad($this->blue, 3, ' ', STR_PAD_LEFT)." )");
	}
}
?>
