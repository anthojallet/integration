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
 	
      			    
	$sql = "SELECT Queue.TransmissionQueueName FROM Message, Queue WHERE Queue.QueueName=Message.QueueName AND Queue.IdUser=Message.IdUser AND Queue.Type='Remote' AND Message.IdMessage='".$IdMessage."' AND Message.IdUser='".$IdUser."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	if (mysql_num_rows($sql_result) == 1)
	{
		$row = mysql_fetch_array($sql_result);
		$sql = "SELECT * FROM Queue WHERE Queue.QueueName='".$row['TransmissionQueueName']."' AND Usag='Transmission' AND IdUser='".$IdUser."';";
		$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
		if (mysql_num_rows($sql_result) == 1)
		{
			$row = mysql_fetch_array($sql_result);	
			echo $row['IdQueue'];

		    $sql2 = "UPDATE Message SET Step=2, QueueName='".$row['QueueName']."' WHERE IdMessage='".$IdMessage."'";
		    mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
		    

		}
		
	    echo "0";
	  
	}
	else
	{
	  echo "0";
	}
}
 

  

?>