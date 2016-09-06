<?php

// première étape : désactiver le cache lors de la phase de test
ini_set("soap.wsdl_cache_enabled", "0");

// on indique au serveur à quel fichier de description il est lié
$serveurSOAP = new SoapServer('HelloYou.wsdl');

// ajouter la fonction getAddress au serveur
$serveurSOAP->addFunction('getAddress');

// lancer le serveur
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
	$serveurSOAP->handle();
}
else
{
	echo 'désolé, je ne comprends pas les requêtes GET, veuillez seulement utiliser POST';
}

function getAddress($nom)
{

	return $nom." Adress";
}
?>