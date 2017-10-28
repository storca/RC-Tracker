<?php

include("./ress/mysql.php");
include('./ress/vars.php');

function newModel($bdd, $prefix, $owner = 0, $model = "Not specified", $length = 6, $enableCheck = True)
{
	$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$charactersLength = strlen($characters);
	$immatriculation = "RC-";

	$status = True; //Where there is two times the same immatriculation

	while($status)
	{
		for ($i=0; $i < $length; $i++) { 
			$immatriculation .= $characters[rand(0, $charactersLength - 1)];
		}
		$reponse = $bdd->query('SELECT * FROM registrations');
		if($enableCheck)
		{
			while($donnees = $reponse->fetch())
			{
				if($donnees['immatriculation'] == $immatriculation)
				{
					$status = True;
				}
				else
				{
					$status = False;
				}
			}
			$reponse->closeCursor();
		}
		$status = False;
	}
	$req = $bdd->prepare('INSERT INTO '.$prefix.'registrations(registration, model, owner) VALUES(:registration, :model, :owner)');
	$req->execute(array(
		'registration' => $immatriculation,
		'model' => $model,
		'owner' => $owner
		));
	return $immatriculation;
}

?>