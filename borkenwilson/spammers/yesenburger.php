<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://yesenburger.restapp.com/restPost",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_HTTPHEADER => array(
    'accept: application/json, text/javascript, */*; q=0.01',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: origin: https://yesenburger.restapp.com',
    'Pragma: no-cache',
    'referer: referer: https://yesenburger.restapp.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => 'register=1&res_id=703&sms_code=&firstname=sadfasd&lastname=gasdgasd&phone=5345423212&email=daedwqddas%40sadf.com&pass=asdasd123&pass_again=asdasd123&birth_date=10%2F10%2F2000&gender=1&user_approval=1&phone_number_0=+90'.$telno.''
));
$yesenburger = curl_exec($ch);
?>