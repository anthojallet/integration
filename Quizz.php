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

  header('Location: ./tradingMenu.php');
  exit;

}

extract($_GET);

echo "<HTML>";
echo "<HEAD>";
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />'; 
echo '<script type="application/javascript" src="./js/jquery.js"></script>';  
echo '<script src="./js/alertify.min.js"></script>';
echo '<script type="application/javascript" src="./js/integration.js"></script>';  
echo '<link rel="stylesheet" href="./css/alertify.core.css" />';
echo '<link rel="stylesheet" href="./css/alertify.default.css" />';
echo '<link rel="stylesheet" href="./css/quizz.css" />';
echo "</HEAD>";       
        
echo "<BODY>";
echo "<div style='margin:0 auto; width:100%;'>";


echo "<div style='text-align:center; z-index:2'><img style='z-index:10; margin-left:0; position:relative; height:150px;' src='./res/bib.png'><img style='position:relative; margin-right:100; z-index:10; height:150px;' src='./res/Title.png'></div>";    			
echo "<div style='color:#000000; height:600px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
echo "<div style='font-size:18px;'>";



if ($Categ=='1')
{ 
  echo "<img height=100px src='./res/QuizR.png'><BR>Les Tuyaux";
}
elseif ($Categ=='2')
{ 
  echo "<img height=100px src='./res/QuizJ.png'><BR>EAI, ESB, ETL...";
}
elseif ($Categ=='3')
{ 
  echo "<img height=100px src='./res/QuizB.png'><BR>Les WebServices";
}
elseif ($Categ=='4')
{ 
  echo "<img height=100px src='./res/QuizV.png'><BR>Les Formats d'échange";
}
echo "</div>";
echo "<BR>";
echo "<BR>";
echo "<div id='DivQuestion' style='font-size:18px;'>";
echo "</div>";
echo "<BR>";
echo '<form onsubmit="initCount()" action="WebServices/SaveQuizz.php" method="post" id="DivAnswer" style="display: inline-block; line-height:27px;" action="#">';
echo '</form>';
echo "<BR>";


echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:60px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'><img height=45 px src='./res/menu.png'><BR>Menu</div>";
echo "<div id='DivReload' onclick='GetQuizz(".$_COOKIE["IdUser"].",".$Categ.",1)' style='display:inline-block; height:60px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>";
echo "<img height=45px src='./res/Reload.png'><BR>Refaire le Quiz";
echo "</div>";
  
echo "</div>";

echo "</div>";

echo "<script>GetQuizz(".$_COOKIE["IdUser"].",".$Categ.",0,".$_COOKIE["Active"].");</script>";


     	
echo "</BODY>";        
echo "</HTML>";
mysql_close();

?>
































