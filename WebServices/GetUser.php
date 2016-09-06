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

//$IdUser=1;
//$QuestionCateg=1;

if (isset($IdUser))
{


    $sql = "SELECT * FROM Users WHERE IdUser='".$IdUser."'";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
    
              	
    echo "<User>";
       
	if (mysql_num_rows($sql_result) > 0)
	{

       $row = mysql_fetch_array($sql_result);	

       echo "<Belt1>";
       echo $row['Belt1'];
       echo "</Belt1>";

       echo "<Belt2>";
       echo $row['Belt2'];
       echo "</Belt2>";
       
       echo "<Belt3>";
       echo $row['Belt3'];
       echo "</Belt3>";
       
       echo "<Belt4>";
       echo $row['Belt4'];
       echo "</Belt4>";

		  
	}
	else
	{
	      echo "<Error>";
	      echo "1";
	      echo "</Error>";
	}
	
    echo "</User>";
    
}
 

  

?>