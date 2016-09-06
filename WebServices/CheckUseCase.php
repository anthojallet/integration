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

    $resultTab=explode('x',$Result);
    
    
    $sql = "DELETE FROM UsersUseCaseAnswer WHERE IdUser='".$IdUser."' AND IdUseCase='".$NumCase."';";
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
    
        
    $sql = "INSERT UsersUseCaseAnswer(IdUser, IdUseCase, Result) VALUES ('".$IdUser."','".$NumCase."','".$Result."');";
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
       
	
	
	$sql = "SELECT * FROM UseCaseAnswer WHERE IdAnswer='".$resultTab[0]."' AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	
	$total=$total+($row['Val']*6);
	

	$sql = "SELECT * FROM UseCaseAnswer WHERE IdAnswer='".$resultTab[1]."' AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	
	$total=$total+($row['Val']*3);
	
	
	$sql = "SELECT * FROM UseCaseAnswer WHERE IdAnswer='".$resultTab[2]."' AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	
	$total=$total+($row['Val']*1);		


	$sql = "SELECT * FROM UseCaseAnswer WHERE IdAnswer='".$resultTab[3]."' AND IdUseCase='".$NumCase."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
	
	$total=$total+($row['Val']*0);	
    $score=round($total*20/35);

    $sql = "UPDATE UsersUseCaseAnswer SET Note='".$score."' WHERE IdUser='".$IdUser."' AND IdUseCase='".$NumCase."';";
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
       
       
	echo "<Score>";
	echo "<Result>";
 	echo $score;
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