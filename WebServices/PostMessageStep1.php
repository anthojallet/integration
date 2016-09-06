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

    $sql2 = "DELETE FROM Message WHERE IdUser='".$IdUser."';";
    mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());
 	
      			    
	$sql = "SELECT * FROM Queue WHERE IdUser='".$IdUser."' AND Type='Remote' AND QueueName='".$MessageRemoteQueue."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	if (mysql_num_rows($sql_result) == 1)
	{
	
       $sql2 = "INSERT INTO Message(MessageContent,IdUser,Step,QueueName) VALUES ('".$MessageContent."','".$IdUser."',1,'".$MessageRemoteQueue."');";
       mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());

 
	  echo mysql_insert_id();
	  
	}
	else
	{
	  echo "0";
	}
}
 

  

?>