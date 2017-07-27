#!/usr/bin/php
<?php
	while (true)
	{
		$fd = fopen("php://stdin", "r");
		echo "Entrez un nombre: ";
		if (($get = fgets($fd)) == NULL)
		{
			echo "\n";
			fclose($fd);
			return ;
		}
		$line = trim($get);
		fclose($fd);
		if (is_numeric($line))
			if ($line % 2 == 0)
				echo "Le chiffre ".$line." est Pair\n";
			else
				echo "Le chiffre ".$line." est Impair\n";
		else
			echo "'".$line."' n'est pas un chiffre\n";
	}
?>
