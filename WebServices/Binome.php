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

//$IdUser='2';
//$Role='Receiver';

if (isset($IdUser))
{

    echo "<Binome>";
	$sql = "SELECT * FROM Users WHERE IdUser='".$IdUser."';";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());			        
 
	if (mysql_num_rows($sql_result) == 1)
	{
	    $row = mysql_fetch_array($sql_result);
	    
	    if ($Role=='Sender')
	    {
	    
		$sql2 = "SELECT * FROM QueueManager WHERE IdUser='".$row['IdUserMQPartner']."';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<IdQM>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['IdQM'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</IdQM>"; 


		$sql2 = "SELECT * FROM QueueManager WHERE IdUser='".$row['IdUserMQPartner']."';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<QMName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QMName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</QMName>"; 
    	    	
    	
		$sql2 = "SELECT * FROM Queue WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='Local' AND Usag='Normal';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<LocalQueueName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QueueName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</LocalQueueName>";     	
    	


		$sql2 = "SELECT * FROM Queue WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='DLT' AND Usag='Normal';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<DLTQueueName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QueueName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</DLTQueueName>";     	


		$sql2 = "SELECT * FROM Channel WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='Receiver';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<ChannelName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['ChannelName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</ChannelName>";  
    	
    	
    	}
    	else
    	{

		$sql2 = "SELECT * FROM QueueManager WHERE IdUser='".$row['IdUserMQPartner']."';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<IdQM>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['IdQM'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</IdQM>"; 


		$sql2 = "SELECT * FROM QueueManager WHERE IdUser='".$row['IdUserMQPartner']."';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<QMName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QMName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</QMName>"; 
    	    	
    	
		$sql2 = "SELECT * FROM Queue WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='Remote';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<RemoteQueueName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QueueName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</RemoteQueueName>";     	
    	


		$sql2 = "SELECT * FROM Queue WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='Local' AND Usag='Transmission';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<TransmissionQueueName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['QueueName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</TransmissionQueueName>";     	



		$sql2 = "SELECT * FROM Channel WHERE IdUser='".$row['IdUserMQPartner']."' AND Type='Sender';";
		$sql_result2 = mysql_query($sql2) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
   		echo "<ChannelName>"; 		
		if (mysql_num_rows($sql_result2) == 1)
		{
			$row2 = mysql_fetch_array($sql_result2);
			echo $row2['ChannelName'];	
		}
		else
		{
			echo '0';
		}	        
    	echo "</ChannelName>";  
    	
    	    	
    	}
    	
    	    	
    }

    echo "</Binome>"; 
    	
}
 

  

?>















