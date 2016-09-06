<?php


header('Content-Type: application/xml');

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


	$sql = "SELECT * FROM Message, Users WHERE Users.IdUserMQPartner=Message.IdUser AND Users.IdUser='".$IdUser."' ORDER BY IdMessage DESC;";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	if (mysql_num_rows($sql_result) == 0)
	{
	  echo "<Message>";
 	  echo "<Error>";
 	  echo "0";
      echo "</Error>";
      echo "</Message>";
	}
	else
	{
	
	  $row = mysql_fetch_array($sql_result);
	  echo "<Message>";
	  echo "<MessageContent>";
	  echo $row['MessageContent'];
	  echo "</MessageContent>";
	  echo "<Step>";
	  echo $row['Step'];
	  echo "</Step>";
	  echo "</Message>";
	  
	  	$sql2 = "DELETE FROM Message WHERE IdMessage='".$row['IdMessage']."';";
        mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());


	}   
	


 
}
  

?>