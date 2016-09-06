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


echo "<div style='text-align:center; z-index:2'><img style='z-index:10; margin-left:0; position:relative; height:150px;' src='./res/bib.png'><img style='position:relative; margin-right:100; z-index:10; height:150px;' src='./res/Title.png'></div>";    			
echo "<div style='color:#000000; height:600px; padding-top:20px; text-align:center; position:relative; margin-top:-21px; font-size:12px; width: 100%; background-color:#e5e5e3; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";

$sql = "SELECT * FROM Users WHERE IdUser='".$_COOKIE["Binome"]."';";
$sql_result = mysql_query($sql) or die ('Erreur '.mysql_errno().' : ' . mysql_error());
$row = mysql_fetch_array($sql_result);
  
if($_COOKIE["Role"]=="Sender")
{
 
  echo "<B>Je suis Sender. Mon Binome est ".$row['UserName'].". </B><BR><BR><BR><BR>";
  
  
  echo "<div style='height:120px; margin-bottom:0;'>";
  echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Menu<BR><img height=45 px src='./res/menu.png'></div>";

  echo "<div id='DivSenderImgQM' onmouseout='MQActionOnMouseOut(1)' onmouseover='MQActionOnMouseOver(1)' onclick='AddSenderQueueManager(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Add Queue Manager<BR><img id='SenderImgQM' height=45 px src='./res/QMAdd.png'></div>";
  echo "<div id='DivSenderImgRemoteQueue' onmouseout='MQActionOnMouseOut(3)' onmouseover='MQActionOnMouseOver(3)' onclick='AddSenderRemoteQueue(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Remote Queue<BR><img id='SenderImgRemoteQueue' height=45 px src='./res/QueueAdd.png'></div>";
  echo "<div id='DivSenderImgLocalQueue' onmouseout='MQActionOnMouseOut(2)' onmouseover='MQActionOnMouseOver(2)' onclick='AddSenderTransmissionQueue(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Transmission Queue<BR><img id='SenderImgLocalQueue' height=45 px src='./res/QueueAdd.png'></div>";
  echo "<div id='DivSenderImgSenderChannel' onmouseout='MQActionOnMouseOut(4)' onmouseover='MQActionOnMouseOver(4)' onclick='AddSenderChannel(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Sender Channel<BR><img id='SenderImgSenderChannel' height=45 px src='./res/ChannelAdd.png'></div>";
  echo "<div id='DivSenderImgPostMessage' onmouseout='MQActionOnMouseOut(9)' onmouseover='MQActionOnMouseOver(9)' onclick='PostMessage_Form(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Post Message<BR><img id='SenderImgPostMessage' height=45 px src='./res/PostMessage.png'></div>";
 
  echo "</div>";

  echo "<div style='width:100%; align:center;'>";
  
  echo "<div style='height:250px; align:center; display:inline-block; margin-left:0, margin-right:0; width:1300px;'>";
  
  echo "<div id='DivMQServer' style='float:left;  height:200px; margin-left:20px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 400px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "MQ Server (Sender)";
  echo "</div>";

  echo "<div id='DivChannel1' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 175px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";

  echo "<div id='DivChannelConnect' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 50px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";
  
  echo "<div id='DivChannel2' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 175px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";
  
  echo "<div id='DivMQServer2' style='float:left; height:200px; margin-right:20px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 400px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "MQ Server (Receiver)";
  echo "</div>";
  
  echo "<div id='DivMQServerParams' style='margin-left:450px; height:250px; padding-top:10px; text-align:center; position:absolute; margin-top:10px; font-size:12px; width: 400px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";  
  
  echo "</div>";

  echo "</div>";
  

}
elseif($_COOKIE["Role"]=="Receiver")
{

  echo "<B>Je suis Receiver. Mon Binome est ".$row['UserName'].". </B><BR><BR><BR><BR>";
  
  echo "<div style='height:120px; margin-bottom:0;'>";
  echo "<div onclick='window.location=\"index.php\"' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Menu<BR><img height=45 px src='./res/menu.png'></div>";

  echo "<div id='DivReceiverImgQM' onmouseout='MQActionOnMouseOut(5)' onmouseover='MQActionOnMouseOver(5)' onclick='AddReceiverQueueManager(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000; width:150px; text-align:center;'>Add Queue Manager<BR><img id='ReceiverImgQM' height=45 px src='./res/QMAdd.png'></div>";
  echo "<div id='DivReceiverImgDLTQueue' onmouseout='MQActionOnMouseOut(7)' onmouseover='MQActionOnMouseOver(7)' onclick='AddReceiverDLTQueue(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Dead Letter Queue<BR><img id='ReceiverImgDLTQueue' height=45 px src='./res/QueueAdd.png'></div>";
  echo "<div id='DivReceiverImgLocalQueue' onmouseout='MQActionOnMouseOut(6)' onmouseover='MQActionOnMouseOver(6)' onclick='AddReceiverLocalQueue(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Local Queue<BR><img id='ReceiverImgLocalQueue' height=45 px src='./res/QueueAdd.png'></div>";
  echo "<div id='DivReceiverImgReceiverChannel' onmouseout='MQActionOnMouseOut(8)' onmouseover='MQActionOnMouseOver(8)' onclick='AddReceiverChannel(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Add Receiver Channel<BR><img id='ReceiverImgReceiverChannel' height=45 px src='./res/ChannelAdd.png'></div>";
  echo "<div id='DivReceiverImgGetMessage' onmouseout='MQActionOnMouseOut(10)' onmouseover='MQActionOnMouseOver(10)' onclick='GetMessage(".$_COOKIE["IdUser"].")' style='display:inline-block; height:120px; vertical-align:bottom; font-size:12px; color:#000000;  width:150px; text-align:center;'>Get Message<BR><img id='ReceiverImgGetMessage' height=45 px src='./res/PostMessage.png'></div>";
 
  echo "</div>";

  echo "<div style='width:100%; align:center;'>";
  
  echo "<div style='height:250px; align:center; display:inline-block; margin-left:0, margin-right:0; width:1300px;'>";
  
  echo "<div id='DivMQServer' style='float:left;  height:200px; margin-left:20px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 400px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "MQ Server (Sender)";
  echo "</div>";

  echo "<div id='DivChannel1' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 175px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";

  echo "<div id='DivChannelConnect' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 50px; background-color:#CCCCCC; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";
  
  echo "<div id='DivChannel2' style='float:left; display:inline-block; height:200px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 175px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";
  
  echo "<div id='DivMQServer2' style='float:left; height:200px; margin-right:20px; margin-left:0px; padding-top:10px; text-align:center; position:relative; margin-top:10px; font-size:12px; width: 400px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "MQ Server (Receiver)";
  echo "</div>";
  
  echo "<div id='DivMQServerParams' style='margin-left:450px; height:250px; padding-top:10px; text-align:center; position:absolute; margin-top:10px; font-size:12px; width: 400px; background-color:#FFFFFF; font-family:\"Helvetica Neue\",Helvetica,Arial,sans-serif; box-shadow: 0px 2px 1px 0px #ccc; border-style: solid;  border-width:0px; border-color:#ececed;'>";
  echo "</div>";  
  
  echo "</div>";

  echo "</div>";
}

echo "<div id='DivConsole' style='text-align:left; padding-top:5px; padding-left:5px; margin-left:auto; margin-right:auto; background-color:#000000; width:500px; height:150px; align:center; box-shadow: 0px 2px 1px 0px #ccc inset; border-style: solid;  border-width:0px; border-color:#ececed; color:#0eaa03;'>";
echo ">>> Console de suivi d'envoi d'un message";
echo "</div>";
  
echo "</div>";

echo "</div>";

echo "<script>ReloadMQ(".$_COOKIE["IdUser"].",'".$_COOKIE["Role"]."');</script>";

     	
echo "</BODY>";        
echo "</HTML>";
mysql_close();

?>
































