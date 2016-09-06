<?php




include ("./conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_GET);

if (isset($Active))
{


        	$sql = "UPDATE Users SET Belt_ini=Belt, Belt1_ini=Belt1, Belt2_ini=Belt2, Belt3_ini=Belt3, Belt4_ini=Belt4 WHERE Active=0;";
        	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

        	$sql = "UPDATE Users SET Active='".$Active."' WHERE Active=0 AND Belt_ini IS NOT NULL;";
        	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
        	        	
}
 

  

?>