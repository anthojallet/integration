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

//poster="./video/Integration_CFT.png"

echo '<div style="font-size:12px;">';
echo '<video poster="./video/Integration - Les Tuyaux - 0 - Introduction.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_Tuyaux_Introduction.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_Tuyaux_Introduction.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Tuyaux - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Tuyaux - 1 - CFT.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_Tuyaux_CFT.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_Tuyaux_CFT.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Tuyaux - 1 - CFT.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Tuyaux - 2 - MQ.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_Tuyaux_MQ.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_Tuyaux_MQ.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Tuyaux - 2 - MQ.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Tuyaux - 3 - FTP.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_Tuyaux_FTP.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_Tuyaux_FTP.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Tuyaux - 3 - FTP.pdf">Télécharger le PDF</a>';
echo '</div>';

}
elseif ($Categ=='4')
{ 

echo '<div style="font-size:12px;">';
echo '<video poster="./video/Integration - Les Formats dechange - 0 - Introduction.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_FormatEchange_Introduction.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_FormatEchange_Introduction.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Formats dechange - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Formats dechange - 1 - Masse.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_FormatEchange_Masse.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_FormatEchange_Masse.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Formats dechange - 1 - Masse.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Formats dechange - 2 - Unitaire.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_FormatEchange_Unitaire.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_FormatEchange_Unitaire.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Formats dechange - 2 - Unitaire.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Formats dechange - 3 - ASBO_GBO.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_FormatEchange_ASBOGBO.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_FormatEchange_ASBOGBO.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Formats dechange - 3 - ASBO_GBO.pdf">Télécharger le PDF</a>';
echo '</div>';

}
elseif ($Categ=='3')
{ 
echo '<div style="font-size:12px;">';
echo '<video poster="./video/Integration - Les WebServices - 0 - Introduction.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_WebServices_Introduction.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_WebServices_Introduction.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les WebServices - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les WebServices - 1 - Generalites.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_WebServices_Generalites.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_WebServices_Generalites">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les WebServices - 1 - Generalites.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les WebServices - 2 - SOAP.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_WebServices_SOAP.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_WebServices_SOAP.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les WebServices - 2 - SOAP.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les WebServices - 3 - REST.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_WebServices_REST.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_Tuyaux_FTP.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration_WebServices_REST.mp4">Télécharger le PDF</a>';
echo '</div>';

}
elseif ($Categ=='2')
{ 
echo '<div style="font-size:12px;">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 0 - Introduction.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_EAIESBETL_Introduction.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_EAIESBETL_Introduction.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 1 - EAI-ESB.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_EAIESBETL_EAIESB.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_EAIESBETL_EAIESB.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 1 - EAI-ESB.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 2 - ETL.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_EAIESBETL_ETL.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_EAIESBETL_ETL.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 2 - ETL.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 3 - B2B.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_EAIESBETL_B2B.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_EAIESBETL_B2B.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 3 - B2B.pdf">Télécharger le PDF</a>';
echo '</div>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 4 - MDM.jpg" width="320" height="240" controls="controls">';
echo '<source src="./video/Integration_EAIESBETL_MDM.mp4" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="./download.php?file=./video/Integration_EAIESBETL_MDM.mp4">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 4 - MDM.pdf">Télécharger le PDF</a>';
echo '</div>';
}
echo "</div>";

echo "<BR>";
echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:60px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'><img height=45 px src='./res/menu.png'><BR>Menu</div>";
echo "</div>";

echo "</BODY>";        
echo "</HTML>";
mysql_close();

?>
































