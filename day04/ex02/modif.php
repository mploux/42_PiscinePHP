<?php
if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw']))
{
	if ($_POST['submit'] == "OK")
	{
		$user = $_POST['login'];
		$pass = hash("whirlpool", $_POST['oldpw']);
		if (file_exists("../htdocs/private/passwd"))
		{
			$data = unserialize(file_get_contents("../htdocs/private/passwd"));
			foreach ($data as $i => $value)
			{
				if ($value['login'] === $user && $value['passwd'] === $pass && $_POST['newpw'])
				{
					$data[$i]['passwd'] = hash("whirlpool", $_POST['newpw']);
				}
				else
				{
					echo "ERROR\n";
					return (0);
				}
			}
			file_put_contents("../htdocs/private/passwd", serialize($data));
			echo "OK\n";
		}
		else
		{
			echo "ERROR\n";
			return (0);
		}
	}
}
else
	echo "ERROR\n";
?>
