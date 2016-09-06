<?php


header('Content-type: text/html; charset=iso-8859-1');

include ("./conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_POST);


 
if (isset($Role))
{

  $sql2 = "UPDATE Users SET MQRole='".$Role."', IdUserMQPartner='".$Binome."' WHERE IdUser='".$_COOKIE["IdUser"]."'";
  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());			        
  
  setcookie("Role",$Role);
  setcookie("Binome",$Binome);
  mysql_close();
  header('Location: ./MQ.php');
}
 
  

?>















