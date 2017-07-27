<?php

require_once('Vertex.class.php');
require_once('Vector.class.php');

class Matrix
{
	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;

	public static $verbose = false;

	public $_matrix = array();

	public static function doc()
	{
		return (file_get_contents("./Matrix.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		if (array_key_exists('preset', $kwargs))
		{
			if ($kwargs['preset'] == self::IDENTITY)
				$this->_matrix = $this->identity();
			else if ($kwargs['preset'] == self::SCALE && array_key_exists('scale', $kwargs))
				$this->_matrix = $this->scale(floatval($kwargs['scale']));
			else if ($kwargs['preset'] == self::RX && array_key_exists('angle', $kwargs))
				$this->_matrix = $this->rotate_x(floatval($kwargs['angle']));
			else if ($kwargs['preset'] == self::RY && array_key_exists('angle', $kwargs))
				$this->_matrix = $this->rotate_y(floatval($kwargs['angle']));
			else if ($kwargs['preset'] == self::RZ && array_key_exists('angle', $kwargs))
				$this->_matrix = $this->rotate_z(floatval($kwargs['angle']));
			else if ($kwargs['preset'] == self::TRANSLATION && array_key_exists('vtc', $kwargs))
				$this->_matrix = $this->translate($kwargs['vtc']);
			else if ($kwargs['preset'] == self::PROJECTION 	&& array_key_exists('fov', $kwargs)
														&& array_key_exists('ratio', $kwargs)
														&& array_key_exists('near', $kwargs)
														&& array_key_exists('far', $kwargs))
				$this->_matrix = $this->perspective(floatval($kwargs['fov']),
												floatval($kwargs['ratio']),
												floatval($kwargs['near']),
												floatval($kwargs['far']));
			else
				$this->_matrix = array(
					0.0, 0.0, 0.0, 0.0,
					0.0, 0.0, 0.0, 0.0,
					0.0, 0.0, 0.0, 0.0,
					0.0, 0.0, 0.0, 0.0
				);
		}
	}

	public function __destruct()
	{
		if (self::$verbose)
		 	print("Matrix instance destructed".PHP_EOL);
	}

	public function mult(Matrix $rhs)
	{
		$mat = new Matrix(array('preset' => 0));
		$j = 0;
		while ($j < 4)
		{
			$i = 0;
			while ($i < 4)
			{
				$mat->_matrix[$j + $i * 4] = 0.0;
				 $mat->_matrix[$j + $i * 4] = (floatval($this->_matrix[0 + $i * 4]) * floatval($rhs->_matrix[$j + 0 * 4])) +
				  							(floatval($this->_matrix[1 + $i * 4]) * floatval($rhs->_matrix[$j + 1 * 4])) +
				 							(floatval($this->_matrix[2 + $i * 4]) * floatval($rhs->_matrix[$j + 2 * 4])) +
				 							(floatval($this->_matrix[3 + $i * 4]) * floatval($rhs->_matrix[$j + 3 * 4]));
				$i++;
			}
			$j++;
		}
		return $mat;
	}

	public function transformVertex(Vertex $vtx)
	{
		$result = new Vertex(array(
			'x' => $this->_matrix[0] * $vtx->getX() + $this->_matrix[1] * $vtx->getY() + $this->_matrix[2] * $vtx->getZ() + $this->_matrix[3] * $vtx->getW(),
			'y' => $this->_matrix[4] * $vtx->getX() + $this->_matrix[5] * $vtx->getY() + $this->_matrix[6] * $vtx->getZ() + $this->_matrix[7] * $vtx->getW(),
			'z' => $this->_matrix[8] * $vtx->getX() + $this->_matrix[9] * $vtx->getY() + $this->_matrix[10] * $vtx->getZ() + $this->_matrix[11] * $vtx->getW(),
			'w' => $this->_matrix[12] * $vtx->getX() + $this->_matrix[13] * $vtx->getY() + $this->_matrix[14] * $vtx->getZ() + $this->_matrix[15] * $vtx->getW()
		));
		return ($result);
	}

	private function identity()
	{
		if (self::$verbose)
			print("Matrix IDENTITY instance constructed".PHP_EOL);
		return array(
			1.0, 0.0, 0.0, 0.0,
			0.0, 1.0, 0.0, 0.0,
			0.0, 0.0, 1.0, 0.0,
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function scale($s)
	{
		if (self::$verbose)
			print("Matrix SCALE preset instance constructed".PHP_EOL);
		return array(
			$s, 0.0, 0.0, 0.0,
			0.0, $s, 0.0, 0.0,
			0.0, 0.0, $s, 0.0,
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function translate(Vector $v)
	{
		if (self::$verbose)
			print("Matrix TRANSLATION preset instance constructed".PHP_EOL);
		return array(
			1.0, 0.0, 0.0, $v->getX(),
			0.0, 1.0, 0.0, $v->getY(),
			0.0, 0.0, 1.0, $v->getZ(),
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function rotate_x($a)
	{
		if (self::$verbose)
			print("Matrix Ox ROTATION preset instance constructed".PHP_EOL);
		return array(
			1.0, 0.0, 0.0, 0.0,
			0.0, cos($a), -sin($a), 0.0,
			0.0, sin($a), cos($a), 0.0,
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function rotate_y($a)
	{
		if (self::$verbose)
			print("Matrix Oy ROTATION preset instance constructed".PHP_EOL);
		return array(
			cos($a), 0.0, sin($a), 0.0,
			0.0, 1.0, 0.0, 0.0,
			-sin($a), 0.0, cos($a), 0.0,
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function rotate_z($a)
	{
		if (self::$verbose)
			print("Matrix Oz ROTATION preset instance constructed".PHP_EOL);
		return array(
			cos($a), -sin($a), 0.0, 0.0,
			sin($a), cos($a), 0.0, 0.0,
			0.0, 0.0, 1.0, 0.0,
			0.0, 0.0, 0.0, 1.0
		);
	}

	private function perspective($fov, $ratio, $near, $far)
	{
		if (self::$verbose)
			print("Matrix PROJECTION preset instance constructed".PHP_EOL);
		$tfov = tan(deg2rad($fov) / 2.0);
		return array(
			1.0 / ($ratio * $tfov), 0.0, 0.0, 0.0,
			0.0, 1.0 / $tfov, 0.0, 0.0,
			0.0, 0.0, -($far + $near) / ($far - $near), -(2.0 * $far * $near) / ($far - $near),
			0.0, 0.0, -1.0, 0.0
		);
	}

	public function __toString()
	{
		$p =
		"M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | ".
		number_format((float)$this->_matrix[0], 2, '.', '')." | ".
		number_format((float)$this->_matrix[1], 2, '.', '')." | ".
		number_format((float)$this->_matrix[2], 2, '.', '')." | ".
		number_format((float)$this->_matrix[3], 2, '.', '')."\ny | ".
		number_format((float)$this->_matrix[4], 2, '.', '')." | ".
		number_format((float)$this->_matrix[5], 2, '.', '')." | ".
		number_format((float)$this->_matrix[6], 2, '.', '')." | ".
		number_format((float)$this->_matrix[7], 2, '.', '')."\nz | ".
		number_format((float)$this->_matrix[8], 2, '.', '')." | ".
		number_format((float)$this->_matrix[9], 2, '.', '')." | ".
		number_format((float)$this->_matrix[10], 2, '.', '')." | ".
		number_format((float)$this->_matrix[11], 2, '.', '')."\nw | ".
		number_format((float)$this->_matrix[12], 2, '.', '')." | ".
		number_format((float)$this->_matrix[13], 2, '.', '')." | ".
		number_format((float)$this->_matrix[14], 2, '.', '')." | ".
		number_format((float)$this->_matrix[15], 2, '.', '');
		return ($p);
	}
}

?>
