<?php
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	if ($user === "zaz" && $pass === "jaimelespetitsponeys")
	{
		$img = file_get_contents("../img/42.png");
		$img_64 = 'data:image/png;base64,'.base64_encode($img);
?>
<html><body>
Bonjour Zaz<br />
<img src="<?php echo $img_64; ?>">
</html></body>
<?php
	}
	else
	{
		header('WWW-Authenticate: Basic realm="yolo"');
		header("HTTP/1.0 401 Unauthorized");
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
	}
?>
