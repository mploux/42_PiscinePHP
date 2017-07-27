<?php

class Lannister
{
	protected function getName() {}

	public function sleepWith($person)
	{
		if (static::getName() == "Jaime" && $person instanceof Tyrion)
			print("Not even if I'm drunk !".PHP_EOL);
		if (static::getName() == "Jaime" && $person instanceof Sansa)
			print("Let's do this.".PHP_EOL);
		if (static::getName() == "Jaime" && $person instanceof Cersei)
			print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
		if (static::getName() == "Tyrion" && $person instanceof Jaime)
			print("Not even if I'm drunk !".PHP_EOL);
		if (static::getName() == "Tyrion" && $person instanceof Sansa)
			print("Let's do this.".PHP_EOL);
		if (static::getName() == "Tyrion" && $person instanceof Cersei)
			print("Not even if I'm drunk !".PHP_EOL);
	}
}

?>
