<?php


header('Content-type: text/html; charset=iso-8859-1');

include ("./../conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_POST);


if (isset($IdUser))
{

	  $sql2 = "DELETE FROM QueueManager WHERE IdUser='".$IdUser."'";
	  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	  $sql2 = "DELETE FROM Queue WHERE IdUser='".$IdUser."'";
	  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	  $sql2 = "DELETE FROM Channel WHERE IdUser='".$IdUser."'";
	  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
	  	  	       					   	
	  echo "1";

}
 

  

?>















