<?php

header('Content-type: xml');

// première étape : désactiver le cache lors de la phase de test
ini_set("soap.wsdl_cache_enabled", "0");


$client = new SoapClient("HelloYou.wsdl", array('trace' => 1));
$result = $client->getAddress('Marc');
echo "REQUEST:\n" . $client->__getLastRequest() . "\n";


echo "REPLY:\n" . $client->__getLastResponse() . "\n";

?>