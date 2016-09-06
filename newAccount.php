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

extract($_GET);

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


if($_COOKIE["Access"]!="OK")
{
    echo '<script type="application/javascript">setCookie("IdCountNb",30,-1);</script>';  
    echo "<div style='z-index:1; padding-top:10px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; height:200px; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  	echo "<div style='padding-top:20px; padding-bottom:10px; text-align:center; line-height:14px; position:relative; color:#000000;  border-width:1px; border-color:#ececed;'>";  		
    echo "<form action='./integrationNewAccount.php' method='post'>";
    echo "<div style='width:100%; text-align:center; position:relative; font-weight:bold; color:#000000; margin-bottom:10px;'>Mon Identifiant  : <input name='Pseudo' placeholder='ex. : F281796' style='width:100px' type='text'></div>";  	
    echo "<div style='width:100%; text-align:center; position:relative; font-weight:bold; color:#000000; margin-bottom:10px;'>Mon Code d'accès : <input name='Code' placeholder='Mot de passe' style='width:100px' type='password'></div>";  	
    echo "<input type='image' style='height:50px' src='./res/ok.png' alt='Submit'><BR>Créer mon compte";   
    echo "</form>";   
    echo "<a href='./index.php'><font color='blue'>Retour à la page d'authentification</font></a>";

    if ($newAccount=='KO')
    {
 	  echo "<div style='position:relative; font-weight:bold; color:red; padding-top:10px;'>Cet identifiant est déjà pris, choisissez-en un autre !</div>";   
	}
	
    echo "</div>";		 
    echo "</div>";
    echo exit;
}

echo "</BODY>";        
echo "</HTML>";

mysql_close();

?>
































