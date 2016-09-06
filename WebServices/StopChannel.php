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


	$sql = "UPDATE Channel SET Status=0 WHERE IdUser='".$IdUser."'";
	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	$sql = "SELECT * FROM Users WHERE IdUser='".$IdUser."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);

	$sql2 = "UPDATE Channel SET Status=0 WHERE IdUser='".$row['IdUserMQPartner']."'";
	mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
      	
    echo "1";
}
 

  

?>















