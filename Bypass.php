<?php
/*Lobotomy Bypass by Professional from se7ensins.com
https://www.se7ensins.com/members/professional.492987/
https://discord.gg/professional
*/
$GT = $_GET['gt'];
$Encoded  = str_replace(" ", "+", $GT);
$Option = $_GET['option'];
$User = "Account_Username";
$Password = "Account_Password";
$PHP_Session_ID = "Session_ID";
switch ($Option)
{
   case "gt";
   $Option = "byGamertag";
   break;
   case "ip";
   $Option = "byIp";
   break;
}
function GetInfo($url,$headers,$Encoded,$Option)
{
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $headers = $headers;
   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
   $data = "gamertagInput=$Encoded&searchOptions=$Option";
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   $resp = curl_exec($curl);
   curl_close($curl);
   return $resp;
}
print $Response = GetInfo("https://www.lobotomy.pw/panel/search.php",array("User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 OPR/82.0.4227.23","Cookie: username=$User;password=$Password;PHPSESSID=$PHP_Session_ID",),$Encoded,$Option)
?>
