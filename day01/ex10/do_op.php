#!/usr/bin/php
<?php
	function	error($msg)
	{
		echo $msg."\n";
		return (0);
	}

	if ($argc != 4)
		return (error("Incorrect Parameters"));
	$a = trim($argv[1]);
	$b = trim($argv[3]);
	$op = trim($argv[2]);
	switch ($op)
	{
		case "+":
			echo ($a + $b)."\n";
			break;
		case "-":
			echo ($a - $b)."\n";
			break;
		case "/":
			echo ($a / $b)."\n";
			break;
		case "*":
			echo ($a * $b)."\n";
			break;
		case "%":
			echo ($a % $b)."\n";
			break;
	}
	return (0);
?>
