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
//$QuestionCateg=2;

if (isset($IdUser))
{

    if($Reload==1)
    {

    	$sql = "SELECT * FROM Question WHERE QuestionCateg='".$QuestionCateg."'";
		$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
		while ($row = mysql_fetch_array($sql_result))
		{

    		$sql2 = "DELETE FROM UsersAnswer WHERE IdQuestion='".$row['IdQuestion']."' AND IdUser='".$IdUser."'";
    		mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());
		}
	    
    }

    $sql = "SELECT * FROM Question a WHERE QuestionCateg='".$QuestionCateg."'";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
    $NbTotalQuestion=mysql_num_rows($sql_result);    
       
	$sql = "SELECT * FROM Question a WHERE QuestionCateg='".$QuestionCateg."' AND NOT EXISTS ( SELECT * FROM UsersAnswer b WHERE a.IdQuestion=b.IdQuestion AND IdUser='".$IdUser."')";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
    $NbQuestionAvailable=mysql_num_rows($sql_result);
       
    echo "<Question>";
    
    echo "<NbTotalQuestion>";
    echo $NbTotalQuestion;
    echo "</NbTotalQuestion>";

    echo "<NbQuestionAvailable>";
    echo $NbTotalQuestion-$NbQuestionAvailable+1;
    echo "</NbQuestionAvailable>";    
    

    
              	
	if ($NbQuestionAvailable > 0)
	{

       $row = mysql_fetch_array($sql_result);	

       echo "<IdQuestion>";
       echo $row['IdQuestion'];
       echo "</IdQuestion>";
       echo "<QuestionLib>";
       echo utf8_encode($row['QuestionLib']);
       echo "</QuestionLib>";
       
       $sql2 = "SELECT * FROM Answer WHERE IdQuestion=".$row['IdQuestion'];
	   $sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	
	   while ($row2 = mysql_fetch_array($sql_result2))
	   {
       	  echo "<Answer>";
	      echo "<IdAnswer>";
	      echo $row2['IdAnswer'];
	      echo "</IdAnswer>";	   
	      echo "<AnswerLib>";
	      echo utf8_encode($row2['AnswerLib']);
	      echo "</AnswerLib>";
          echo "</Answer>";
	   }
		  
	}
	else
	{
	      $Result=0;
		// Parcours de l'ensemble des questions de la catégorie
		  $sql = "SELECT * FROM Question a WHERE QuestionCateg='".$QuestionCateg."'";
	      $sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());

		// Pour chaque question, je vérifie les réponses
	      while ($row = mysql_fetch_array($sql_result))
	      {  
			// Recherche des bonnes réponses mais non présentes dans le choix de l'élève, doit renvoyer 0
		     $sql2 = "SELECT count(*) as Nb FROM Answer a WHERE NOT EXISTS (SELECT * FROM UsersAnswer b WHERE b.IdUser='".$IdUser."' AND b.IdAnswer=a.IdAnswer AND b.IdQuestion=a.IdQuestion AND b.RW=1) AND IdQuestion='".$row['IdQuestion']."' AND RW=1 ORDER BY IdAnswer";
	      	 $sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	      	 $row2 = mysql_fetch_array($sql_result2);
	      	
			// Recherche des réponses de l'élève, mais non présentes dans les bonne réponses, doit renvoyer 0.		    
		     $sql3 = "SELECT  count(*) as Nb  FROM UsersAnswer a WHERE NOT EXISTS (SELECT IdAnswer FROM Answer b WHERE b.IdQuestion=a.IdQuestion AND b.IdAnswer=a.IdAnswer AND b.RW=1) AND IdQuestion='".$row['IdQuestion']."' AND RW=1 AND IdUser='".$IdUser."' ORDER BY IdAnswer";
	      	 $sql_result3 = mysql_query($sql3) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	      	 $row3 = mysql_fetch_array($sql_result3);
	      	

	      	if (($row2['Nb']==0) && ($row3['Nb']==0))
	      	{
	      		$Result=$Result+1;
	      	}
	      	
	      	
	      	$PourcentageOK=($Result/$NbTotalQuestion)*100;
	      	
	      	if ($PourcentageOK<30)
	      	{
	      	  $Belt=0;
	      	}
	      	elseif ($PourcentageOK<50)
	      	{
	      	  $Belt=1;
	      	}
	      	elseif ($PourcentageOK<60)
	      	{
	      	  $Belt=2;
	      	}
	      	elseif ($PourcentageOK<70)
	      	{
	      	  $Belt=3;
	      	}
	      	elseif ($PourcentageOK<80)
	      	{
	      	  $Belt=4;
	      	}
	      	elseif ($PourcentageOK<90)
	      	{
	      	  $Belt=5;
	      	}
	      	else
	      	{
	      	  $Belt=6;
	      	}	      	
	      	

        	$sql = "UPDATE Users SET Belt".$QuestionCateg."='".$Belt."' WHERE IdUser='".$IdUser."'";
        	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

		    $sql3 = "SELECT * FROM Users WHERE IdUser='".$IdUser."'";
	      	$sql_result3 = mysql_query($sql3) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	      	$row3 = mysql_fetch_array($sql_result3);
	      	
	      	$Belt=($row3['Belt1']*2+$row3['Belt2']*2+$row3['Belt3']*2+$row3['Belt4'])/7;
	      	$Belt=explode(".",$Belt);
        	$sql = "UPDATE Users SET Belt='".$Belt[0]."' WHERE IdUser='".$IdUser."'";
        	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

	      	
	      	echo "<Belt>";
	      	echo $PourcentageOK;    
	      	echo "</Belt>"; 	 
	     }
	}
	
	echo "</Question>";
}
 

  

?>