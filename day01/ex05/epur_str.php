#!/usr/bin/php
<?php
	$result = trim(preg_replace("/\s+/", " ", $argv[1]));
	if ($result)
		echo $result."\n";
?>
