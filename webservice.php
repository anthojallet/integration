<?php

  //on inclut la librairie necessaire pour mettre en place le webservice
  require_once("lib/nusoap.php"); 
  //on initialise un nouvel objet serveur 
  $server = new soap_server();
  // on configure en donnant un nom et un Namespace 
  $server -> configureWSDL('trainingInt','Namespace'); 
  //on spécifie l'emplacement du namespace
  $server -> wsdl->schemaTargetNamespace = 'http://umove.global/integration/soap';

?>
