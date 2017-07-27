<?php

$action = $_GET['action'];
$cookie_name = $_GET['name'];
$cookie_value = $_GET['value'];

if (isset($action) && isset($cookie_name))
{
	switch ($action)
	{
	case "set":
		if (isset($cookie_name))
			setcookie($cookie_name, $cookie_value);
		break;
	case "get":
		if (isset($_COOKIE[$cookie_name]))
			echo $_COOKIE[$cookie_name]."\n";
		break;
	case "del":
		setcookie($cookie_name, "", time() - 3600);
		break;
	}
}
?>
