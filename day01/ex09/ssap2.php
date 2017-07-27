#!/usr/bin/php
<?php
	function	ft_split($text)
	{
		$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
		return ($tokens);
	}

	function	ft_cmp($a, $b)
	{
		$i = -1;
		while ($i < strlen($a) && $i < strlen($b))
		{
			if (ctype_digit($a[$i]) && ctype_alpha($b[$i]))
				return (1);
			if (!ctype_alnum($a[$i]) && ctype_digit($b[$i]))
				return (1);
			if (!ctype_alnum($a[$i]) && ctype_alpha($b[$i]))
				return (1);
			if (ctype_alpha($a[$i]) && ctype_digit($b[$i]))
				return (0);
			if (ctype_digit($a[$i]) && !ctype_alnum($b[$i]))
				return (0);
			if (ctype_alpha($a[$i]) && !ctype_alnum($b[$i]))
				return (0);
			if (strtolower($a[$i]) !== strtolower($b[$i]))
				return strcasecmp($a[$i], $b[$i]);
			$i++;
		}
		if (strlen($a) == strlen($b))
			return (0);
		if (strlen($a) > strlen($b))
			return (1);
		if (strlen($a) < strlen($b))
			return (0);
		return (0);
	}

	function	ft_sort($tab)
	{
		$swap = true;
		while ($swap)
		{
			$swap = false;
			$i = -1;
			while (++$i < count($tab) - 1)
			{
				if (ft_cmp($tab[$i], $tab[$i + 1]) > 0)
				{
					$tmp = $tab[$i];
					$tab[$i] = $tab[$i + 1];
					$tab[$i + 1] = $tmp;
					$swap = true;
				}
			}
		}
		return ($tab);
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
	$list = ft_sort($list);
	$i = -1;
	while (++$i < count($list))
		echo $list[$i]."\n";

?>
