<?php

abstract class House
{
	public function __construct(){}
	abstract protected function getHouseName();
	abstract protected function getHouseMotto();
	abstract protected function getHouseSeat();

	public function introduce()
	{
		print("House ".static::getHouseName().
		" of ".static::getHouseSeat().
		" : \"".static::getHouseMotto()."\"".PHP_EOL);
	}
}

?>
