<?php

class NightsWatch
{
	protected $members;

	public function __construct()
	{
		$this->members = array();
	}

	public function recruit($new)
	{
		if ($new instanceof IFighter)
			$this->members[] = $new;
	}

	public function fight()
	{
		foreach ($this->members as $m)
		{
			$m->fight();
		}
	}
}

?>
