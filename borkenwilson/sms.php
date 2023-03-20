<?php

header("Content-Type: application/json; utf-8;");
ini_set('max_execution_time', 0);
error_reporting(0);


$telno = $_GET["gsm"];
foreach (glob("spammers/*.php") as $filename)
{  
	include_once $filename;
}
echo '{"success":"true"}';
	
/*$curl = curl_init("");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_POSTFIELDS, '{"avatar_url": "", "content": "Yeni bir bomber atıldı. \nID : '.$_SESSION['id'].' \nUsername : '.$_SESSION['username'].' \nSMS BOMBER \n\nTEL : '.$telno.'"}');
$webhookyolla = curl_exec($curl);*/
die();
?>