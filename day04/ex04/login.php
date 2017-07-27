<?php
session_start();

include('auth.php');

$user = $_POST['login'];
$pass = $_POST['passwd'];

if (auth($user, $pass))
{
	$_SESSION['loggued_on_user'] = $user;
?>
<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
<?php
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
