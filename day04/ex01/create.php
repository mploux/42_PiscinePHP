<?php
if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['passwd']))
{
	if ($_POST['submit'] == "OK")
	{
		$user = $_POST['login'];
		$pass = hash("whirlpool", $_POST['passwd']);
		if (file_exists("../htdocs/private/passwd"))
		{
			$data = unserialize(file_get_contents("../htdocs/private/passwd"));
			foreach ($data as $value)
			{
				if ($value['login'] === $user)
				{
					echo "ERROR\n";
					return (0);
				}
			}
			$new_user = array("login" => $user, "passwd" => $pass);
			$data[] = $new_user;
			file_put_contents("../htdocs/private/passwd", serialize($data));
		}
		else
		{
			$new_user = serialize(array(array("login" => $user, "passwd" => $pass)));
			mkdir("../htdocs/");
			mkdir("../htdocs/private/");
			file_put_contents("../htdocs/private/passwd", $new_user);
		}
		echo "OK\n";
	}
}
else
	echo "ERROR\n";
?>
