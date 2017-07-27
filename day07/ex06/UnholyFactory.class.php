<?php

class UnholyFactory
{

	private $absorbed;
	private $fabricated;

	public function __construct()
	{
		$this->absorbed = array();
	}

	public function absorb($solder)
	{
		if ($solder instanceof Fighter)
		{
			if (!$this->absorbed[$solder->getType()])
			{
				print("(Factory absorbed a fighter of type ".$solder->getType().")".PHP_EOL);
				$this->absorbed[$solder->getType()] = $solder;
			}
			else
			{
				print("(Factory already absorbed a fighter of type ".$solder->getType().")".PHP_EOL);
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
		}
	}

	public function fabricate($type)
	{
		if ($this->absorbed[$type])
		{
			print("(Factory fabricates a fighter of type ".$type.")".PHP_EOL);
			$this->fabricated[$type] = $type;
			return (new Fighter($type));
		}
		else
		{
			print("(Factory hasn't absorbed any fighter of type ".$type.")".PHP_EOL);
		}
	}
}

?>
