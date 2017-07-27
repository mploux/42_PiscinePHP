<?php
session_start();

include('auth.php');

$user = $_GET['login'];
$pass = $_GET['passwd'];

if (auth($user, $pass))
{
	$_SESSION['loggued_on_user'] = $user;
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
