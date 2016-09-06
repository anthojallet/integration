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



if (isset($name))
{

    $sql = "SELECT * FROM Users WHERE IdUser='".$name."'";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    $Message=utf8_encode(str_replace('&gt;','>',str_replace('&lt;','<',nl2br($row['Message'], false))));
//    $Message="toto";
    echo $Message;
}

?>