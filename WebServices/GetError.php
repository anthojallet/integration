<?php


header('Content-Type: text/html;charset=UTF-8');

include ("./../conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_POST);

$IdUser=15;
//$QuestionCateg=2;

if (isset($IdUser))
{

	      $Result=0;
		// Parcours de l'ensemble des questions de la catégorie
		  $sql = "SELECT * FROM Question";
	      $sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());

		// Pour chaque question, je vérifie les réponses
	      while ($row = mysql_fetch_array($sql_result))
	      {  
		     $sql3 = "SELECT * FROM UsersAnswer a WHERE NOT EXISTS (SELECT IdAnswer FROM Answer b WHERE b.IdQuestion=a.IdQuestion AND b.IdAnswer=a.IdAnswer AND b.RW=1) AND IdQuestion='".$row['IdQuestion']."' AND RW=1 AND IdUser='".$IdUser."' ORDER BY IdAnswer";
	      	 $sql_result3 = mysql_query($sql3) or die ('Erreur '.mysql_errno().' : ' . mysql_error());

	      	 
	      	 if (mysql_num_rows($sql_result3) > 0)
	      	 {

	      	    echo '<BR>';
	      	    echo utf8_encode($row['QuestionLib']);
	      	    echo ' : <BR>';
	      	 
	      	 	while ($row3 = mysql_fetch_array($sql_result3))
	      		{
	      	 
	      	    $sql4 = "SELECT * FROM Answer WHERE IdAnswer='".$row3['IdAnswer']."'";
	      	    $sql_result4 = mysql_query($sql4) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	      	    $row4 = mysql_fetch_array($sql_result4);
	      	    
	      	    echo '-'.utf8_encode($row4['AnswerLib']).'<BR>';
	      	 
	      	  	}
	      	 
	      	 } 
	      	  
		     $sql2 = "SELECT * FROM Answer a WHERE NOT EXISTS (SELECT * FROM UsersAnswer b WHERE b.IdUser='".$IdUser."' AND b.IdAnswer=a.IdAnswer AND b.IdQuestion=a.IdQuestion AND b.RW=1) AND IdQuestion='".$row['IdQuestion']."' AND RW=1 ORDER BY IdAnswer";
	      	 $sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());	      	  

	      	 if (mysql_num_rows($sql_result2) > 0)
	      	 {

				if (mysql_num_rows($sql_result3) == 0)
				{
	      	    echo '<BR>';
	      	    echo utf8_encode($row['QuestionLib']);
	      	    echo ' : <BR>';
	      	    } 
	      	    
	      	 	while ($row2 = mysql_fetch_array($sql_result2))
	      		{
	      	 
	      	    $sql4 = "SELECT * FROM Answer WHERE IdAnswer='".$row2['IdAnswer']."'";
	      	    $sql_result4 = mysql_query($sql4) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	      	    $row4 = mysql_fetch_array($sql_result4);
	      	    
	      	    echo '- Bonne réponse absente : '.utf8_encode($row4['AnswerLib']).'<BR>';
	      	 
	      	  }
	      	  
	      	  	      		 
	      	}

	     }

}
 

  

?>