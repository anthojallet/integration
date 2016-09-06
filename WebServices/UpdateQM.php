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


if (isset($QMName))
{
	$sql = "SELECT * FROM QueueManager WHERE IdUser='".$IdUser."' AND Type='".$Type."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());			        
 
	if (mysql_num_rows($sql_result) == 1)
	{

	  $row = mysql_fetch_array($sql_result);

	  $sql2 = "UPDATE QueueManager SET QMName='".$QMName."', Port='".$Port."', Type='".$Type."', DLQName='".$DLQName."' WHERE IdQM='".$row['IdQM']."'";
	  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	  echo "1";
	}
	else
	{

      $sql2 = "INSERT INTO QueueManager(QMName,Port,DLQName,Type,IdUser) VALUES ('".$QMName."',".$Port.",'".$DLQName."','".$Type."','".$IdUser."')";
      mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());
     					   	
	  echo "1";
	}
}
 

  

?>















