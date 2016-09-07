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
    echo "<form action='./integrationCheckPassword.php' method='post'>";
    echo "<div style='width:100%; text-align:center; position:relative; font-weight:bold; color:#000000; margin-bottom:10px;'>Pseudonyme  : <input name='Pseudo' placeholder='Pseudonyme' style='width:100px' type='text'></div>";
    echo "<div style='width:100%; text-align:center; position:relative; font-weight:bold; color:#000000; margin-bottom:10px;'>Code d'accès : <input name='Code' placeholder='Code' style='width:100px' type='password'></div>";
    echo "<input type='image' style='height:50px' src='./res/ok.png' alt='Submit'><BR>Valider";
    echo "</form>";
    echo "<a href='./newAccount.php'><font color='blue'>Créer mon compte</font></a>";

    if ($Access=='KO')
    {
 	  echo "<div style='position:relative; font-weight:bold; color:red; padding-top:10px;'>Mauvais code d'accès !</div>";
	}

    echo "</div>";
    echo "</div>";
    echo exit;
}
elseif($Access=="OK")
{

  echo "<script>InfoMessage('Vous êtes connectés en tant que ".$_COOKIE["Pseudo"]."',2);</script>";

}



$sql = "SELECT * FROM Users WHERE IdUser='".$_COOKIE["IdUser"]."';";
$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
$row = mysql_fetch_array($sql_result);


echo "<div style='color:#000000; height:600px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
echo "<div id='DivMenu11' onmouseout='MenuOnMouseOut(11)' onmouseover='MenuOnMouseOver(11)' onclick='window.location=\"Learn.php?Categ=1\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/Learn1.png'><BR>Les Tuyaux</div>";
echo "<div id='DivMenu14' onmouseout='MenuOnMouseOut(14)' onmouseover='MenuOnMouseOver(14)' onclick='window.location=\"Learn.php?Categ=4\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/Learn4.png'><BR>Les Formats d'échange</div>";
echo "<div id='DivMenu13' onmouseout='MenuOnMouseOut(13)' onmouseover='MenuOnMouseOver(13)' onclick='window.location=\"Learn.php?Categ=3\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/Learn3.png'><BR>Les WebServices</div>";
echo "<div id='DivMenu12' onmouseout='MenuOnMouseOut(12)' onmouseover='MenuOnMouseOver(12)' onclick='window.location=\"Learn.php?Categ=2\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/Learn2.png'><BR>EAI, ESB, ETL...</div>";

echo "<BR>";
echo "<BR>";
echo "<BR>";
echo "<BR>";
echo "<BR>";

echo "<div id='DivMenu5' onmouseout='MenuOnMouseOut(5)' onmouseover='MenuOnMouseOver(5)' onclick='window.location=\"Quizz.php?Categ=1\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/QuizR.png'><BR>Les Tuyaux</div>";
echo "<div id='DivMenu8' onmouseout='MenuOnMouseOut(8)' onmouseover='MenuOnMouseOver(8)' onclick='window.location=\"Quizz.php?Categ=4\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/QuizV.png'><BR>Les Formats d'échange</div>";
echo "<div id='DivMenu7' onmouseout='MenuOnMouseOut(7)' onmouseover='MenuOnMouseOver(7)' onclick='window.location=\"Quizz.php?Categ=3\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/QuizB.png'><BR>Les WebServices</div>";
echo "<div id='DivMenu6' onmouseout='MenuOnMouseOut(6)' onmouseover='MenuOnMouseOver(6)' onclick='window.location=\"Quizz.php?Categ=2\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/QuizJ.png'><BR>EAI, ESB, ETL...</div>";
echo "<div id='DivMenu9' onmouseout='MenuOnMouseOut(9)' onmouseover='MenuOnMouseOver(9)' onclick='window.location=\"Classement.php\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100px src='./res/Classement.png'><BR>Classement</div><BR><BR>";

if ($row['Belt1']==null)
{
  $Belt1Color='White';
}
elseif ($row['Belt1']==0)
{
  $Belt1Color='White';
}
elseif ($row['Belt1']==1)
{
  $Belt1Color='Yellow';
}
elseif ($row['Belt1']==2)
{
  $Belt1Color='Orange';
}
elseif ($row['Belt1']==3)
{
  $Belt1Color='Green';
}
elseif ($row['Belt1']==4)
{
  $Belt1Color='Blue';
}
elseif ($row['Belt1']==5)
{
  $Belt1Color='Brown';
}
elseif ($row['Belt1']==6)
{
  $Belt1Color='Black';
}



if ($row['Belt2']==null)
{
  $Belt2Color='White';
}
elseif ($row['Belt2']==0)
{
  $Belt2Color='White';
}
elseif ($row['Belt2']==1)
{
  $Belt2Color='Yellow';
}
elseif ($row['Belt2']==2)
{
  $Belt2Color='Orange';
}
elseif ($row['Belt2']==3)
{
  $Belt2Color='Green';
}
elseif ($row['Belt2']==4)
{
  $Belt2Color='Blue';
}
elseif ($row['Belt2']==5)
{
  $Belt2Color='Brown';
}
elseif ($row['Belt2']==6)
{
  $Belt2Color='Black';
}


