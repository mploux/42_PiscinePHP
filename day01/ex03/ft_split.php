<?php
function	ft_split($text)
{
	$tokens = explode(" ", trim(preg_replace("/\s+/", " ", $text)));
	sort($tokens);
	return ($tokens);
}
?>
