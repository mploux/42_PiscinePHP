#!/usr/bin/php
<?php
	function	ft_split($text)
	{
		$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
		return ($tokens);
	}

	$i = 0;
	$list = array();
	while (++$i < $argc)
	{
		$tokens = ft_split($argv[$i]);
		$j = -1;
		while (++$j < count($tokens))
			array_push($list, $tokens[$j]);
	}
	sort($list);
	$i = -1;
	while (++$i < count($list))
		echo $list[$i]."\n";
?>
