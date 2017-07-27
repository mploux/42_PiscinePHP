#!/usr/bin/php
<?php
if ($argc < 2)
	return (0);
$result = preg_replace("/\s+/", " ", $argv[1]);
$result = preg_replace("/^\s*/", "", $result);
$result = preg_replace("/\s*$/", "", $result);
echo $result."\n";
?>
