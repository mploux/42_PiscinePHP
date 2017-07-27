<?php

require_once('Vertex.class.php');

class Vector
{
	public static $verbose = false;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	public static function doc()
	{
		return (file_get_contents("./Vector.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		$dest = $kwargs['dest'];
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		if (array_key_exists('orig', $kwargs))
			$orig = $kwargs['orig'];
		$this->_x = floatval($dest->getX() - $orig->getX());
		$this->_y = floatval($dest->getY() - $orig->getY());
		$this->_z = floatval($dest->getZ() - $orig->getZ());
		$this->_w = floatval(0.0);
		if (self::$verbose)
			print($this." constructed".PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this." destructed".PHP_EOL);
	}

	public function magnitude()
	{
		return (sqrt(
			$this->getX() * $this->getX() +
			$this->getY() * $this->getY() +
			$this->getZ() * $this->getZ() +
			$this->getW() * $this->getW()
		));
	}

	public function normalize()
	{
		$mag = $this->magnitude();
		return new Vector(array('dest' => new Vertex(array(
			'x' => ($this->getX() / $mag),
			'y' => ($this->getY() / $mag),
			'z' => ($this->getZ() / $mag),
			'w' => ($this->getW() / $mag)
		))));
	}

	public function add(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => ($this->getX() + $rhs->getX()),
			'y' => ($this->getY() + $rhs->getY()),
			'z' => ($this->getZ() + $rhs->getZ()),
			'w' => ($this->getW() + $rhs->getW())
		))));
	}

	public function sub(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => ($this->getX() - $rhs->getX()),
			'y' => ($this->getY() - $rhs->getY()),
			'z' => ($this->getZ() - $rhs->getZ()),
			'w' => ($this->getW() - $rhs->getW())
		))));
	}

	public function opposite()
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => -($this->getX()),
			'y' => -($this->getY()),
			'z' => -($this->getZ()),
			'w' => -($this->getW())
		))));
	}

	public function scalarProduct($k)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => ($this->getX() * $k),
			'y' => ($this->getY() * $k),
			'z' => ($this->getZ() * $k),
			'w' => ($this->getW() * $k)
		))));
	}

	public function dotProduct(Vector $rhs)
	{
		return (
			$this->getX() * $rhs->getX() +
			$this->getY() * $rhs->getY() +
			$this->getZ() * $rhs->getZ() +
			$this->getW() * $rhs->getW());
	}

	public function cos(Vector $rhs)
	{
		$mag = $this->magnitude() * $rhs->magnitude();
		$dot = $this->dotProduct($rhs);
		return ($dot / $mag);
	}

	public function crossProduct(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => ($this->getY() * $rhs->getZ() - $rhs->getY() * $this->getZ()),
			'y' => ($this->getZ() * $rhs->getX() - $rhs->getZ() * $this->getX()),
			'z' => ($this->getX() * $rhs->getY() - $rhs->getX() * $this->getY()),
			'w' => (0.0)
		))));
	}

	public function __toString()
	{
		return ("Vector( x:".number_format((float)$this->getX(), 2, '.', '').
		", y:".number_format((float)$this->getY(), 2, '.', '').
		", z:".number_format((float)$this->getZ(), 2, '.', '').
		", w:".number_format((float)$this->getW(), 2, '.', '')." )");
	}
}
?>
