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


$Code=mysql_real_escape_string($Code);

$sql = "SELECT * FROM Users WHERE UserName='".$Pseudo."' AND Password='".$Code."';";
$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
			        
 
if (mysql_num_rows($sql_result) == 1)
{

  $row = mysql_fetch_array($sql_result);

  $sql2 = "UPDATE Users SET LastConnexion=NOW() WHERE IdUser='".$row['IdUser']."'";
  mysql_query($sql2) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

  setcookie("Pseudo",$Pseudo);
  setcookie("IdUser",$row['IdUser']);
  setcookie("Active",$row['Active']);
  setcookie("Belt",$row['Belt']);
  setcookie("Access","OK");
  mysql_close();
  header('Location: ./index.php?Access=OK');
}
else
{
  mysql_close();
  header('Location: ./index.php?Access=KO');
}   
  

?>















