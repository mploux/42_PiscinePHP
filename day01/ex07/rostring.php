#!/usr/bin/php
<?php
function	ft_split($text)
{
	$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
	return ($tokens);
}
$words = ft_split($argv[1]);
$new = "";
$i = 0;
while (++$i < count($words))
	$new .= $words[$i]." ";
$new .= $words[0];
$argv[1] = $new;
if ($argc > 1)
	echo $argv[1]."\n";
?>
