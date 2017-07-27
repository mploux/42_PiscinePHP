<?php
	function auth($login, $passwd)
	{
		if (file_exists("../htdocs/private/passwd"))
		{
			$data = unserialize(file_get_contents("../htdocs/private/passwd"));
			foreach ($data as $value)
			{
				$pass = hash("whirlpool", $passwd);
				if ($value['login'] === $login && $value['passwd'] === $pass)
					return (true);
			}
		}
		else
			return (false);
	}
?>
