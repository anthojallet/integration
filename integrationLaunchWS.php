<?php


header('Content-type: text/html; charset=iso-8859-1');

include ("./conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}

connect();

extract($_POST);


$Message=mysql_real_escape_string(utf8_decode(str_replace('>','&gt;',str_replace('<','&lt;',nl2br($Message, false)))));
 
if (isset($Message))
{

  $sql2 = "UPDATE Users SET Message='".$Message."' WHERE IdUser='".$_COOKIE["IdUser"]."'";
  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());			        
  
  mysql_close();
  header('Location: ./WebServices.php');
}
 
  

?>















