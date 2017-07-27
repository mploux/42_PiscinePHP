#!/usr/bin/php
<?php
	function	ft_split($text)
	{
		$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
		sort($tokens);
		return ($tokens);
	}

	if ($argc < 3)
		return (0);
	$hash = array(0);
	if (preg_match("/^\s*[0-9A-Za-z]+\s*$/", $argv[1]) != 1)
		return (0);
	$key = preg_replace("/\s*/", "", $argv[1]);
	$i = 1;
	while (++$i < $argc)
	{
		if (preg_match("/^\s*[0-9A-Za-z]+\s*:\s*[0-9A-Za-z]+\s*$/", $argv[$i]) != 1)
			return (0);
		$toks = explode(":", trim(preg_replace("/\s*/", "", $argv[$i])));
		$hash[$toks[0]] = $toks[1];
	}
	if ($hash[$key])
		echo $hash[$key]."\n";
?>
