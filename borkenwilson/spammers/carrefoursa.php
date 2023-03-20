<?php
require_once('utils.php');



$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.carrefoursa.com/get-token",
CURLOPT_POST => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$toqenz = curl_exec($ch);


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.carrefoursa.com/login/mobileRegister/newCustomer",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://www.carrefoursa.com',
    'Pragma: no-cache',
    'referer: https://www.carrefoursa.com/hizli-gelsin',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'mobileNumber='.$telno.'&mail='.$mail.'&CSRFToken='.$toqenz.''
));
$carrefour = curl_exec($ch);
?>