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
//$QuestionCateg=1;

if (isset($IdUser))
{

    echo "<User>";

    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=0";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt0>";
    echo $row['Belt'];
    echo "</Belt0>";

    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=1";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt1>";
    echo $row['Belt'];
    echo "</Belt1>";
    
    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=2";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt2>";
    echo $row['Belt'];
    echo "</Belt2>";
    
    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=3";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt3>";
    echo $row['Belt'];
    echo "</Belt3>";
    
    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=4";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt4>";
    echo $row['Belt'];
    echo "</Belt4>";
    
    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=5";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt5>";
    echo $row['Belt'];
    echo "</Belt5>";
    
    $sql = "SELECT count(*) as Belt FROM Users WHERE Belt=6";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	$row = mysql_fetch_array($sql_result);
    echo "<Belt6>";
    echo $row['Belt'];
    echo "</Belt6>";
	
    echo "</User>";
    
}
 

  

?>