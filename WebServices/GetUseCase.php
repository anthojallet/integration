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

$IdUser=$_COOKIE['IdUser'];


if (isset($IdUseCase))
{

	
	
	
	
	$sql = "SELECT * FROM UseCase WHERE IdUseCase='".$IdUseCase."';";
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
	  echo "<UseCase>";
	  echo "<UseCaseQuestion>";
	  echo utf8_encode($row['Question']);
	  echo "</UseCaseQuestion>";
	  echo "<UseCaseAnswer1>";
	  echo utf8_encode($row['Answer1']);
	  echo "</UseCaseAnswer1>";
	  echo "<UseCaseAnswer2>";
	  echo utf8_encode($row['Answer2']);
	  echo "</UseCaseAnswer2>";
	  echo "<UseCaseAnswer3>";
	  echo utf8_encode($row['Answer3']);
	  echo "</UseCaseAnswer3>";
	  echo "<UseCaseAnswer4>";
	  echo utf8_encode($row['Answer4']);
	  echo "</UseCaseAnswer4>";
	  
	  $sql = "SELECT * FROM UsersUseCaseAnswer WHERE IdUser='".$IdUser."' AND IdUseCase='".$IdUseCase."';";
	  $sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	  $row = mysql_fetch_array($sql_result);

	  echo "<Result>";
	  echo $row['Result'];
	  echo "</Result>";
	  
	  	
	  echo "</UseCase>";
	  



	}   
	


 
}
  

?>