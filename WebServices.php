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




echo "<div style='text-align:center; z-index:2'><img style='z-index:10; margin:0; position:relative; height:150px;' src='./res/bib.png'><img style='position:relative; margin-right:100; z-index:10; height:150px;' src='./res/Title.png'></div>";    			
echo "<div style='color:#000000; height:600px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";

  echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:50px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Menu<BR><img height=45 px src='./res/menu.png'></div>";


    echo "<div onclick='switchWS(\"SOAP\")' id='DivSwitchWSSOAP' style='font-weight:bold; color:white; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:red; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:inset; display:inline-block; width:200px;'>";
    echo "SOAP";
    echo "</div>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<div onclick='switchWS(\"REST\")' id='DivSwitchWSREST' style='font-weight:bold; color:gray; font-size:24px; cursor:pointer; line-height:30px; height:30px;  background-color:blue; border-radius: 5px 5px 5px 5px; border-color:#OOOOOO; border-width:1px; border-style:outset; display:inline-block; width:200px;'>";
    echo "RESTFul";
    echo "</div>";
    
    echo "<BR>";
    echo "<BR>";
    echo "<BR>";
    
    echo "<div id='DivSOAP'>";
    echo "<div style='width:100%; text-align:center; position:relative; color:#000000; margin-bottom:10px;'>";
    echo "<B>Adresse du WebService : </B>http://www.umove.global/integration/WebServices/GetMessage.php";   
	echo "</div>";    

  echo "<div style='width:100%; align:center;'>";
  
  echo "<div style='height:250px; align:center; display:inline-block; margin-left:0, margin-right:0; width:1300px;'>";
  
	echo "<div id='DivConsole' style='float:left; margin-left:10%; text-align:left; padding-top:5px; padding-left:5px; background-color:#000000; width:450px; height:280px; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#0eaa03;'>";
	echo "/* Message à envoyer au WebService depuis votre PC*/<BR><BR>";

    echo '&lt;?xml version="1.0" encoding="UTF-8"?&gt;<BR>';
    echo '<B>&lt;SOAP-ENV:Envelop</B><BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:ns1="urn:HelloYou"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:xsd="http://www.w3.org/2001/XMLSchema"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/"<BR>&nbsp;&nbsp;&nbsp;&nbsp;SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;<B>&lt;SOAP-ENV:Body&gt;</B><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ns1:getMessage&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;nom xsi:type="xsd:string"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	$sql = "SELECT * FROM Users WHERE Active='".$_COOKIE['Active']."' ORDER BY UserName;";
	$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
    echo "<select style='margin-top:1px; margin-right:1px; display:inline-block; height:20px; border-radius:0; border-width:1px; border-color:#ececed; color:#000000; text-align:right; width:180px; font-weight: lighter;' name='name' id='name'>";	
	while($row = mysql_fetch_array($sql_result))
	{
    	echo "<option value='".$row['IdUser']."'>".$row['UserName']."</option>";
	}
    echo "</select>"; 	
    echo '<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/nom&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ns1:getMessage&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;<B>&lt;/SOAP-ENV:Body&gt;</B><BR><B>&lt;/SOAP-ENV:Envelope&gt;</B>';
	echo "</div>";

	echo "<div id='DivConsole' style='float:left; display:inline-block;  text-align:center; padding-top:5px; padding-left:5px; width:200px; height:280px; align:center; '>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";


	echo "<img onclick='requestSOAP()' src='./res/SendRequest.png' width=50px>";
	echo "<BR>verbe HTTP utilisé : POST<BR>";
	echo "</div>";
	
	echo "<div id='DivConsole' style='float:left; display:inline-block;  text-align:left; padding-top:5px; padding-left:5px; background-color:#000000; width:450px; height:280px; align:center; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#0eaa03;'>";
	echo "/* Réponse renvoyée par le WebService depuis le serveur*/<BR><BR>";
	
	echo "<div id='ReplySOAP' style='display:none;'>";

   	 echo '&lt;?xml version="1.0" encoding="UTF-8"?&gt;<BR>';
   	 echo '<B>&lt;SOAP-ENV:Envelop</B><BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:ns1="urn:HelloYou"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:xsd="http://www.w3.org/2001/XMLSchema"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"<BR>&nbsp;&nbsp;&nbsp;&nbsp;xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/"<BR>&nbsp;&nbsp;&nbsp;&nbsp;SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;<B>&lt;SOAP-ENV:Body&gt;</B><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ns1:getMessageResponse&gt;';

	 echo "<div id='ReplySOAPname'>";
  	 echo "</div>";	
 

   	 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ns1:getMessageResponse&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;<B>&lt;/SOAP-ENV:Body&gt;</B><BR><B>&lt;/SOAP-ENV:Envelope&gt;</B>';

 	echo "</div>";
 	
 	   
	    
	echo "</div>";

	echo "</div>";

	echo "</div>";
	echo "</div>";

    echo "<div id='DivREST' style='display:none'>";
 
     echo "<div style='width:100%; text-align:center; position:relative; color:#000000; margin-bottom:10px;'>";
     echo "<B>Adresse du WebService : </B>http://www.umove.global/integration/WebServices/message.php";
	 $sql = "SELECT * FROM Users WHERE Active='".$_COOKIE['Active']."' ORDER BY UserName;";
	 $sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
     echo "<select style='margin-top:1px; margin-right:1px; display:inline-block; height:20px; border-radius:0; border-width:1px; border-color:#ececed; color:#000000; text-align:right; width:180px; font-weight: lighter;' name='nameRest' id='nameRest'>";	
	 while($row = mysql_fetch_array($sql_result))
	 {
     	echo "<option value='".$row['UserName']."'>/".$row['UserName']."</option>";
	 }
     echo "<option value=''></option>";
     echo "</select>";
     echo "<div style='display:inline-block;' id='DivinputRest'>";
     echo "/";
     echo '<input  style="width:200px; font-family:Tahoma, Geneva, Kalimati, sans-serif, Arial; font-size:15px;" maxlength="20" placeholder="" type="text" name="valueRest" id="valueRest">';	   
	 echo "</div>";
	 echo "</div>";    

  echo "<div style='width:100%; align:center;'>";
  
  echo "<div style='height:250px; align:center; display:inline-block; margin-left:0, margin-right:0; width:1300px;'>";
  
	echo "<div id='DivConsole' style='float:left; margin-left:10%; text-align:left; padding-top:5px; padding-left:5px; background-color:#000000; width:450px; height:280px; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#0eaa03;'>";
	echo "/* Message à envoyer au WebService depuis votre PC*/<BR><BR>";

	echo "</div>";

	echo "<div id='DivConsole' style='float:left; display:inline-block;  text-align:center; padding-top:5px; padding-left:5px; width:200px; height:280px; align:center; '>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "<BR>";


	echo "<img onclick='requestREST()' src='./res/SendRequest.png' width=50px>";
	echo "<BR>verbe HTTP : ";

    echo "<select onchange='changeVerb()' style='margin-top:1px; margin-right:1px; display:inline-block; height:20px; border-radius:0; border-width:1px; border-color:#ececed; color:#000000; text-align:right; width:100px; font-weight: lighter;' name='verb' id='verb'>";	
    echo "<option value='GET'>GET</option>";
    echo "<option value='PUT'>PUT</option>";
    echo "</select>"; 	
	
	echo "<BR>";
	echo "</div>";
	
	echo "<div id='DivConsole' style='float:left; display:inline-block;  text-align:left; padding-top:5px; padding-left:5px; background-color:#000000; width:450px; height:280px; align:center; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#0eaa03;'>";
	echo "/* Réponse renvoyée par le WebService depuis le serveur*/<BR><BR>";
	
	echo "<div id='ReplyREST' style='display:none;'>";


	 echo "<div id='ReplyRESTname'>";
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
































