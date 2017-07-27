<?php

class Fighter
{

	private $type;

	public function __construct($name)
	{
		$this->type = $name;
	}

	public function getType()
	{
		return ($this->type);
	}

	public function fight($enemy)
	{
		if ($this->type == "foot soldier")
			print("* draws his sword and runs towards ".$enemy." *".PHP_EOL);
		else if ($this->type == "archer")
			print("* shoots arrows at ".$enemy." *".PHP_EOL);
		else if ($this->type == "assassin")
			print("* creeps behind ".$enemy." and stabs at it *".PHP_EOL);
	}
}

?>
