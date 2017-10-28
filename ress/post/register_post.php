<?php
session_start();
include('./ress/vars.php');
if($_POST['email'] == "")
{
	$_SESSION['complete'] = False;
	header('Location:'.$baseUrl.'/register.php');
}

?>