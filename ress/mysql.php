<?php

require_once('./ress/vars.php');

//echo $_SERVER["DOCUMENT_ROOT"];

if($mysqlPass == '')
{
	try
	{
		$bdd = new PDO('mysql:host='.$mysqlHost.';dbname='.$mysqlDatabase.';charset=utf8', $mysqlUser);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}
else
{
	try
	{
		$bdd = new PDO('mysql:host='.$host.';dbname='.$mysqlDatabase.';charset=utf8', $mysqlUser, $mysqlPass);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}


$bdd->query('CREATE TABLE IF NOT EXISTS '.$tablesPrefix.'registrations'.' (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	registration VARCHAR(50) NOT NULL,
	model VARCHAR(50),
	owner INT
	)');

$bdd->query('CREATE TABLE IF NOT EXISTS '.$tablesPrefix.'users'.' (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30),
	lastname VARCHAR(30),
	email VARCHAR(50),
	username VARCHAR(30),
	phone VARCHAR(30),
	models TEXT
	)');



/*
######## Write Mysql #######

$req = $bdd->prepare('INSERT INTO table (col1, col2) VALUES (:col1, :col2)')

req->execute(array(
'col1' => $col1Val,
'col2' => $col2Val
));

######## Read Mysql ########

$reponse = $bdd->query("SELECT * FROM table ORDER BY [...]")

while($donnees = $reponse->fetch())
{
	$col1Val = donnees['col1'];
	$col2Val = donnees['col2'];
}

$reponse->closeCursor();
*/


?>
