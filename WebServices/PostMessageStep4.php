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
 	
      			    
	$sql = "SELECT RemoteQueueManager, IdUserMQPartner FROM Queue, Users WHERE Users.IdUser= Queue.IdUser AND Queue.IdUser='".$IdUser."' AND Queue.Type='Remote' AND QueueName='".$MessageRemoteQueue."';";

	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	if (mysql_num_rows($sql_result) == 1)
	{
	
	   $row = mysql_fetch_array($sql_result);

   		$sql = "SELECT * FROM QueueManager WHERE Type='Receiver' AND QMName='".$row['RemoteQueueManager']."' AND IdUser='".$row['IdUserMQPartner']."';";
	   	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());


		if (mysql_num_rows($sql_result) == 1)
		{
   	
	   		$sql2 = "UPDATE Message SET Step=4 WHERE IdMessage='".$IdMessage."'";
	   		mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	   		echo "1";
		}
		else
		{
			echo "0";
		}
 
	}
	else
	{
	  echo "0";
	}
}
 

  

?>