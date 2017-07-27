#!/usr/bin/php
<?php
$fd = fopen($argv[1], "r");

$in_a = false;
$file = "";

while (($line = fgets($fd)) !== false)
	$file .= $line;

if (preg_match_all("/<a.*?>.*?<\/a>/is", $file, $toks))
{
	foreach ($toks[0] as $i)
	{
		if (preg_match_all("/(?:title=(\".*?\"))/is", $i, $j))
			foreach ($j[1] as $k)
				$file = str_replace($k, strtoupper($k), $file);
		if (preg_match_all("/(?:.*?(\>.*?\<).*?)/is", $i, $j))
			foreach ($j[1] as $k)
				$file = str_replace($k, strtoupper($k), $file);
	}
}

echo $file."\n";
?>
