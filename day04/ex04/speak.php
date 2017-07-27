<?php
session_start();
date_default_timezone_set("Europe/Paris");

if (!isset($_SESSION['loggued_on_user']))
{
	echo "ERROR\n";
	return (0);
}
if (isset($_POST['submit']) && isset($_POST['msg']))
{
	if ($_POST['submit'] == "OK" && $_POST['msg'])
	{
		$user = $_SESSION['loggued_on_user'];
		$msg = $_POST['msg'];
		$time = time();
		if (file_exists("../htdocs/private/chat"))
		{
			$data = unserialize(file_get_contents("../htdocs/private/chat"));
			$new_msg = array("login" => $user, "time" => $time, "msg" => $msg);
			$data[] = $new_msg;
			file_put_contents("../htdocs/private/chat", serialize($data), LOCK_EX);
		}
		else
		{
			$new_msg = serialize(array(array("login" => $user, "time" => $time, "msg" => $msg)));
			file_put_contents("../htdocs/private/chat", $new_msg, LOCK_EX);
		}
	}
	else
	{
		echo "ERROR\n";
		return (0);
	}
}
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<form method="POST" action="speak.php">
	<input type="text" name="msg" />
	<input type="submit" name="submit" value="OK" />
</form>
</html>
