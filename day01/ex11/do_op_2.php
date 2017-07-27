#!/usr/bin/php
<?php
	function	error($msg)
	{
		echo $msg."\n";
		return (0);
	}

	function	ft_split($text)
	{
		$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
		sort($tokens);
		return ($tokens);
	}

	if ($argc != 2)
		return (error("Incorrect Parameters"));
	$numeric = "[\-\+]*[0-9]+[\.]?[0-9]*[e]*[0-9]*";
	$operator = "[\+\-\*\/\%]";
	if (preg_match("/^\s*($numeric)\s*($operator)\s*($numeric)\s*$/", $argv[1], $toks) == 1)
	{
		$op = $toks[2];
		$a = floatval($toks[1]);
		$b = floatval($toks[3]);
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
	}
	else
		echo "Syntax Error\n";
	return (0);
?>
