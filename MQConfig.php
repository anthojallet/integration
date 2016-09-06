<?php



header('Content-Type: text/html;charset=UTF-8');

include ("./conf.inc.php");

function connect()
{
    global $global, $db;
    $db = mysql_connect($global['db_host'], $global['db_user'], $global['db_pass']) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />" . mysql_error() . "</div>");
    $connect = mysql_select_db($global['db_name'], $db) or die ("<div style=\"text-align: center;\">Error ! Database connexion failed<br />Check your database's name<br />" . mysql_error() . "</div>");
}


connect();

if($_COOKIE["Access"]!="OK")
{

  header('Location: ./index.php');
  exit;

}


if($_COOKIE["Active"]=="0")
{

  header('Location: ./Close.php');
  exit;

}

echo "<HTML>";
echo "<HEAD>";
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />'; 
echo '<script type="application/javascript" src="./js/jquery.js"></script>';  
echo '<script src="./js/alertify.min.js"></script>';
echo '<script type="application/javascript" src="./js/integration.js"></script>';  
echo '<link rel="stylesheet" href="./css/alertify.core.css" />';
echo '<link rel="stylesheet" href="./css/alertify.default.css" />';
echo "</HEAD>";       
        
echo "<BODY>";
echo "<div style='margin:0 auto; width:100%;'>";


echo "<div style='text-align:center; z-index:2'><img style='z-index:10; margin-left:0; position:relative; height:150px;' src='./res/bib.png'><img style='position:relative; margin-right:100; z-index:10; height:150px;' src='./res/Title.png'></div>";    			
echo "<div style='color:#000000; height:435px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";


echo "<div style='height:120px; margin-bottom:0;'>";
echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; margin-bottom:30px; font-size:12px; color:#000000;  width:150px; text-align:center;'><img height=45 px src='./res/menu.png'><BR>Menu</div>";
echo "</div>";

    echo "<form action='./integrationLaunchMQ.php' method='post'>";
    echo "<div style='width:100%; text-align:center; position:relative; font-weight:bold; color:#000000; margin-bottom:10px;'>";
    echo "Mon rôle MQ : ";
    echo "<select style='margin-top:1px; margin-right:1px; display:inline-block; height:38px; border-radius:0; border-width:1px; border-color:#ececed; color:#979797; text-align:right; width:180px; font-weight: lighter;' name='Role'>";
    echo "<option value='Sender'>Sender</option>";
    echo "<option value='Receiver'>Receiver</option>";
    echo "</select>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mon binôme MQ : ";
    echo "<select style='margin-top:1px; margin-right:1px; display:inline-block; height:38px; border-radius:0; border-width:1px; border-color:#ececed; color:#979797; text-align:right; width:180px; font-weight: lighter;' name='Binome'>";

	$sql = "SELECT * FROM Users WHERE Active='".$_COOKIE['Active']."' AND IdUser <> '".$_COOKIE["IdUser"]."' ORDER BY UserName;";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
	while($row = mysql_fetch_array($sql_result))
	{
    	echo "<option value='".$row['IdUser']."'>".$row['UserName']."</option>";
	}
    echo "</select>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 	
    echo "<input type='image' style='height:25px; vertical-align:middle;' src='./res/ok.png' alt='Submit'>";   
    echo "</form>";   



echo "</div>";

echo "<script>InitMQ(".$_COOKIE["IdUser"].");</script>";
     	
echo "</BODY>";        
echo "</HTML>";
mysql_close();

?>
































