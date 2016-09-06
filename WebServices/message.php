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

 
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
 
// retrieve the table and key from the path
$name = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$value = array_shift($request);
 
// create SQL based on HTTP method
if ($method=='GET')
{
   if ($name<>'')
   {
     $sql = "SELECT * FROM Users WHERE UserName='".$name."'";
   }
   else
   {
     $sql = "SELECT * FROM Users LIMIT 4";   
   }
}
elseif ($method=='PUT')
{

   $ValueUpdated=mysql_real_escape_string(utf8_decode(str_replace('>','&gt;',str_replace('<','&lt;',nl2br($value, false)))));
   $sql = "UPDATE Users SET Message='".$ValueUpdated."' WHERE IdUser='".$_COOKIE['IdUser']."' AND UserName='".$name."'";
}
 

// excecute SQL statement
$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());




if (($method=='PUT')&&(mysql_affected_rows()>0))
{
    echo '&lt;?xml version="1.0" encoding="UTF-8"?&gt;<BR>';
	echo "&lt;Message&gt;";
	echo $value;
	echo "&lt;/Message&gt;<BR>";
}
elseif (($method=='PUT')&&(mysql_affected_rows()==0))
{
	echo "Error : Code Retour 404";
}
elseif (mysql_num_rows($sql_result) == 1)
{

	$row = mysql_fetch_array($sql_result);
    echo '&lt;?xml version="1.0" encoding="UTF-8"?&gt;<BR>';
	echo "&lt;Message&gt;";
    $Message=utf8_encode(str_replace('&gt;','>',str_replace('&lt;','<',nl2br($row['Message'], false))));
	echo $Message;
	echo "&lt;/Message&gt;<BR>";
	
}
else
{
    echo '&lt;?xml version="1.0" encoding="UTF-8"?&gt;<BR>';
	echo "&lt;Messages&gt;<BR>";
	while ($row = mysql_fetch_array($sql_result))
	{
		echo "&lt;UserMessage&gt;<BR>";
		echo "&lt;Name&gt;";
		echo $row['UserName'];
		echo "&lt;/Name&gt;";
		echo "&lt;Message&gt;";
    	$Message=utf8_encode(str_replace('&gt;','>',str_replace('&lt;','<',nl2br($row['Message'], false))));
		echo $Message;
		echo "&lt;/Message&gt;<BR>";
		echo "&lt;/UserMessage&gt;<BR>";
	}
	echo "&lt;/Messages&gt;";
}

 
// close mysql connection
mysqli_close($link);

?>