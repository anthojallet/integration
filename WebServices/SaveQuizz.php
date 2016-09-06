<?php



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



extract($_POST);

if (isset($IdQuestion))
{


    $sql = "DELETE FROM UsersAnswer WHERE IdQuestion='".$IdQuestion."' AND IdUser='".$IdUser."'";
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

    $sql = "SELECT * FROM Answer WHERE IdQuestion='".$IdQuestion."'";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	while ($row = mysql_fetch_array($sql_result))
	{	
        

      	if ($_POST[$row['IdAnswer']]=='on')
      	{
      	
         $sql = "INSERT INTO UsersAnswer(IdQuestion, IdAnswer, IdUser, RW) VALUES ('".$IdQuestion."', '".$row['IdAnswer']."', '".$IdUser."', 1)";
         mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

      	}
      	else
      	{
       
         $sql = "INSERT INTO UsersAnswer(IdQuestion, IdAnswer, IdUser, RW) VALUES ('".$IdQuestion."', '".$row['IdAnswer']."', '".$IdUser."', 0)";
         mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

      	}



	}
	
	$sql = "SELECT * FROM Question WHERE IdQuestion='".$IdQuestion."'";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
    $row = mysql_fetch_array($sql_result);

    header ('location:./../Quizz.php?Categ='.$row['QuestionCateg']);
    

	
}



  

?>