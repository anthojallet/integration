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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=Xv3rM59DJV7fvNLJOK4Z7Z3V4fu0Xanj%2bIVGujRuoPY%3d&docid=2_0f62329df5a584e6ba1766629b7ecfc45&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=Xv3rM59DJV7fvNLJOK4Z7Z3V4fu0Xanj%2bIVGujRuoPY%3d&docid=2_0f62329df5a584e6ba1766629b7ecfc45&rev=1">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Tuyaux - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Tuyaux - 1 - CFT.jpg" width="320" height="240" controls="controls">';
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=cpUYSOBhmSfLVZDSEfc9gqn47YWs31lmsypX60LmXYc%3d&docid=2_06482d809a00b4e1581d8127849770731&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=cpUYSOBhmSfLVZDSEfc9gqn47YWs31lmsypX60LmXYc%3d&docid=2_06482d809a00b4e1581d8127849770731&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=mAC9Rrr8Cu%2fFjdEpuBihjzVSiWNT9m0Ww0gEsHmQS7w%3d&docid=2_0cdd514d070364bc688870864d52f7121&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=mAC9Rrr8Cu%2fFjdEpuBihjzVSiWNT9m0Ww0gEsHmQS7w%3d&docid=2_0cdd514d070364bc688870864d52f7121&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=AC4Kbxb89YU%2bKCjp2%2bUtPaphWPAfmRS4eXMdvaz0mgs%3d&docid=2_096e9becb4fc04867b359ba274a0a1dfb&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=AC4Kbxb89YU%2bKCjp2%2bUtPaphWPAfmRS4eXMdvaz0mgs%3d&docid=2_096e9becb4fc04867b359ba274a0a1dfb&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=N0ejHOnIF2nYjzvbxSb35F7oPEWhtGRHtQkvz5QwM34%3d&docid=2_0ae1e3ecaf88648058a51bc4217ad722f&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=N0ejHOnIF2nYjzvbxSb35F7oPEWhtGRHtQkvz5QwM34%3d&docid=2_0ae1e3ecaf88648058a51bc4217ad722f&rev=1">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les Formats dechange - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les Formats dechange - 1 - Masse.jpg" width="320" height="240" controls="controls">';
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=DSvjTJGsG7SRa1Zgz3dA7xGUCYwXN4bNj7s3ZaZS3fE%3d&docid=2_0ef139629a3334a69852818168fc880bd&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=DSvjTJGsG7SRa1Zgz3dA7xGUCYwXN4bNj7s3ZaZS3fE%3d&docid=2_0ef139629a3334a69852818168fc880bd&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=851djdj7oVuyT%2ffC6%2fJPCliGsEY44DDBj0FPSXeaGS0%3d&docid=2_0cdf3d65050f34cc2b1393a046d272c13&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=851djdj7oVuyT%2ffC6%2fJPCliGsEY44DDBj0FPSXeaGS0%3d&docid=2_0cdf3d65050f34cc2b1393a046d272c13&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=jdj95yKccYx7XbvfHEQhsT57AeR2KaNDHcqwW%2bnM6SU%3d&docid=2_0a3b6d634d5b1469b9be6476f35f63901&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=jdj95yKccYx7XbvfHEQhsT57AeR2KaNDHcqwW%2bnM6SU%3d&docid=2_0a3b6d634d5b1469b9be6476f35f63901&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=A8FLH33zkWWJDrpYR9fZwqPn1tPOe%2bV8OBxJatc8UZ4%3d&docid=2_097c0865286cd4c2ba1bed1260253f2c1&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=A8FLH33zkWWJDrpYR9fZwqPn1tPOe%2bV8OBxJatc8UZ4%3d&docid=2_097c0865286cd4c2ba1bed1260253f2c1&rev=1">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - Les WebServices - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - Les WebServices - 1 - Generalites.jpg" width="320" height="240" controls="controls">';
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=34sWgx19d%2bIzUioRD2XWK15Z6oJcJiPjG9He8MIpTWg%3d&docid=2_00a6fd2a82d074692a1a3360fc995fdb6&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=34sWgx19d%2bIzUioRD2XWK15Z6oJcJiPjG9He8MIpTWg%3d&docid=2_00a6fd2a82d074692a1a3360fc995fdb6&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=lxfRJ0Z2uRu%2fWqdGggTukMu278BBhjavhK4lT4YhZUI%3d&docid=2_0175115e1bdcc449da24a11a33cd349a5&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=lxfRJ0Z2uRu%2fWqdGggTukMu278BBhjavhK4lT4YhZUI%3d&docid=2_0175115e1bdcc449da24a11a33cd349a5&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=WOuAznPrEMg%2fM%2b7I8rKlfMk6Zw2ZpnxltV7H2DcLln8%3d&docid=2_0281d4895d4934f4dbe233944a0ae188a&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=WOuAznPrEMg%2fM%2b7I8rKlfMk6Zw2ZpnxltV7H2DcLln8%3d&docid=2_0281d4895d4934f4dbe233944a0ae188a&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=SCfT2%2bENQsXG%2bmcHqLtnsQwJ8VGlyCdh1HRKbGCj8iE%3d&docid=2_009a983a975e14d3aa727c43436e7d3de&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=SCfT2%2bENQsXG%2bmcHqLtnsQwJ8VGlyCdh1HRKbGCj8iE%3d&docid=2_009a983a975e14d3aa727c43436e7d3de&rev=1">Télécharger la vidéo</a>';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo '<a href="./download.php?file=./video/Integration - EAI,ESB,ETL - 0 - Introduction.pdf">Télécharger le PDF</a>';
echo '</div>';



