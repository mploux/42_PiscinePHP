<?php
date_default_timezone_set("Europe/Paris");

if (file_exists("../htdocs/private/chat"))
{
	$data = unserialize(file_get_contents("../htdocs/private/chat"));
	foreach ($data as $value)
	{
		$time = date("H:i", $value['time']);
		$user = $value['login'];
		$msg = $value['msg'];
		echo "[$time] <b>$user</b>: $msg<br />\n";
	}
}
?>
