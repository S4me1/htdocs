<?php
require_once('utils.php');




$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => 'https://mopas.com.tr/sms/activation?mobileNumber='.$telno.'&pwd='.$rndpass.'&checkPwd='.$rndpass.'',
CURLOPT_POST => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$mopas = curl_exec($ch);
?>