if ($row['Belt3']==null)
{
  $Belt3Color='White';
}
elseif ($row['Belt3']==0)
{
  $Belt3Color='White';
}
elseif ($row['Belt3']==1)
{
  $Belt3Color='Yellow';
}
elseif ($row['Belt3']==2)
{
  $Belt3Color='Orange';
}
elseif ($row['Belt3']==3)
{
  $Belt3Color='Green';
}
elseif ($row['Belt3']==4)
{
  $Belt3Color='Blue';
}
elseif ($row['Belt3']==5)
{
  $Belt3Color='Brown';
}
elseif ($row['Belt3']==6)
{
  $Belt3Color='Black';
}


if ($row['Belt4']==null)
{
  $Belt4Color='White';
}
elseif ($row['Belt4']==0)
{
  $Belt4Color='White';
}
elseif ($row['Belt4']==1)
{
  $Belt4Color='Yellow';
}
elseif ($row['Belt4']==2)
{
  $Belt4Color='Orange';
}
elseif ($row['Belt4']==3)
{
  $Belt4Color='Green';
}
elseif ($row['Belt4']==4)
{
  $Belt4Color='Blue';
}
elseif ($row['Belt4']==5)
{
  $Belt4Color='Brown';
}
elseif ($row['Belt4']==6)
{
  $Belt4Color='Black';
}


if ($row['Belt']==null)
{
  $BeltColor='White';
}
elseif ($row['Belt']==0)
{
  $BeltColor='White';
}
elseif ($row['Belt']==1)
{
  $BeltColor='Yellow';
}
elseif ($row['Belt']==2)
{
  $BeltColor='Orange';
}
elseif ($row['Belt']==3)
{
  $BeltColor='Green';
}
elseif ($row['Belt']==4)
{
  $BeltColor='Blue';
}
elseif ($row['Belt']==5)
{
  $BeltColor='Brown';
}
elseif ($row['Belt']==6)
{
  $BeltColor='Black';
}

setcookie("Belt",$row['Belt']);
setcookie("Active",$row['Active']);

echo "<div style='width:170px; height:100px; text-align:center; display:inline-block;'><img id='DivBelt1' width=100px src='./res/".$Belt1Color."Belt.png'></div>";
echo "<div style='width:170px; height:100px; text-align:center; display:inline-block;'><img id='DivBelt4' width=100px px src='./res/".$Belt4Color."Belt.png'></div>";
echo "<div style='width:170px; height:100px; text-align:center; display:inline-block;'><img id='DivBelt3' width=100px px src='./res/".$Belt3Color."Belt.png'></div>";
echo "<div style='width:170px; height:100px; text-align:center; display:inline-block;'><img id='DivBelt2' width=100px px src='./res/".$Belt2Color."Belt.png'></div>";
echo "<div style='width:170px; height:100px; text-align:center; display:inline-block;'><img id='DivBelt5' width=100px px src='./res/".$BeltColor."Belt.png'></div>";

echo "<BR>";

echo "<div id='DivMenu1' onmouseout='MenuOnMouseOut(1)' onmouseover='MenuOnMouseOver(1)' onclick='window.location=\"MQConfig.php\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100 px src='./res/ToolR.png'><BR>MQ</div>";
echo "<div id='DivMenu2' onmouseout='MenuOnMouseOut(2)' onmouseover='MenuOnMouseOver(2)' onclick='window.location=\"WSConfig.php\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100 px src='./res/ToolB.png'><BR>WebServices</div>";
echo "<div id='DivMenu3' onmouseout='MenuOnMouseOut(3)' onmouseover='MenuOnMouseOver(3)' onclick='window.location=\"UseCase.php?NumCase=1\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100 px src='./res/Pen.png'><BR>UseCase 1</div>";
echo "<div id='DivMenu4' onmouseout='MenuOnMouseOut(4)' onmouseover='MenuOnMouseOver(4)' onclick='window.location=\"UseCase.php?NumCase=2\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100 px src='./res/Pen.png'><BR>UseCase 2</div>";
echo "<div id='DivMenu10' onmouseout='MenuOnMouseOut(10)' onmouseover='MenuOnMouseOver(10)' onclick='window.location=\"UseCase.php?NumCase=3\"' style='opacity:0.7; width:170px; height:100px; text-align:center; display:inline-block;'><img height=100 px src='./res/Pen.png'><BR>UseCase 3</div>";

echo "<BR>";
echo "<BR>";
echo "<BR>";
echo "<BR>";

echo "<div onclick='window.location=\"integrationDisconnect.php\"' style='display:inline-block; margin-bottom:30px; font-size:12px; color:#000000;  width:150px; text-align:center;'><img height=45 px src='./res/exit.png'><BR>Logout : ".$_COOKIE["Pseudo"]."</div>";
echo "</div>";

echo "</div>";

echo "<script>MenuOnMouseOut(11);</script>";
echo "<script>MenuOnMouseOut(12);</script>";
echo "<script>MenuOnMouseOut(13);</script>";
echo "<script>MenuOnMouseOut(14);</script>";
echo "<script>MenuOnMouseOut(1);</script>";
echo "<script>MenuOnMouseOut(2);</script>";
echo "<script>MenuOnMouseOut(3);</script>";
echo "<script>MenuOnMouseOut(4);</script>";
echo "<script>MenuOnMouseOut(5);</script>";
echo "<script>MenuOnMouseOut(6);</script>";
echo "<script>MenuOnMouseOut(7);</script>";
echo "<script>MenuOnMouseOut(8);</script>";
echo "<script>MenuOnMouseOut(9);</script>";


echo "</BODY>";
echo "</HTML>";

mysql_close();

?>