echo '<div style="font-size:12px; display:inline-block">';
echo '<video poster="./video/Integration - EAI,ESB,ETL - 1 - EAI-ESB.jpg" width="320" height="240" controls="controls">';
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=dCipGX2VkWisyaY9Arae4RBR9fVKeoENQajBq6RKTYw%3d&docid=2_0e3ae11c2cbcc4e0d9ec2cd24870b0fc5&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=dCipGX2VkWisyaY9Arae4RBR9fVKeoENQajBq6RKTYw%3d&docid=2_0e3ae11c2cbcc4e0d9ec2cd24870b0fc5&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=%2bzaA0cyhtI%2biPpXEsg%2flINMt%2fk0LjISuqeNO%2fL5%2fueY%3d&docid=2_09e36562c48cb42c1a6b9240dbc59e06b&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=%2bzaA0cyhtI%2biPpXEsg%2flINMt%2fk0LjISuqeNO%2fL5%2fueY%3d&docid=2_09e36562c48cb42c1a6b9240dbc59e06b&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=0cwrGAh1vApOg5D5WqYFYXxEMGTY8M5q%2fNUj3kQUvpc%3d&docid=2_0e28401d57f614b439b85b9361deb83be&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=0cwrGAh1vApOg5D5WqYFYXxEMGTY8M5q%2fNUj3kQUvpc%3d&docid=2_0e28401d57f614b439b85b9361deb83be&rev=1">Télécharger la vidéo</a>';
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
echo '<source src="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/guestaccess.aspx?guestaccesstoken=1qx0NZ0XEvVsIhBTAQ8f1dFB2Uw4rvQFN1pJhNznGU0%3d&docid=2_06bc0b2abef0d4ee487ffde3052a35d6a&rev=1" type="video/mp4" />';
echo '</video>';
echo "<BR>";
echo '<a href="https://michelingroup.sharepoint.com/sites/dgsi-developercommunity/_layouts/15/download.aspx?guestaccesstoken=1qx0NZ0XEvVsIhBTAQ8f1dFB2Uw4rvQFN1pJhNznGU0%3d&docid=2_06bc0b2abef0d4ee487ffde3052a35d6a&rev=1">Télécharger la vidéo</a>';
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
