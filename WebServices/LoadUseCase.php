<?php


//header('Content-Type: application/xml');

include ("./../conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_POST);
$total=0;
//$Result='1x2x3x4x';
//$NumCase=1;
//$IdUser=1;


$IdUser=$_COOKIE['IdUser'];

if (isset($NumCase))
{


	$sql = "SELECT * FROM UsersUseCaseAnswer WHERE IdUser='".$IdUser."' AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	       
       
	echo "<Score>";
	echo "<Result>";
 	echo $row['Note'];
    echo "</Result>";
    
	$sql = "SELECT * FROM UseCaseAnswer WHERE Val=4 AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);

	echo "<Answer1>";
 	echo $row['IdAnswer'];
    echo "</Answer1>";
    
    
	$sql = "SELECT * FROM UseCaseAnswer WHERE Val=3 AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);

	echo "<Answer2>";
 	echo $row['IdAnswer'];
    echo "</Answer2>";
    	
	
	$sql = "SELECT * FROM UseCaseAnswer WHERE Val=2 AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	
	echo "<Answer3>";
 	echo $row['IdAnswer'];
    echo "</Answer3>";
    
    	
	$sql = "SELECT * FROM UseCaseAnswer WHERE Val=0 AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);	

	echo "<Answer4>";
 	echo $row['IdAnswer'];
    echo "</Answer4>";
    	
    echo "</Score>";

}   
	


?>