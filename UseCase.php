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
 
echo '<script src="./js/alertify.min.js"></script>';
echo '<script type="application/javascript" src="./js/integration.js"></script>';  
echo '<link rel="stylesheet" href="./css/alertify.core.css" />';
echo '<link rel="stylesheet" href="./css/alertify.default.css" />';
echo '<script src="./lib/prototype.js" type="text/javascript"></script>';
echo '<script src="./src/scriptaculous.js" type="text/javascript"></script>';
echo '<script type="application/javascript" src="./js/jquery.js"></script>'; 

echo '<script>';
echo 'jQuery.noConflict();';
echo '</script>';
   
   
echo "</HEAD>";       
        
echo "<BODY>";
echo "<div style='margin:0 auto; width:100%;'>";




echo "<div style='text-align:center; z-index:2'><img style='z-index:10; margin:0; position:relative; height:150px;' src='./res/bib.png'><img style='position:relative; margin-right:100; z-index:10; height:150px;' src='./res/Title.png'></div>";    			
echo "<div style='color:#000000; height:700px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";

  echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:50px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Menu<BR><img height=45 px src='./res/menu.png'></div>";



    
    echo "<BR>";
    echo "<BR>";
    echo "<BR>";
    
    echo "<div id='DivSOAP'>";
    echo "<div id='DivSubmitCountCase' style='width:100%; text-align:center; position:relative; color:#000000; margin-bottom:10px;'>";
    echo "<B>ETUDE DE CAS N°".$NumCase." : 600 secondes restantes</B>";   
	echo "</div>";    

  echo "<div style='width:100%; align:center;'>";
  
  echo "<div style='height:250px; align:center; display:inline-block; margin-left:0, margin-right:0; width:1300px;'>";
  
	echo "<div id='DivQuestion' style='float:left; text-align: justify; text-justify: inter-word; font-size:16px; margin-left:10%; padding-top:5px; padding-left:5px; background-color:#FFFFFF; width:450px; height:500px; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#000000;'>";
	echo "Problème à résoudre :<BR><BR>";
	echo "</div>";

	echo "<div id='DivConsole' style='margin-right:5px; float:left; display:inline-block;  text-align:center; padding-top:5px; padding-left:5px; width:200px; height:500px; align:center; '>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<ul id='ListSol' style='display:none; margin:0; list-style:none'>";
    echo "<li onclick='selectSol(".$NumCase.",1)' id='sol_1x' style='margin-left:0; font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; width:120px;'>";
    echo "Sol. 1";
    echo "</li>";

    echo "<li onclick='selectSol(".$NumCase.",2)' id='sol_2x' style='margin-left:0; font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; width:120px;'>";
    echo "Sol. 2";
    echo "</li>";

    echo "<li onclick='selectSol(".$NumCase.",3)' id='sol_3x' style=' margin-left:0; font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; width:120px;'>";
    echo "Sol. 3";
    echo "</li>";
    
    echo "<li onclick='selectSol(".$NumCase.",4)' id='sol_4x' style=' margin-left:0; font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; width:120px;'>";
    echo "Sol. 4";
    echo "</li>";
    echo "</ul>";        

    echo "<BR>";
    echo "<BR>";
        
    echo "<div id='DivLaunch'>";
	echo "<img onclick='launchUseCase(".$NumCase.")' src='./res/play.png' width=50px>";
	echo "<BR><BR>Lancer l'étude<BR>";
    echo "</div>";
    
    echo "<div id='DivSave' style='display:none'>";
	echo "<img onclick='saveUseCase(".$NumCase.")' src='./res/ok.png' width=50px>";
	echo "<BR><BR>Terminer<BR>";
    echo "</div>";
    
        
	echo "</div>";
	
	echo "<div id='DivAnswer' style='margin-right:5px; float:left; text-align: justify; text-justify: inter-word; font-size:16px; display:inline-block;  padding-top:5px; padding-left:5px; background-color:#FFFFFF; width:450px; height:500px; align:center; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#000000;'>";
	echo "Solution proposée :";
 	echo "</div>";
 	
 	   
	    
	echo "</div>";

	echo "</div>";

	echo "</div>";
	echo "</div>";




  


echo "<BR>";
echo "<BR>";
echo "<BR>";
echo "<BR>";


echo "</div>";

echo "</div>";


     	
echo "</BODY>";        
echo "</HTML>";
mysql_close();

?>
































