<?php
require_once('utils.php');

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://core.kahvedunyasi.com/api/users/sms/send",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/plain, */*',
    'Guest-Token: FXhHy8U0IxYvcFoUp1DBlxv27gCGKr6yCEmRU2jU',
    'Content-Type: application/json;charset=UTF-8',
    'Origin: https://www.kahvedunyasi.com',
    'page-url: /kayit-ol',
    'Positive-Client: kahvedunyasi',
    'Positive-Client-Type: web',
    'Pragma: no-cache',
    'Referer: https://www.kahvedunyasi.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
 ),
CURLOPT_POSTFIELDS => '{"mobile_number":"'.$telno.'","token_type":"register_token"}'
));
$kahvedny = curl_exec($ch);
?>