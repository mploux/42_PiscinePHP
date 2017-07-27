<?php
require_once 'Color.class.php';

class Vertex
{
	public static $verbose = false;

	private $_x = 		0;
	private $_y = 		0;
	private $_z = 		0;
	private $_w = 		1.0;
	private $_color = 	NULL;

	public function getX() { return $this->_x; }
	public function setX($x) { $this->_x = $x; return; }

	public function getY() { return $this->_y; }
	public function setY($y) { $this->_y = $y; return; }

	public function getZ() { return $this->_z; }
	public function setZ($z) { $this->_z = $z; return; }

	public function getW() { return $this->_w; }
	public function setW($w) { $this->_w = $w; return; }

	public function getColor() { return $this->_color; }
	public function setColor(Color $color) { $this->_color = $color; return; }

	public static function doc()
	{
		return (file_get_contents("./Vertex.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		$this->_x = floatval($kwargs['x']);
		$this->_y = floatval($kwargs['y']);
		$this->_z = floatval($kwargs['z']);
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('rgb' => 0xffffff));
		if (self::$verbose)
			print($this." constructed".PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this." destructed".PHP_EOL);
	}

	public function __toString()
	{
		return ("Vertex( x: ".number_format((float)$this->_x, 2, '.', '').
		", y: ".number_format((float)$this->_y, 2, '.', '').
		", z:".number_format((float)$this->_z, 2, '.', '').
		", w:".number_format((float)$this->_w, 2, '.', '').
		"".(self::$verbose ? ", ".$this->_color : "")." )");
	}
}
?>
